<?php
require_once 'Importer/Youtube.php';
require_once 'Importer/Vimeo.php';

class VideoImporter {
    
    private function __construct() {}
    
    public static function get($data) {
        if(self::is('youtube.com', $data) || self::is('youtu.be', $data))
        	$importer = new Importer_Youtube($data);
        elseif(self::is('vimeo.com', $data))
        	$importer = new Importer_Vimeo($data);
        else
        	$impoter = null;
        	
        return $importer;
    }
    
    public static function is($what, $content) {
        return strpos($content, $what) !== false;
    }
}