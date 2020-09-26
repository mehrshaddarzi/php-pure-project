<?php

namespace App\User;

use App\DB;

class User
{
    public static $table = 'users';

    public static function get_userdata($user_id, $with_meta = false)
    {
        global $db;
        $table_name = DB::table(self::$table);
        $query = $db->get_row("SELECT * FROM {$table_name} WHERE `ID` = {$user_id} ", ARRAY_A);
        if (is_null($query)) {
            return false;
        }

        $meta = array();
        if ($with_meta) {
            $meta = Meta::get_all_user_meta($user_id);
        }

        return array_merge($query, $meta);
    }
}