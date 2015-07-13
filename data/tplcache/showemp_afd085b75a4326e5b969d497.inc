<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?>hello，world！！！
<h1>雇佣列表：</h1>
<?php foreach ($res as $key => $value):?>
	<td><?php echo $value['id']."---".$value['name']."<br/>"; ?></td>
<?php endforeach ?>