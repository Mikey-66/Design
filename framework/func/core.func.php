<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/5/10
 * Time: 10:26
 */


function query_by_db($sql, $db)
{
    if (!$db->query($sql))
    {
        return false;
    }

    $res = $db->get_query_result(true);

    if ($res === false)
    {
        return false;
    }

    return $res;
}

function exec_by_db($sql, $db)
{
    $res = $db->exec($sql);

    if (!$res)
    {
        return false;
    }

    return $res;
}