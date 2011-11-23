<?php
require_once 'Object.php';

class Importer_Vimeo extends Importer_Object {
	
    public function getUrl() {
    	$id = $this->getId();
    	return $id ? 'http://vimeo.com/moogaloop.swf?clip_id=' . $id : null;
    }
    
    public function getId(){
    	$id = null;
        if(isset($this->url['path'])) {
            $id = explode('/', $this->url['path']);
            $id = isset($id[1]) ? $id[1] : null;
        } elseif($this->iframeSrc) {
            preg_match('#/video/([0-9]+)#', $this->iframeSrc, $matches);
            $id = isset($matches[1]) ? $matches[1] : null;
        }
        return $id;
    }
}