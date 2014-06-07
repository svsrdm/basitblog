﻿<?php
include(getDir().'config.php');
include(getDir().'commonclasses.php');
$site = new site;

function getDir($dosya = 'functions.php') {
    $hoy = get_included_files();
    foreach ($hoy as $f) {
		if(strpos($f, $dosya)>-1) {
			$h = $f;
			break;
		}
	}
	if($h) {
		$h = explode($dosya, $h);
		$h = $h[0];
	} else {
		$h = '';
	}
	return $h;
}

function seo($s){
    $tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','ç','Ç');
    // Türkçe karakterlerin çevirlecegi karakterler
    $en = array('s','s','i','i','g','g','u','u','o','o','c','c');
    $s = str_replace($tr,$en,$s);
    $s = strtolower($s);
    $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '-', $s);
    $s = preg_replace('/[^%a-z0-9 _-]/', '-', $s);
    $s = preg_replace('/\s+/', '-', $s);
    $s = preg_replace('|-+|', '-', $s);
    $s = str_replace("--","-",$s);
    $s = trim($s, '-');
    return $s;
}

function filtre($gelen){
    $yasak = explode(",", "SELECT,INSERT,CREATE,UPDATE,JOIN,CONCAT,DELETE");
    $filtre = str_replace($yasak, '', $gelen);
    return $filtre;
}

?>

