<?php  

require_once(dirname(__FILE__)."/../include/common.inc.php");
require_once(DEDEINC."/datalistcp.class.php");


/**
 * 从数据库中获取点击数排名前10的电影
 */



$sql = "select id,title from dede_archives order by click desc limit 1,8";

$dsql->SetQuery($sql);
$result = $dsql->Execute();

$res = "";
$i = 1;
while($row = $dsql->GetArray()) { 
	$archive_row = GetOneArchive($row['id']);

	$res .= "<li class='hover'>
	<span>".$i."</span>
	<a href='".$archive_row['arcurl']."' title='".$row['title']."' target='_blank'>".$row['title']."</a>
	</li>";
	$i++;
}

echo 'document.write("'.$res.'");\r\n';

?>