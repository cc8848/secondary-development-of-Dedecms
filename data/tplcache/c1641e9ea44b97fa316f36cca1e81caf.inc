{dede:noteinfo notename="搜狐视频网站-电影采集点" channelid="18" macthtype="string"
refurl="http://vod.kankan.com/v/73/73762.shtml" sourcelang="gb2312" cosort="asc" isref="no" exptime="10" usemore="0" /}

{dede:listrule sourcetype="batch" rssurl="http://" regxurl="http://movie.kankan.com/type,order/movie,hits/page(*)/"
startid="2" endid="4" addv="1" urlrule="area"
 musthas="" nothas="" listpic="1" usemore="0"}
    {dede:addurls}{/dede:addurls}
    {dede:batchrule}{/dede:batchrule}
    {dede:regxrule}{/dede:regxrule}
    {dede:areastart}<ul class="movielist" id="movie_list">{/dede:areastart}
    {dede:areaend}</ul>
        <p class="list-pager-v2">{/dede:areaend}
{/dede:listrule}
