<?php
class Summary{
    public $headers = [];

    public function collect_headers(string $content){
        $regex = '/<h([2-6])(.*)>(.+)<\/h\1>/';
        $results = preg_match_all($regex, $content, $matches);

        for($i = 0; $i<count($matches[0]); $i++){
            $this->headers[] = new Header(intval($matches[1][$i]), $matches[3][$i], $matches[0][$i], trim($matches[2][$i]));
        }
    }

    public function create_summary_markup(){
        $headers = $this->headers;
        
        if(count($headers)==0){
            return;
        }

        $html = '<section class="summary-wrapper"><ol class="summary">';

        for($i = 0; $i < count($headers); $i++){
            $html .= '<li>';
            $html .= $headers[$i]->create_anchor_markup(); 
            
            // Checks if this the last header
            if( ($i + 1) == count($headers) ){
                $html .= '</li>';
                // close all ol tags
                for($j = 0; $j < ($headers[$i]->level - 2); $j++){
                    $html .= '</li></ol>';
                }
            }
            // Checks if the next header is on the same level  
            else if( $headers[$i]->level == $headers[$i+1]->level ){
                $html .= '</li>';
            }
            // Checks if the next header is on an inferior level. If true, open a sub list
            else if( $headers[$i]->level < $headers[$i+1]->level ){
                $html .= '<ol class="summary-submenu level-'.$headers[$i+1]->level.'">';
            }
            // Checks if the next header is on an superior level. If true, close the sub list
            else if( $headers[$i]->level > $headers[$i+1]->level ){
                $html .= '</li></li></ol>';
            }
        }

        $html .= '</ol></section>';

        return $html;
    }

    /**
     * Add an id attribute to the headers
     */
    public function replace_headers(string $content){
        /* If no headers do nothing */
        if($this->headers == []){
            return $content;
        }

        foreach($this->headers as $header){
            $content = str_replace($header->html, $header->create_new_html(), $content);
        }

        return $content;
    }

    /** 
     * Append the summary at the right place
     */
    public function append_summary($content){
        /* If no headers do nothing */
        if($this->headers == []){
            return $content;
        }

        $position = strpos($content,$this->headers[0]->html);
        $before = substr($content, 0, $position);
        $after = substr($content, $position);
        return $before . $this->create_summary_markup() . $after;
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