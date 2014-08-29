<?php
/**
 * Created by PhpStorm.
 * User: moyong
 * Date: 14-7-7
 * Time: 上午9:19
 */

$con=new MongoClient();

$db=$con->test;

$conllection=$db->name;

$doc=$conllection->findOne();

var_dump($doc);

?>