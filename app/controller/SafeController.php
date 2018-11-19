<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/5/9
 * Time: 17:41
 */

namespace app\controller;


use framework\database\fk_db_mysqli;

class SafeController extends BaseController
{
    public function actionSqlInjectionTest1()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $id = addslashes($id);
        $id = intval($id);
        var_dump($id);

        if(!strlen($id))
        {
            die('id is lost');
        }

        $db = new fk_db_mysqli();

        $sql = "select * from user where id = '{$id}'";

        var_dump($sql);

        $res = query_by_db($sql, $db);

        var_dump($res);
    }

    public function actionSqlInjectionTest2()
    {
        $name = isset($_GET['name']) ? $_GET['name'] : '';

        $name = addslashes($name);

        if(!strlen($name))
        {
            die('name is lost');
        }

        $db = new fk_db_mysqli();

        $sql = "select * from user where name = '{$name}'";

        var_dump($sql);

        $res = query_by_db($sql, $db);

        var_dump($res);
    }

    public function actionAddArticle()
    {
        if (isset($_POST['content']))
        {
            $content = $_POST['content'];

            $db = new fk_db_mysqli();

            $content = addslashes($content);

            $sql = "insert into article(`content`) VALUES ('{$content}')";

            $res = exec_by_db($sql, $db);

            echo "<script>alert('添加成功')</script>";

            return;
        }

        return $this->render2('safe.addarticle');
    }

    public function actionDetailArticle()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        if (!$id)
        {
            die('id is lost');
        }

        $db = new fk_db_mysqli();

        $id = intval($id);

        $sql = "select * from article where id = " . $id;

        $res = query_by_db($sql, $db);

        if (count($res))
        {
            $article = $res[0];
        }
        else
        {
            die('article not exist');
        }

        return $this->render2('safe.detail', [
            'article' => $article
        ]);
    }

    public function actionTest()
    {
        $text = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>';
        echo strip_tags($text);
        echo "\n";
    }
}