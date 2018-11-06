<?php 
require('commandHandle.php');
//require('ssr_client.php');

$test = new commandHandle();

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
//$command = "#添加pdf @EffectiveJava @链接：https://pan.baidu.com/s/1jInF0wA 密码：kiqp";
//$command = "#添加pdf @Spring源码深度解	析 @链接：https://pan.baidu.com/s/1qr8P7gKu7gBJ_tMwo7dPuw  密码：n7vs";
//$command = "#添加pdf @Tomcat权威指南2 @链接: https://pan.baidu.com/s/1smauTmH 密码: bdn6";
//$command = "#查询命令 @#cmd";
//$command = "#插入命令 @#ssr @; @7 @ssr_client run @0 @nothing '#ssr' @5";
//$command = "#插入命令 @#所有用户 @select * from user_table @2 @empty @0 @查看所有用户 '#所有用户' @999";
//$command = "#插入命令 @#提意见 @insert into msg_table values((select user_name from user_table where user_id = '%s'),'%s') @4 @empty @1 @提意见 '#提意见'+' '+'@意见' @1";
//$command = "#插入命令 @#所有意见 @; @6 @http://101.200.42.79/wx/showPage.php?show_type=msg @0 @查看所有意见 '#所有意见' @999";
//$command = '#cmd';
$command = '#所有用户';
//$command = "#更改用户权限 @10 @赵日天";
//$command = "#删除指令 @#提意见";
//$command = "#提意见 @1234";
$array = explode(' @',$command);
print_r($array);
echo '<br>';
print_r($test->run("oCABy55B-uVgNPrCEK3jM8XCr-A0",array_shift($array),$array));
echo '<br>';
//oCABy55B-uVgNPrCEK3jM8XCr-A0
//oCABy5xnrXneMj_nwt8Ft10NaKRU
?>