{dede:sppage sptype='full' sptype='full' srul='1' erul='5'}{/dede:sppage}
{dede:previewurl}http://vod.kankan.com/v/73/73762.shtml{/dede:previewurl}
{dede:keywordtrim}{/dede:keywordtrim}
{dede:descriptiontrim}{/dede:descriptiontrim}
{dede:item field='title' value='' isunit='' isdown=''}
   {dede:match}<div class="movieinfo_tt">
                    <h2>[内容]<span>{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}
{dede:item field='writer' value='' isunit='' isdown=''}
   {dede:match}{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}
{dede:item field='source' value='' isunit='' isdown=''}
   {dede:match}{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}
{dede:item field='pubdate' value='' isunit='' isdown=''}
   {dede:match}{/dede:match}
   
   {dede:function}@me=GetMkTime(@me);{/dede:function}
{/dede:item}
{dede:item field='language' value='国语,粤语,英语,韩语,日语,泰语,其它' isunit='' isdown=''}
   {dede:match}{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}
{dede:item field='pfz' value='' isunit='' isdown=''}
   {dede:match}{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}
{dede:item field='area' value='大陆,港台,欧美,日韩,其它' isunit='' isdown=''}
   {dede:match}<li class="short_li">地区:[内容]</li>{/dede:match}
   {dede:trim replace=''}<a([^>]*)>{/dede:trim}
{dede:trim replace=''}</a>{/dede:trim}
   {dede:function}{/dede:function}
{/dede:item}
{dede:item field='year' value='0' isunit='' isdown=''}
   {dede:match}<div class="movieinfo_tt">
                    <h2>[内容]<span>(.*)</span></h2>
                    			<div class="starbox">{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}
{dede:item field='director' value='' isunit='' isdown=''}
   {dede:match}<li class="short_li">导演:[内容]</li>{/dede:match}
   {dede:trim replace=''}<a([^>]*)>{/dede:trim}
{dede:trim replace=''}</a>{/dede:trim}
   {dede:function}{/dede:function}
{/dede:item}
{dede:item field='mainactors' value='' isunit='' isdown=''}
   {dede:match}<li >主演:[内容]</li>{/dede:match}
   {dede:trim replace=''}<a([^>]*)>{/dede:trim}
{dede:trim replace=''}</a>{/dede:trim}
   {dede:function}{/dede:function}
{/dede:item}
{dede:item field='introduce' value='' isunit='1' isdown='1'}
   {dede:match}{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}
{dede:item field='download' value='' isunit='' isdown=''}
   {dede:match}{/dede:match}
   
   {dede:function}{/dede:function}
{/dede:item}
