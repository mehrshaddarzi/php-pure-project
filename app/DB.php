<?php

namespace App;

class DB
{

    public static function prefix()
    {
        return DB_PREFIX;
    }

    public static function table($name)
    {
        return self::prefix() . $name;
    }

    public static function insert($table, $arg = array())
    {
        $GLOBALS['db']->insert(
            self::table($table),
            $arg
        );

        return $GLOBALS['db']->insert_id;
    }

    public static function update($table, $arg = array(), $Key, $value)
    {
        $GLOBALS['db']->update(
            self::table($table),
            $arg,
            array($Key => $value)
        );
    }

    public static function delete($table, $arg)
    {
        $GLOBALS['db']->delete(self::table($table), $arg);
    }
}