<?php

require_once (dirname(dirname(dirname(__FILE__)))) . '/Importer/Object.php';

class Importer_Object_Test extends PHPUnit_Framework_TestCase {
    
    public function testBase() {
    }
    
    public function getMocked($url) {
        return $this->getMockForAbstractClass('Importer_Object', array($url));
    }
}