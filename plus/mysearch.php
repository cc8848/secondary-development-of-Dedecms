<?php  

/**
 * 搜索处理部分
 * 
 * 根据条件查询数据
 * 对结果数据进行分页显示处理
 */

require_once(dirname(__FILE__)."/../include/common.inc.php");
require_once(DEDEINC."/datalistcp.class.php");


/**
 * 因为(mysearch.htm模板文件中)我们将要在系统提供的分页条的基础上自定义，所以需要对原分页条进行相应的修改
 * 这势必要去修改生成分页条部分的代码(一个类中的一个方法)，但修改已有的类源码，是个很不好的选择
 * 所以我们这里的方法是：通过"继承和重写方法"来实现我们的要求
 */

// 继承自DataListCP类
class MyDataListCP extends DataListCP{
	// 重写父类中的GetPageList方法，实现自定义
	// 获取分页导航列表
    function GetPageList($atts,$refObj='',$fields=array()) {
        global $lang_pre_page,$lang_next_page,$lang_index_page,$lang_end_page,$lang_record_number,$lang_page,$lang_total;
        $prepage = $nextpage = $geturl= $hidenform = '';
        $purl = $this->GetCurUrl();
        $prepagenum = $this->pageNO-1;
        $nextpagenum = $this->pageNO+1;
        if(!isset($atts['listsize']) || preg_match("#[^0-9]#", $atts['listsize']))
        {
            $atts['listsize'] = 5;
        }
        if(!isset($atts['listitem']))
        {
            // $atts['listitem'] = "info,index,end,pre,next,pageno";
            $atts['listitem'] = "index,end,pre,next,pageno";
        }
        $totalpage = ceil($this->totalResult/$this->pageSize);

        //echo " {$totalpage}=={$this->totalResult}=={$this->pageSize}";
        //无结果或只有一页的情况
        if($totalpage<=1 && $this->totalResult > 0)
        {
            return "<span style='font-weight: bold; color: gray; font-size: 18px;'>{$lang_total} 1 {$lang_page}/".$this->totalResult.$lang_record_number."</span>";
        }
        if($this->totalResult == 0)
        {
            return "<span>{$lang_total} 0 {$lang_page}/".$this->totalResult.$lang_record_number."</span>";
        }
        $infos = "<span>{$lang_total} {$totalpage} {$lang_page}/{$this->totalResult}{$lang_record_number} </span>";
        if($this->totalResult!=0)
        {
            $this->getValues['totalresult'] = $this->totalResult;
        }
        if(count($this->getValues)>0)
        {
            foreach($this->getValues as $key=>$value)
            {
                $value = urlencode($value);
                $geturl .= "$key=$value"."&";
                $hidenform .= "<input type='hidden' name='$key' value='$value' />\n";
            }
        }
        $purl .= "?".$geturl;

        //获得上一页和下一页的链接
        if($this->pageNO != 1)
        {
            $prepage .= "<a class='prePage' href='".$purl."pageno=$prepagenum'>$lang_pre_page</a> \n";
            $indexpage = "<a class='indexPage' href='".$purl."pageno=1'>$lang_index_page</a> \n";
        }
        else
        {
            // $indexpage = "<span class='indexPage'>"."$lang_index_page \n"."</span>";
            // $indexpage = "<a><span class='indexPage'>"."$lang_index_page \n"."</span></a>";
        }
        if($this->pageNO != $totalpage && $totalpage > 1)
        {
            $nextpage.="<a class='nextPage' href='".$purl."pageno=$nextpagenum'>$lang_next_page</a> \n";
            $endpage="<a class='endPage' href='".$purl."pageno=$totalpage'>$lang_end_page</a> \n";
        }
        else
        {
            // $endpage=" <strong>$lang_end_page</strong> \n";
        }

        //获得数字链接
        $listdd = "";
        $total_list = $atts['listsize'] * 2 + 1;
        if($this->pageNO >= $total_list)
        {
            $j = $this->pageNO - $atts['listsize'];
            $total_list=$this->pageNO + $atts['listsize'];
            if($total_list > $totalpage)
            {
                $total_list = $totalpage;
            }
        }
        else
        {
            $j=1;
            if($total_list > $totalpage)
            {
                $total_list = $totalpage;
            }
        }

        /**
         * 自定义修改
         * 修改分页条上显示出来的数字链接的数目(当前页两旁的数字链接)
         */
        $j = $j - 2;
        if($j <= 0){
        	$j = 1;
        }
        for($j; $j<=($total_list+2); $j++)
        {
        	if ($j > $totalpage)
        		break;
        	// $listdd .= $j==$this->pageNO ? "<a href='#' style='background-color: #068BD2; color: black;'><strong>$j</strong></a>\n" : "<a href='".$purl."pageno=$j'>".$j."</a>\n";
            $listdd .= $j==$this->pageNO ? "<a href='#' class='on'><strong>$j</strong></a>\n" : "<a href='".$purl."pageno=$j'>".$j."</a>\n";
        }


        $plist = "<div class=\"pagelistbox\">\n";

        //info,index,end,pre,next,pageno,form
        if(preg_match("#info#i",$atts['listitem']))
        {
            $plist .= $infos;
        }
        if(preg_match("#index#i", $atts['listitem']))
        {
            $plist .= $indexpage;
        }
        if(preg_match("#pre#i", $atts['listitem']))
        {
            $plist .= $prepage;
        }
        if(preg_match("#pageno#i", $atts['listitem']))
        {
            $plist .= $listdd;
        }
        if(preg_match("#next#i", $atts['listitem']))
        {
            $plist .= $nextpage;
        }
        if(preg_match("#end#i", $atts['listitem']))
        {
            $plist .= $endpage;
        }
        if(preg_match("#form#i", $atts['listitem']))
        {
            $plist .=" <form name='pagelist' action='".$this->GetCurUrl()."' style='float:left;' class='pagelistform'>$hidenform";
            if($totalpage>$total_list)
            {
                $plist.="<input type='text' name='pageno' style='padding:0px;width:30px;height:18px;font-size:11px' />\r\n";
                $plist.="<input type='submit' name='plistgo' value='GO' style='padding:0px;width:30px;height:22px;font-size:11px' />\r\n";
            }
            $plist .= "</form>\n";
        }
        $plist .= "</div>\n";
        return $plist;
    }
}


/**
 * 因为mysearch.htm模板文件最终会被加载到当前php文件中，
 * 所以无法再通过传统的方式-dede:include标签引入head.htm模板文件
 * 所以我们考虑其他方式，实现head.htm模板文件中的菜单导航条
 */

// 从数据表中获取所有的菜单项(菜单name和ID号)
$sql = "select * from dede_arctype order by id";
$dsql->SetQuery($sql);
$res = $dsql->Execute();
$menus = array();
while ($row = $dsql->GetArray()) { 
	// 将获取的导航内容信息放入数组中，供前端模板页面直接使用
	$menus[] = $row;
}



// 获取传递过来的各个参数
$typeid = isset($_GET['typeid'])?$_GET['typeid']:"";
$area   = isset($_GET['area'])?$_GET['area']:"";
$year   = isset($_GET['year'])?$_GET['year']:"";
$type   = isset($_GET['type'])?$_GET['type']:"";



$dlist = new MyDataListCP();
$dlist->pageSize = 1;

// 建造sql查询语句
$sql = "select a.*, b.* from dede_archives a left join dede_addonmovie b on a.id = b.aid";


// 之所以不需要使用$_GET['']来获取get参数
// 是因为系统使用了extract()函数对所有数组进行了相关的操作
if (empty($typeid)) {
    $typeid = $menus[0]['id'];
}
// 保留get参数 实现传递给分页的其他页
$dlist->SetParameter("typeid", $typeid);

// 拼接sql语句，添加查询条件
$sql .= " where a.typeid = $typeid";
// 确定当前应该显示的菜单项的名字
for ($i=0; $i < count($menus); $i++) { 
    if ($menus[$i]['id'] == $typeid) {
        $nowmenu = $menus[$i]['typename'];
        // 将菜单项的名字截取出来
        $tmp = explode("我的", $nowmenu);
        $nowmenu = $tmp[1];
    }
}


if (isset($area) && $area != "") {
    // 拼接sql语句，添加查询条件
    $sql .= " and b.area = '$area'";
    // 保留get参数 实现传递给分页的其他页
    $dlist->SetParameter("area", $area);
}
if (isset($year) && $year != "") {
    // 拼接sql语句，添加查询条件
    $sql .= " and b.year = '$year'";
    $dlist->SetParameter("year", $year);
}
if (isset($type) && $type != "") {
    // 拼接sql语句，添加查询条件
    // 这里使用like模糊查询
    $sql .= " and b.type like '%$type%'";
    $dlist->SetParameter("type", $type);
}


// 拼接用于显示结果的模板路径
$templatefile = DEDEROOT."/templets/default/mysearch.htm";
// 设置用于显示结果的模板
$dlist->SetTemplate($templatefile);
// 设置用于查询结果的sql语句
$dlist->SetSource($sql);
// 引入模板文件html代码，执行并显示
$dlist->Display();

?>