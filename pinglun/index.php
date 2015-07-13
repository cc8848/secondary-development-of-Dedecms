<?php  

/**
 * 雇员管理模块的入口文件
 *
 * @version        2015/1/15  王帆
 * @package        index.php
 * @copyright      
 * 
 */

require_once(dirname(__file__).'/../include/common.inc.php');
require_once(DEDEINC.'/request.class.php');
require_once(DEDEINC.'/memberlogin.class.php');


// 这里指定了将来你请求一个控制器的某个方法时 必须使用的规范
// http://localhost/dedecms/index.php?c=控制器名&a=该控制器中的某个方法名
$ct = Request('c', 'index');
$ac = Request('a', 'index');

// 获得当前用户的相关信息($cfg_ml 是一个全局对象)
$cfg_ml = new MemberLogin();

// 统一应用程序入口
RunApp($ct, $ac);

?>