<?php

namespace App;

class Template
{

    public static function get_template()
    {
        return Options::get('template');
    }

    public static function load()
    {
        $options = array('extension' => '.html');
        return new \Mustache_Engine(array(
            'loader' => new \Mustache_Loader_FilesystemLoader(ABSPATH . '/template/' . self::get_template() . '/', $options),
        ));
    }

    public static function render($template_name, $arg = array(), $echo = true)
    {
        $html = self::load()->render($template_name,
            self::param($arg)
        );

        if ($echo) {
            echo $html;
        }

        return $html;
    }

    public static function param($arg = array())
    {
        return array_merge($arg, self::default_params());
    }

    public static function default_params()
    {
        $array = array();

        // Add Site Url
        $array['site_url'] = Options::get('url');

        // Add Template Url
        $array['template_url'] = Options::get('url') . '/template/' . self::get_template();

        // Return Data
        return $array;
    }
}