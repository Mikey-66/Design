<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/2/2
 * Time: 17:13
 */
namespace app\model;
use app\model\Model;

class User extends Model
{
    public static $table_name = "nns_user";

    public static $pk = "nns_id";

}