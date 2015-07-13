<?php
$z[0]=Array("match","<li >主演:[内容]</li>",5,55);
$z[1]=Array("trim","<a([^>]*)>",60,104);
$z[1][4]['replace']="";
$z[2]=Array("trim","</a>",106,144);
$z[2][4]['replace']="";
$z[3]=Array("function","",149,180);

?>