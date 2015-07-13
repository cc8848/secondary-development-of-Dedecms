<?php  

require_once(dirname(__FILE__)."/../include/common.inc.php");

/**
 * 处理用户对视频的评分和获取视频的评分
 *
 * $type参数： change---用户进行评分
 *             get   ---获取评分
 */

$id   = $_GET['id'];
$pfz  = isset($_GET['pfz'])?$_GET['pfz']:"";
$type = $_GET['type'];

if ($type == 'change') {
	$sql = "update dede_addonmovie set pfz = $pfz where aid = $id";
	$dsql->ExecuteNoneQuery($sql);
	$sql = "select pfz from dede_addonmovie where aid = $id";
	$row = $dsql->GetOne($sql);

	echo $row['pfz'];
} elseif ($type == 'get') {
	$sql = "select pfz from dede_addonmovie where aid = $id";
	$row = $dsql->GetOne($sql);

	echo "document.write('".$row['pfz']."');\r\n";
}

?>