<?php
require_once 'Object.php';

class Importer_Youtube extends Importer_Object {
	
    public function getUrl() {
    	$id = $this->getId();
    	return $id ? 'http://www.youtube.com/v/' . $id : null;
    }
    
    public function getId(){
    	$id = null;
        if(isset($this->url['host']) && $this->url['host'] == 'youtu.be') {
            $id = substr($this->url['path'], 1);
        } elseif(isset($this->url['query']['v'])) {
            $id = $this->url['query']['v'];
        } elseif($this->iframeSrc) {
            preg_match('#/embed/([A-z0-9]+)#', $this->iframeSrc, $matches);
            $id = isset($matches[1]) ? $matches[1] : null;
        }
        return $id;
    }
}