<?php  

require_once(dirname(__FILE__)."/../include/common.inc.php");
global $cfg_templets_skin;

/**
 * 动态计算出评分值星星的图片显示效果
 */


//2分用一个颗黄星表示 -> 0.5 ,1 ,1.5,2  都是一颗黄星，4颗灰星
//                      2.5  3  3.5  4  都是2颗黄星，3颗灰星
//ceil 数学函数，表示向上取整 0.1-1=>1



$id = isset($_GET['id'])?$_GET['id']:"";

// 根据$id从数据表中取得评分值$pfz
$sql = "select pfz from dede_addonmovie where aid = $id";
$row = $dsql->GetOne($sql);
$pfz = $row['pfz'];

$yellowstar = ceil($pfz / 2);

// 拼接返回的结果：html代码串
// 注意拼接的字串中: "单引号"需要进行转义
$html_str = '';
for($i = 0; $i < intval($yellowstar); $i++){
    $html_str .= "<img src=\'{$cfg_templets_skin}/images/star.jpg\'/>";
}
for($i = 0; $i < (5 - intval($yellowstar)); $i++){
    $html_str .= "<img src=\'{$cfg_templets_skin}/images/star_grid.jpg\'/>";
}
$html_str .= "<em>{$pfz} 分</em>";


echo "document.write('".$html_str."');\r\n";

?>

