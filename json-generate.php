<?php
$APP_VERSIONS = array(0,
	108058, 108358, 108360, 108362, 108656,
	108752, 108754, 108755, 108957, 108958,
	108959, 110153, 110155, 110156, 110354,
	110456, 110759, 110851, 111056, 111057,
	111060, 111157, 111257, 111355, 111356,
	111555, 111662, 111752, 111852, 111956);

$CLASS_1 = array("com.google.android.libraries.youtube.player.background.BackgroundTransitioner",
	"kyr", "lco", "lha", "lzb", "moc",
	"mtp", "mtp", "mtq", "myb", "myb",
	"myb", "ndr", "nds", "nds", "nxu",
	"odu", "omt", "oom", "owe", "owe",
	"owe", "ozp", "pez", "pih", "phr",
	"pvk", "qec", "qgh", "qit", "qcn");
$METHOD_1 = array("updateBackgroundService",
	"P", "a", "a", "a", "d",
	"d", "d", "d", "d", "d",
	"d", "d", "d", "d", "d",
	"d", "d", "d", "d", "d",
	"d", "d", "d", "d", "d",
	"d", "d", "d", "d", "d");
$FIELD_1 = array("playbackModality",
	"e", "d", "d", "d", "e",
	"e", "e", "e", "e", "e",
	"e", "e", "e", "e", "e",
	"e", "e", "e", "e", "e",
	"e", "e", "e", "e", "e",
	"e", "e", "e", "e", "e");
$SUBFIELD_1 = array("isInBackground",
	"e", "e", "e", "e", "e",
	"e", "e", "e", "e", "e",
	"e", "f", "f", "f", "f",
	"f", "f", "f", "f", "f",
	"f", "f", "f", "f", "f",
	"f", "f", "f", "f", "f");

$CLASS_2 = array("com.google.android.libraries.youtube.innertube.model.PlayabilityStatusModel",
	"iqp", "iur", "izd", "jmo", "kam",
	"kft", "kft", "kft", "kin", "kin",
	"kin", "klp", "klq", "klq", "lcl",
	"lhu", "lpf", "lqa", "lwt", "lwt",
	"lwt", "lzg", "mep", "mht", "mhd",
	"mtk", "nbi", "ncm", "ndv", "mvl");
$METHOD_2 = array("isPlayable",
	"a", "a", "a", "a", "a",
	"a", "a", "a", "a", "a",
	"a", "a", "a", "a", "a",
	"a", "a", "a", "a", "a",
	"a", "a", "a", "a", "a",
	"a", "a", "a", "a", "a" );
$FIELD_2 = array("isBackgroundable",
	"c", "c", "c", "c", "c",
	"c", "c", "c", "c", "c",
	"c", "c", "c", "c", "c",
	"c", "c", "c", "c", "c",
	"c", "c", "c", "c", "c",
	"c", "c", "c", "c", "c");

$CLASS_3 = array("com.google.android.apps.youtube.app.background.BackgroundSettings",
	"azq", "azl", "bdx", "azw", "bhj",
	"biz", "biz", "biz", "biv", "biv",
	"biv", "bji", "bji", "bji", "bze",
	"cad", "cbo", "ccl", "btf", "btf",
	"btf", "bsv", "bsu", "btr", "btq",
	"bzy", "cam", "cas", "cba", "cbr");
$METHOD_3 = array("getBackgroundAudioSetting",
	"c", "d", "d", "d", "d",
	"d", "d", "d", "d", "d",
	"d", "d", "d", "d", "d",
	"d", "d", "d", "d", "d",
	"d", "d", "d", "d", "d",
	"d", "d", "d", "d", "d");

$output = array("VERSION" => 1);
for ($i = 0; $i < count($APP_VERSIONS); $i++) {
	$output += array($APP_VERSIONS[$i] => array(
		"CLASS_1" => $CLASS_1[$i],
		"METHOD_1" => $METHOD_1[$i],
		"FIELD_1" => $FIELD_1[$i],
		"SUBFIELD_1" => $SUBFIELD_1[$i],
		"CLASS_2" => $CLASS_2[$i],
		"METHOD_2" => $METHOD_2[$i],
		"FIELD_2" => $FIELD_2[$i],
		"CLASS_3" => $CLASS_3[$i],
		"METHOD_3" => $METHOD_3[$i]));
	}
echo json_encode($output, JSON_PRETTY_PRINT);
?>
