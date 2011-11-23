<?php

require_once (dirname(dirname(dirname(__FILE__)))) . '/Importer/Youtube.php';

class Importer_Youtube_Test extends PHPUnit_Framework_TestCase {
    
    public function testGetIdWithShort() {
    	$importer = new Importer_Youtube('http://youtu.be/rqbo0qSf1V4');
    	$this->assertEquals('rqbo0qSf1V4', $importer->getId());
    }
    public function testGetIdWithNormal() {
    	$importer = new Importer_Youtube('www.youtube.com/watch?v=rqbo0qSf1V4&feature=related');
    	$this->assertEquals('rqbo0qSf1V4', $importer->getId());
    }
    public function testGetIdWithIframe() {
    	$importer = new Importer_Youtube('<iframe width="560" height="315" src="http://www.youtube.com/embed/rqbo0qSf1V4" frameborder="0" allowfullscreen></iframe>');
    	$this->assertEquals('rqbo0qSf1V4', $importer->getId());
    }
    public function testGetUrl() {
    	$importer = new Importer_Youtube('www.youtube.com/watch?v=rqbo0qSf1V4&feature=related');
    	$this->assertEquals('http://www.youtube.com/v/rqbo0qSf1V4', $importer->getUrl());
    }
}