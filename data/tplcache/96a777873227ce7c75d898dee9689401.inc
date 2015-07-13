
   {dede:match}<div>上映日期: [内容]</div>{/dede:match}
   {dede:trim replace=''}(\(.*\)){/dede:trim}
{dede:trim replace=''}-[0-9][0-9]-[0-9][0-9]{/dede:trim}
   {dede:function}{/dede:function}
