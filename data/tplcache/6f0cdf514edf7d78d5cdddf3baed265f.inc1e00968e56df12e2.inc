<?php
$z[0]=Array("match","<li class=\"info_dq\">地区：\r\n[内容]\r\n</li>",5,76);
$z[1]=Array("trim","<a([^>]*)>",81,125);
$z[1][4]['replace']="";
$z[2]=Array("trim","</a>",127,165);
$z[2][4]['replace']="";
$z[3]=Array("function","",170,201);

?>