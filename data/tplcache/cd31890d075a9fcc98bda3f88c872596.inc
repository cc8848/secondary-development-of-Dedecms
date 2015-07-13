{dede:noteinfo notename="a67手机电影网站电影采集点" channelid="18" macthtype="string"
    refurl="http://www.a67.com/movie/415055" sourcelang="utf-8" cosort="asc"
  isref="no" exptime="10" usemore="0" /}
{dede:listrule sourcetype="batch" rssurl="http://" regxurl="http://www.a67.com/list/1/p.(*)"
startid="2" endid="3" addv="1" urlrule="area" musthas=""
 nothas="" listpic="1" usemore="0"}
    {dede:addurls}{/dede:addurls}
    {dede:batchrule}{/dede:batchrule}
    {dede:regxrule}{/dede:regxrule}
    {dede:areastart}<div class="list_p">{/dede:areastart}
    {dede:areaend}<div class="pages">{/dede:areaend}
{/dede:listrule}
{dede:sppage sptype='full' srul='1' erul='5'}{/dede:sppage}
{dede:previewurl}http://www.a67.com/movie/368834{/dede:previewurl}
{dede:keywordtrim}{/dede:keywordtrim}
{dede:descriptiontrim}{/dede:descriptiontrim}
{dede:item field='title' value='' isunit='' isdown=''}
   {dede:match}<h1 title="[内容]">[内容]<em></em></h1>{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}{dede:item field='writer' value='' isunit='' isdown=''}
   {dede:match}{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}{dede:item field='source' value='' isunit='' isdown=''}
   {dede:match}{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}{dede:item field='pubdate' value='' isunit='' isdown=''}
   {dede:match}<div>上映日期: [内容]</div>{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}{dede:item field='language' value='国语,粤语,英语,韩语,日语,泰语,其它' isunit='' isdown=''}
   {dede:match}<div>语言: [内容]</div>{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}{dede:item field='pfz' value='' isunit='' isdown=''}
   {dede:match}<font id="rank_fen">[内容]</font>{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}{dede:item field='area' value='大陆,港台,欧美,日韩,其它' isunit='' isdown=''}
   {dede:match}<li class="info_dq" sizcache="0" sizset="54">地区：
[内容]
</li>

<li class="info_nd">语言：{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}{dede:item field='year' value='0' isunit='' isdown=''}
   {dede:match}<div>上映日期: [内容]</div>{/dede:match}
   {dede:trim replace=""}(\(.*\)){/dede:trim}
{dede:trim replace=""}-[0-9][0-9]-[0-9][0-9]{/dede:trim}
   {dede:function}{/dede:function}
{/dede:item}{dede:item field='director' value='' isunit='' isdown=''}
   {dede:match}<div>导演: [内容]</div>{/dede:match}
   {dede:trim replace=""}<a([^>]*)>{/dede:trim}
{dede:trim replace=""}</a>{/dede:trim}
   {dede:function}{/dede:function}
{/dede:item}{dede:item field='mainactors' value='' isunit='' isdown=''}
   {dede:match}<div>主演: [内容]</div>{/dede:match}
   {dede:trim replace=""}<a([^>]*)>{/dede:trim}
{dede:trim replace=""}</a>{/dede:trim}
   {dede:function}{/dede:function}
{/dede:item}{dede:item field='introduce' value='' isunit='1' isdown='1'}
   {dede:match}<div class="cont">[内容]<div>导演{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}{dede:item field='download' value='' isunit='' isdown=''}
   {dede:match}{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}