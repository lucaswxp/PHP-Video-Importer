<?php

require_once (dirname(dirname(dirname(__FILE__)))) . '/Importer/Vimeo.php';

class Importer_Vimeo_Test extends PHPUnit_Framework_TestCase {
    
    public function testGetIdFromUrl() {
    	$importer = new Importer_Vimeo('http://vimeo.com/32449778');
    	$this->assertEquals('32449778', $importer->getId());
    }
    
    public function testGetIdFromIframe() {
    	$importer = new Importer_Vimeo('<iframe src="http://player.vimeo.com/video/32449778?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><p><a href="http://vimeo.com/32449778">Fiji Vignette 3/3</a> from <a href="http://vimeo.com/tajburrow">Taj Burrow</a> on <a href="http://vimeo.com">Vimeo</a>.</p>');
    	$this->assertEquals('32449778', $importer->getId());
    }
    
    public function testGetUrl() {
    	$importer = new Importer_Vimeo('http://vimeo.com/32449778');
    	$this->assertEquals('http://vimeo.com/moogaloop.swf?clip_id=32449778', $importer->getUrl());
    }
}