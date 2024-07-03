<?php
class Header{
    public $level;
    public $content;
    
    function __construct(int $level, string $content)
    {
        $this->level = $level;
        $this->content = $content; 
    }
}