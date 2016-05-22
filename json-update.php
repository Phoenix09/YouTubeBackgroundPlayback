#!/usr/bin/php
<?php
$file = "youtube_hooks.json";
$current = file_get_contents($file);
$current = json_decode($current, true);

$new = array(
			"9999999" => array(
			"CLASS_1" => "aaa",
			"METHOD_1" => "a",
			"FIELD_1" => "a",
			"SUBFIELD_1" => "a",

			"CLASS_2" => "aaa",
			"METHOD_2" => "a",
			"FIELD_2" => "a",

			"CLASS_3" => "aaa",
			"METHOD_3" => "a")
			);

$output = $current + $new;
$output["VERSION"]++;

$output = json_encode($output, JSON_PRETTY_PRINT);
file_put_contents($file, $output);
?>

