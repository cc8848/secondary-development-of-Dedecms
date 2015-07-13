<?php
$z[0]=Array("match","<div>上映日期: [内容]</div>",5,63);
$z[1]=Array("trim","<a([^>]*)>",68,112);
$z[1][4]['replace']="";
$z[2]=Array("trim","</a>",114,152);
$z[2][4]['replace']="";
$z[3]=Array("function","",157,188);

?>