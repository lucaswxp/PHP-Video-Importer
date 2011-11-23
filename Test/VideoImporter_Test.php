<?php

require_once (dirname(dirname(__FILE__))) . '/VideoImporter.php';

class VideoImporter_Test extends PHPUnit_Framework_TestCase {
    
    public function testYoutube() {
    	$this->assertInstanceOf('Importer_Youtube', VideoImporter::get('www.youtube.com/watch?v=rqbo0qSf1V4&feature=related'));
    	$this->assertInstanceOf('Importer_Youtube', VideoImporter::get('http://youtu.be/rqbo0qSf1V4'));
    	$this->assertInstanceOf('Importer_Youtube', VideoImporter::get('<iframe width="560" height="315" src="http://www.youtube.com/embed/rqbo0qSf1V4" frameborder="0" allowfullscreen></iframe>'));
    }
    
    public function testVimeo() {
    	$this->assertInstanceOf('Importer_Vimeo', VideoImporter::get('http://vimeo.com/32449778'));
    	$this->assertInstanceOf('Importer_Vimeo', VideoImporter::get('<iframe src="http://player.vimeo.com/video/32449778?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><p><a href="http://vimeo.com/32449778">Fiji Vignette 3/3</a> from <a href="http://vimeo.com/tajburrow">Taj Burrow</a> on <a href="http://vimeo.com">Vimeo</a>.</p>'));
    }
}