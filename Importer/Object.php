<?php

require_once dirname(dirname(__FILE__)) . '/IVideoImporter.php';

abstract class Importer_Object implements IVideoImporter {
    
    protected $data;
    
    protected $url;
    
    protected $iframeSrc;
    
    public function __construct($data) {
        $this->data = $data;
        
        if(strpos($data, '<iframe') !== false) {
        	preg_match('/src=["\'](.*)["\']/', $data, $matches);
            $this->iframeSrc = isset($matches[1]) ? $matches[1] : null;
        } elseif(strpos($data, 'http') !== false || strpos($data, 'www') !== false) { // "is url"
        	$url = parse_url($data);
        	$query = array();
        	if(isset($url['query'])) {
	        	parse_str($url['query'], $query);
        	}
	        $url['query'] = $query;
        	$this->url = $url;
        } 
    }
    
    public function __toString() {
        return $this->object();
    }
    
    public function object($options = array()) {
    	$url = $this->getUrl();
    	
    	if(!$url)
    		return null;
    	
    	$options = array_merge(array('inside' => '', 'attrs' => array()), $options);
		
		if(!isset($options['attrs']['style']))
			$options['attrs']['style'] = 'width:300px;height:300px;';
		
		if(!isset($options['attrs']['data']))
			$options['attrs']['data'] = $url;
		
		
		$attrs = '';
		foreach($options['attrs'] as $att => $attV)
			$attrs .= " $att=\"$attV\"";
			
        $object = '<object type="application/x-shockwave-flash"' . $attrs . '>';

        $object .= $options['inside'];
        	
        $object .= '</object>';
        
        return $object;
    }
}