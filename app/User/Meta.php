<?php

namespace App\User;

use App\DB;

class Meta
{
    public static $table = 'usermeta';

    public static function get_user_meta($user_id, $meta_name)
    {
        global $db;
        $table_name = DB::table(self::$table);
        $meta_value = $db->get_var("SELECT `meta_value` FROM {$table_name} WHERE `user_id` = {$user_id} AND `meta_name` = '$meta_name'");
        if (empty($meta_value)) {
            return false;
        }

        return $meta_value;
    }

    public static function get_all_user_meta($user_id)
    {
        global $db;
        $table_name = DB::table(self::$table);
        $query = $db->get_results("SELECT * FROM {$table_name} WHERE `user_id` = {$user_id} ", ARRAY_A);
        if (empty($query)) {
            return false;
        }

        $list = array();
        foreach ($query as $row) {
            $list[$row['meta_name']] = $row['meta_value'];
        }
        return $list;
    }

    public static function update_user_meta($user_id, $meta_name, $meta_value)
    {
        global $db;

        // First check Exist Meta
        $meta = self::get_user_meta($user_id, $meta_name);
        if (!empty($meta)) {
            // Update Meta
            $table_name = DB::table(self::$table);
            $ID = $db->get_var("SELECT `ID` FROM `{$table_name}` WHERE `user_id` = {$user_id} AND `meta_name` LIKE '{$meta_name}'");
            DB::update(self::$table, array(
                'meta_value' => $meta_value
            ), 'ID', $ID);
        } else {
            // Insert New Meta
            return DB::insert(self::$table, array(
                'user_id' => $user_id,
                'meta_name' => $meta_name,
                'meta_value' => $meta_value,
            ));
        }
    }
}