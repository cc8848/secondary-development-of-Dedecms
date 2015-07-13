<?php
$z[0]=Array("match","<div>主演: [内容]</div>",5,57);
$z[1]=Array("trim","<a([^>]*)>",62,106);
$z[1][4]['replace']="";
$z[2]=Array("trim","</a>",108,146);
$z[2][4]['replace']="";
$z[3]=Array("function","",151,182);

?>