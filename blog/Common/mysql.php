<?php
/**
 * MySQL公共函数文件
 */

// 初始化 链接数据库
function initDb(){
	// 链接数据库
	$link = @mysql_connect('localhost', 'root', '12345') or die('数据库链接失败');
	mysql_select_db('blog', $link);
	mysql_query('set names utf8');
}

//查询一条记录
function findOne($sql){
	$query = mysql_query($sql);
    return mysql_fetch_array($query, MYSQL_ASSOC);
}

// 查询多条记录
function findAll($sql, $showError = false)
{
	$result = mysql_query($sql);
	if (is_resource($result)) {
		$rows = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$rows[] = $row; 
		}
		return $rows;
	} else {
		return $showError ? mysql_error() : false;
	}
}