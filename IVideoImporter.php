<?php

interface IVideoImporter {
    
    /**
     * Initializes
     * 
     * @param mixed $data The video URL, the video iframe tag or something else that can
     * turn into a direct video URL
     */
    public function __construct($data);
    
    /**
     * Gets video URL defined by the constructor
     */
    public function getUrl();
    
    public function getId();
    
    public function object();
}