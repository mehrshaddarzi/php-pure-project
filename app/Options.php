<?php

namespace App;

class Options
{

    public static $table = 'options';

    public static function get($option_name)
    {
        global $db;
        $table = DB::table(self::$table);
        $option = $db->get_var("SELECT `option_value` FROM {$table} WHERE `option_name` = '$option_name'");
        if (is_null($option)) {
            return false;
        }

        return $option;
    }
}