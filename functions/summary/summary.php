<?php
class Summary{
    public $headers = [];

    public function collect_headers(string $content){
        $regex = '/<h([2-6]).*>(.+)<\/h\1>/';
        $results = preg_match_all($regex, $content, $matches);
        var_dump($matches);

        for($i = 0; $i<count($matches[0]); $i++){
            $this->headers[] = new Header(intval($matches[1][$i]), $matches[2][$i]);
        }
    }
}

/**
 * Retrieve all the hn, their n, and their content
 * 
 * Add an anchor to the hn
 * 
 * Add links at the top of the article to the anchors
 * 
 */