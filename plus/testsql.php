<?php  

/**
 * 自定义插件
 *
 * 实现增加点击数的功能
 */

/**
 * 这个文件可以在前端页面中通过js代码进行调用，实现相应的功能
 *
 * 调用代码：  <script src="{dede:field name='phpurl'/}/testsql.php?aid={dede:field name='id'/}&type=update&addnum=100" type='text/javascript' language="javascript"></script>
 */


// 要想使用dsql这个全局变量，必须include下面这个公共的文件
require_once(dirname(__FILE__)."/../include/common.inc.php");


// 获取前端传递过来的参数
$aid    = isset($_GET['aid'])?$_GET['aid']:"";
$type   = isset($_GET['type'])?$_GET['type']:"none";
$addnum = isset($_GET['addnum'])?$_GET['addnum']:"0";

if ($type == "update") {
	$sql = "update dede_archives set click = click + {$addnum} where id = $aid";
	$dsql->ExecuteNoneQuery($sql);

	// 从数据表中查询当前点击数
	$res = "结果";
	// 返回结果给前台页面显示时，必须使用document.write()这种方式
	echo "document.write('".$res."');\r\n";
}

?>