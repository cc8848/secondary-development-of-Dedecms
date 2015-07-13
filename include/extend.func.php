<?php
function litimgurls($imgid=0)
{
    global $lit_imglist,$dsql;
    //获取附加表
    $row = $dsql->GetOne("SELECT c.addtable FROM #@__archives AS a LEFT JOIN #@__channeltype AS c 
                                                            ON a.channel=c.id where a.id='$imgid'");
    $addtable = trim($row['addtable']);
    
    //获取图片附加表imgurls字段内容进行处理
    $row = $dsql->GetOne("Select imgurls From `$addtable` where aid='$imgid'");
    
    //调用inc_channel_unit.php中ChannelUnit类
    $ChannelUnit = new ChannelUnit(2,$imgid);
    
    //调用ChannelUnit类中GetlitImgLinks方法处理缩略图
    $lit_imglist = $ChannelUnit->GetlitImgLinks($row['imgurls']);
    
    //返回结果
    return $lit_imglist;
}






/**
 * 自定义函数 测试使用
 * 供系统标签调用
 */
function test_func($val){
    return "-头部--".$val."--尾部-";
}


/**
 * 自定义函数 
 * 供系统标签调用
 * 从给定的字符串中截取出需要的那部分(具体是 位置导航字符中的当前内容部分，如：视频 电影 电视剧)
 * 
 * @param  string $str 欲处理的字符串
 * @return string      处理完成后的字符串
 */
function position_split($str){
    $res = explode(">", $str);
    $res = explode("<", $res[4]);
    $res = explode("的", $res[0]);
    
    return $res[1];
}


/**
 * 对视频的下载地址列表进行html格式包装
 * 
 * @param  string $str 原文本格式的下载地址列表
 * @return string      处理后html格式的下载地址列表
 */
function download_addr_format($str){

    // 参数的内容的格式如下所示：
    //
    // 3gp|大笑江湖01|176x144|http://www.xunlei.com/01.3gp
    // 3gp|大笑江湖02|176x144|http://www.xunlei.com/02.3gp
    // 3gp|大笑江湖03|176x144|http://www.xunlei.com/03.3gp
    // mp4|大笑江湖01|176x400|http://www.xunlei.com/01.mp4
    // mp4|大笑江湖02|176x400|http://www.xunlei.com/02.mp4
    
    
    // 字符串换行是有一个字符的(表示换行)，windows下是"\r\n"  linux下是"\n"
    
    // 统一"表示换行的字符"
    $str = str_replace("\r\n", "\n", $str);
    $res = explode("\n", $str);

    // 将下载列表信息组装成一个三维数组(方便之后的格式化 同时灵活性拓展性很好)
    $arrs = array();
    foreach ($res as $key => $value) {
        $arr = explode("|", $value);

        $arrs[$arr[0]][] = array(
            'title' => $arr[1],
            'fbl' => $arr[2],
            'url' => $arr[3]
            );
    }

    // dede提供了一个全局的Archives类对象实例，该对象实例可以取出
    global $ac;  
    // 路径全局变量
    global $cfg_templets_skin;

    // <<<HTMLSTR HTMLSTR
    // <<<LISTR LISTR
    // 通过使用上面的两个特殊格式，其中间所有的文本，都不用考虑 "单引号" "双引号"转义的问题

    $result = "";
    foreach ($arrs as $key => $value) {
        $result .= <<<HTMLSTR
<H2 id="downloadurls">{$ac->Fields['title']}{$key}下载地址<font class="f1">温馨提示：一键下载功能可一次
下载{$key}格式所有分节电影！</font><span><a href="javascript:;" onclick="return d3gp()">
<img src="{$cfg_templets_skin}/images/yijian_3gp.gif" border="0" /></a></span></H2>
HTMLSTR;

        $result .= "<div class=\"downurls\"><ul>";
        foreach ($value as $k => $download) {
            $result .= <<<LISTR
<li><a href="http://www.a67.com/download/26059-0" title="{$download['title']}" 
target="_blank" rel="nofollow">{$download['title']}</a> (格式：{$key} / 分辨率：{$download['fbl']})<span><a 
href="{$download['url']}" target="_blank" rel="nofollow">迅雷高速下载</a></span><span><a 
href="http://www.a67.com/download/26059-0" target="_blank" rel="nofollow">下载到电脑</a></span></li>
LISTR;
        }
        $result .= "</ul></div>";
    }

    return $result;
}