<?php 
require('commandHandle.php');

$test = new commandHandle();

$id = 0;
$name = "#插入命令";
$sql ='insert into command_table (command_name,command_sql,command_type,command_result,command_para,command_manual,command_level)values("%s","%s",%d,"%s",%d,"%s",%d);';
$type = 1;
$result = " ";
$para = 7;
$manual = "插入一个命令，使这个命令以后可用，具体格式为’#插入命令 @#命令名称 @命令的sql语句 @命令类型 @该命令返回结果 @参数数量 @命令说明(用空格+@分隔)";
$level = 999;
$test->insert_command($id,$name,$sql,$type,$result,$para,$manual,$level);

/*
$name = "#查询命令";
$sql = 'select command_manual from command_table where command_name = "%s";';
$type = 1;
$result = " ";
$para = 1;
$manual = "查询命令的使用方法 具体格式为 #查询命令 @#要查询的命令名称(用空格+@分隔)";
$level = 0;
//$test->insert_command($id,$name,$sql,$type,$result,$para,$manual,$level);
*/

/*
$command = "#插入命令 @#查询命令 @select command_manual from command_table where command_name = '%s'; @ @empty @1 @查询命令的使用方法 具体格式为 '#查询命令'+' '+'@#要查询的命令名称'(用空格+@分隔) @0";
$array = explode(' @',$command);
//print_r(array_shift($array));
echo "<br>";
print_r($array);
echo '<br>';
print_r($test->run("oCABy5xnrXneMj_nwt8Ft10NaKRU",array_shift($array),$array));
echo '<br>';
*/

/*
$command = "#插入命令 @#注册 @insert into user_table values('%s','%s',3); @4 @empty @1 @注册一个账号，'#注册'+' '+'@name' @0";
$array = explode(' @',$command);
print_r($array);
echo '<br>';
print_r($test->run("oCABy5xnrXneMj_nwt8Ft10NaKRU",array_shift($array),$array));
echo '<br>';
*/


//$command = "#插入命令 @#更改用户权限 @update user_table set user_level = %d where user_name = '%s'; @1 @empty @2 @更改用户权限 '#更改用户权限'+' '+'@权限等级'+' '+'@用户名' @999";
//$command = "#插入命令 @#删除用户 @delete from user_table where user_name = '%s'; @1 @empty @1 @删除用户 '#删除用户'+' '+'@用户名' @999";
//$command = "#插入命令 @#删除指令 @delete from command_table where command_name = '%s'; @1 @empty @1 @删除指令 '#删除指令'+' '+'@指令名' @999";
//$command = "#删除用户 @666";
//$command = "#删除指令 @#所有电影";

//$command = "#插入命令 @#cmd @select command_name from command_table where command_level <= (select user_level from user_table where user_id = '%s') or command_level = 0; @5 @empty @1 @查询所有指令 'cmd' @0";
//$command = "#注册 @666";
//$command = "#cmd";
//$command = "#插入命令 @#搜索电影 @select * from movie_table where movie_name like '%%%s%%'; @2 @empty @1 @搜索电影 '#搜索电影'+' '+'@电影名' @1";
//$command = "#搜索电影 @123 @456";
//$command = "#插入命令 @#删除pdf @delete from pdf_table where pdf_name = '%s'; @1 @empty @1 @删除pdf书籍 '#删除pdf'+' '+'@书名' @10";
//$command = "#插入命令 @#添加pdf @insert into pdf_table values('%s','%s'); @1 @empty @2 @添加pdf书籍 '#添加pdf'+' '+'@书名'+' '+'@链接' @10";
//$command = "#插入命令 @#删除电影 @delete from movie_table where movie_name = '%s'; @1 @empty @1 @删除电影 '#删除电影'+' '+'@电影名' @10";
//$command = "#插入命令 @#添加电影 @insert into movie_table values('%s','%s'); @1 @empty @2 @添加电影 '#添加电影'+' '+'@电影名'+' '+'@链接' @10";
//$command = "#插入命令 @#所有电影 @; @6 @http://101.200.42.79/wx/showPage.php?show_type=movie @0 @查看所有电影 '#所有电影' @1";
//$command = "#插入命令 @#所有pdf @; @6 @http://101.200.42.79/wx/showPage.php?show_type=pdf @0 @查看所有pdf '#所有pdf' @1";
//$command = "#删除指令 @#所有pdf";
//$command = "#删除指令 @#所有电影";
$command = "#添加pdf @EffectiveJava @链接：https://pan.baidu.com/s/1jInF0wA 密码：kiqp";
//$command = "#添加pdf @Spring源码深度解析 @链接：https://pan.baidu.com/s/1qr8P7gKu7gBJ_tMwo7dPuw  密码：n7vs";
//$command = "#添加pdf @Tomcat权威指南2 @链接: https://pan.baidu.com/s/1smauTmH 密码: bdn6";

$array = explode(' @',$command);
print_r($array);
echo '<br>';
print_r($test->run("oCABy5xnrXneMj_nwt8Ft10NaKRU",array_shift($array),$array));
echo '<br>';

//oCABy5xnrXneMj_nwt8Ft10NaKRU

//select command_name from command_table where command_level <= (select user_level from user_table where user_id = '123' or command_level = 0);

/*

*/
//echo $test->query_command("#菜单");
//$test->delete_command("#菜单","#1.电影列表\n");
//$test->clear_command();
//$test->drop_command();
//$test->create_command();

//print_r ($test->query_command($name));

//$str = "a num is '%s', '%s'";
//$array = array('123','123','123');
//echo vsprintf($str,$array);

//echo implode(",",$array);
//$command = "#插入命令 @4 @#查询电影 @select result from movie_table where name like '%%%s%%'; @2 @empty @1 @搜索电影";
//$command = '#ls_command';
//$command = '#查询电影 边山';
//$array = explode(' ',$command);
//print_r(array_shift($array));
//print_r($array);
//print_r($test->run(array_shift($array),$array))
//$arr = array('边山');
//$ss = "select result from movie_table where name like '%%%s%%';";
//echo vprintf($ss,$arr);
?>







