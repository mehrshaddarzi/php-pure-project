<?php

namespace App;

class Helper
{

    public static function get_site_url($path = '')
    {
        $url = Options::get('url');
        if (!empty($path)) {
            $url = rtrim($url, "/") . "/" . ltrim($path, "/");
        }

        return $url;
    }

}