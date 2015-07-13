<?php
$z[0]=Array("match","<div>上映日期: [内容]</div>",5,63);
$z[1]=Array("trim","(\\(.*\\))",68,110);
$z[1][4]['replace']="";
$z[2]=Array("trim","-[0-9][0-9]-[0-9][0-9]",112,168);
$z[2][4]['replace']="";
$z[3]=Array("function","",173,204);

?>