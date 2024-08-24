<?php
function theme_perso_get_home_url(){
    if(function_exists("pll_home_url")){
        return pll_home_url();
    }
    else{
        return get_site_url();
    }
}