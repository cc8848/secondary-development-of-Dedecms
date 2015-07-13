<?php
$z[0]=Array("match","<div class=\"cont\">\r\n\r\n                                <div>[内容]</div>\r\n<div>",5,110);
$z[1]=Array("trim","<a([^>]*)>",115,159);
$z[1][4]['replace']="";
$z[2]=Array("trim","</a>",161,199);
$z[2][4]['replace']="";
$z[3]=Array("function","",204,235);

?>