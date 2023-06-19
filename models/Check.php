<?php
namespace models;
class Check{
    public function getCurrentUrlSlug(){
        $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parsedUrl=parse_url($url);
        $path=$parsedUrl['path'];

}
}