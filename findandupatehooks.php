#!/usr/bin/php
<?php
error_reporting(E_ALL);
set_time_limit(0);
$url = $_SERVER["argv"][1];
if (empty($url)) {
	echo "usage: {$_SERVER[argv][0]} <APK URL>\n";
	die();
}

$dex2jar = "d2j-dex2jar.sh"; // change this your d2j-dex2jar.sh path
$procyon = "procyon.sh"; // change this to your procyon path or java -jar /path/to/procyon.jar

$hooksfile = "youtube_hooks.json";

@mkdir("tmp");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

echo "downloading APK\n";
if (($response = curl_exec($ch)) !== false) {
	if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == "200") {
		echo "download complete\n\n";
		if ($filename = basename(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL))) {
			$fp = fopen("tmp/$filename", "w");
			fwrite($fp, $response);
			fclose($fp);
		} else {
			error("filename not found");
		}
	} else {
		error("download failed: " . curl_error($ch));
	}

	if (! exec("$dex2jar ".escapeshellarg("tmp/$filename")." -o tmp/youtube.jar", $output)) {
		echo "dex2jar complete\n\n";
		echo "decompiling\n";
		if(! exec("timeout -s 9 15m $procyon tmp/youtube.jar -o tmp/java 1>&2; echo ''", $output)) {
			echo "decompiling complete\n\n";
			if (exec("./backgroundplayback.sh tmp/java", $hooksarray)) {
					$hooks = implode("\n", $hooksarray);
				if (preg_match("/com.google.android.youtube_[0-9\.]+-(\d+)_/", $filename, $matches)) {
					$versioncode = substr($matches[1], 0, -3);
					$newjson = array("$versioncode" => eval("return $hooks"));
					if (!array($newjson)) {
						error("hooks not found");
					}
					echo "hooks found\n";
					echo "updating json\n";
					$currentjson = file_get_contents($hooksfile);
					$currentjson = json_decode($currentjson, true);
					$outputjson = $currentjson + $newjson;
					$outputjson = json_encode($outputjson, JSON_PRETTY_PRINT);
					if (file_put_contents($hooksfile, $outputjson)) {
						echo "json updated\n";
					} else {
						error("failed to update json");
					}
				} else {
					error("failed to find version code");
					}
			} else {
				error("failed to find hooks\n\n" . implode("\n", $output));
			}
		} else {
			error("procyon failed\n\n" . implode("\n", $output));
		}
	} else {
		error("dex2jar failed\n\n" . implode("\n", $output));
	}
}
curl_close($ch);
deltmpfile();

function deltmpfile() {
	global $filename;
	if (!empty($filename)) @unlink("tmp/$filename");
	@unlink("tmp/youtube.jar");
	@delTree("tmp/java");
}

function error($msg) {
	echo "error: $msg\n";
	deltmpfile();
	die();
}

function delTree($dir) {
   $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
  }
?>
