<?php
$z[0]=Array("match","<li class=\"info_dq\">地区：\r\n\r\n[内容]\r\n\r\n</li>",5,80);
$z[1]=Array("trim","<a([^>]*)>",85,129);
$z[1][4]['replace']="";
$z[2]=Array("trim","</a>",131,169);
$z[2][4]['replace']="";
$z[3]=Array("function","",174,205);

?>