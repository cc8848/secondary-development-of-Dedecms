<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>魔侠传之唐吉可德影评看后感 - A67手机电影</title> 
<meta name="Description" content="A67手机电影网用户对《魔侠传之唐吉可德》的评论。" /> 
<link href="static/css/style.css" type="text/css"  rel="stylesheet"/>
<link href="static/css/comment.css" type="text/css"  rel="stylesheet"/>
<script language="javascript" src="static/js/global.js"></script>
</head>
<body>
<div id="header">
	<div id="menu"> 
		<div class="top">
			<div class="logn">当前位置: <a href="<?php echo $GLOBALS['cfg_cmsurl']; ?>">首页</a> > <a href="<?php echo $GLOBALS['cfg_cmsurl']; ?>/a/wodedianying/">我的电影</a> > <?php echo $archive_infos['title'] ?> > 评论</div>
			<div class="txt">
				<ul>
				<li>
				    <?php if($cfg_ml->M_ID){?>
				    <b><?php echo $cfg_ml->M_LoginID;?></b>,您好 欢迎来到电影评论中心 [<a href="../member" title="会员中心">会员中心</a>] <a href="../member/index_do.php?fmdo=login&dopost=exit"> 退出</a>
				    <?php }else{ ?>
				      您好，请您先 <a href="../member/login.php?gourl=<?php echo $cfg_ask_curl;?>">登陆</a> 或者 <a href="../member/reg_new.php">注册</a>
				    <?php }?>
				</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="main">
	<div class="module">
		<div class="title">《<?php echo $archive_infos['title'] ?>》的影评</div>
		<div class="comment_list">
			<div class="comment_fb">
				<div class="comment_fb_top"><span></span><b>为减轻审核压力，200字以内的评论不予审核。敬请谅解！</b>
				</div>
				<div class="comment_fb_u">
					<form method='post' name='commentForm' action='?c=pinglun&a=addpl' onsubmit="return comment.check(this);"> 
						<input type="text" name="title" value="请输入标题" onfocus="if(this.value!='请输入标题'){this.style.color='#333'}else{this.value='';this.style.color='#333'}" onblur="if(this.value==''){this.value='请输入标题';this.style.color='#333'}" onkeydown="this.style.color='#333'" />
						<input type='hidden' value='<?php echo $aid; ?>' name='movieid' />
						<input type='hidden' value='50054' name='username' />
						<textarea id="top_content" name="content"></textarea>
						<p>
						<?php if($cfg_ml->M_ID){?>
					    <span>
				    		<b>当前用户: <?php echo $cfg_ml->M_LoginID;?></b> （您可以发表评论）
				    	</span> 
					    <?php }else{ ?>
				    	<span>
				    		<b><a href="../member/login.php?gourl=<?php echo $cfg_ask_curl;?>">登陆</a></b> （请登录发表评论，游客不开放）
				    	</span> 
					    <?php }?>
					    <button name="submitbutton" type="submit" style="border:none"></button>
					    </p>
					</form> 
				</div>
			</div>
			
			<div class="comment_m">
				<div class="comment_m_top">《<?php echo $archive_infos['title'] ?>》共有 <font color="red"><?php echo $plnum; ?></font> 条评论
					<div class="pages">
						<div><span></span></div>   
					</div>
				</div>
				<!-- 评论循环显示 -->
				<?php for ($i=0; $i < count($res); $i++) { ?>
					<ul>
						<li class="pic">
							<a href="#" target="_blank">
								<img title="<?php echo $res[$i]['title']; ?>的头像" src="<?php echo $res[$i]['face']; ?>" />
							</a>
						</li>
						<li class="txt">
							<p>
								<a href="#" target="_blank"><?php echo $res[$i]['title']; ?></a>
								<span><a href="#" target="_blank"><?php echo $res[$i]['uname']; ?></a>
									<img src="static/images/1.jpg" />
								</span>
							</p>
							<p style="padding-top:10px;line-height:22px;">
								<?php echo $res[$i]['content']; ?>
								<a href="#" target="_blank">（查看全文）</a> | 
								<a href="#" target="_blank">25人回应</a> | 
								<a href="#" target="_blank">我来回应>></a>
							</p>
						</li>
					</ul>
				<?php } ?>
			</div>
			<div style="float:left; width:596px;">
				<div class="pages" style="margin:20px 0px;">
					<div>
						<span></span>
					</div>   
				</div>
			</div>
		</div>
		<div class="ziliao">
			<div class="pingfen">
				<img src="static/images/rank_1.gif" border="0" />
				<img src="static/images/rank_2.gif" border="0" />
				<img src="static/images/rank_1.gif" border="0" />
				<img src="static/images/rank_2.gif" border="0" />
				<img src="static/images/rank_1.gif" border="0" />
				<img src="static/images/rank_2.gif" border="0" />
				<img src="static/images/rank_1.gif" border="0" />
				<img src="static/images/rank_2.gif" border="0" />
				<img src="static/images/rank_1.gif" border="0" />
				<img src="static/images/rank_2.gif" border="0" />
				<img src="static/images/rank_1.gif" border="0" />
				<img src="static/images/rank_2.gif" border="0" />
				<img src="static/images/rank_1.gif" border="0" />
				<img src="static/images/rank_2.gif" border="0" />
				<img src="static/images/rank_1.gif" border="0" />
				<img src="static/images/rank_2.gif" border="0" />
				<img src="static/images/rank_1.gif" border="0" />
				<img src="static/images/rank_4.gif" border="0" />
				<img src="static/images/rank_3.gif" border="0" />
				<img src="static/images/rank_4.gif" border="0" />
				<p><?php echo $archive_infos['pfz']; ?> 分<span>（8604人评价）</span></P>
			</div>
			<div class="zl_info">
				<li class="pic"><a href="#" target="_blank"><img alt="<?php echo $archive_infos['title'] ?>" src="<?php echo $archive_infos['litpic'] ?>" /></a>
					<div class="down"><a href="#" target="_blank">点击下载</a></div>
				</li>
				<li class="wz"><a href="#" target="_blank"><b><?php echo $archive_infos['title'] ?></b></a></li>
				<li class="ss">年代：<a href="#" target="_blank"><?php echo $archive_infos['year'] ?></a></li>
				<li class="ss">地区：<a href="#" target="_blank"><?php echo $archive_infos['area'] ?></a></li>
				<li class="ss">语言：<?php echo $archive_infos['language'] ?></li>
				<li class="ss">类型：<?php echo $archive_infos['type'] ?></li>
				<li class="ss">格式：3GP MP4</li>
				<li class="ss">导演：<a href="#" target="_blank"><?php echo $archive_infos['director'] ?></a></li>
				<li class="ss">主演：<?php echo $archive_infos['mainactors'] ?></li>
			</div>
			<div class="jieshao">
				<?php echo $archive_infos['introduce'] ?>
			</div>
		</div>
	</div>
</div>
<div id="bottom">
	<div class="bottom_so">
		<div class="bottom_so_wrap">
			<div class="bottom_searcher_tet"> 
				<form action="http://so.a67.com/so" method="get" name="q" target="_blank" id="search" > 
					<input type="text" name="q" class="bottom_focus" value="" /> 
					<input type="image" name="s" class="bottom_searchbutton" id="button" src="static/images/botto_searcher.gif" align="absmiddle" /> 
				</form> 
			</div>
			<div class="bottom_keywords">
			<a href="" target="_blank">周星驰</a>
			<a href="" target="_blank">嘻游记</a>
			<a href="" target="_blank">唐山大地震</a>
			<a href="" target="_blank">敢死队</a> | 
			<a href="" target="_blank">最新电影</a>
			<a href="" target="_blank">电影排行榜</a>
			</div>
		</div>
	</div>
	<div class="copyright"> 
		<p>Copyright © 2010 <a href="http://www.a67.com/">A67.COM</a> <a href="http://www.a67.com/">遛机网</a> All Rights Reserved  鲁ICP备05010054号</p> 
		<p>本站所有手机资源均为会员制作上传，本站仅提供存储空间，如侵犯到您的权益，请及时联系本站删除，本站不负任何法律责任！</p> 
	</div>
</div>
</body>
</html>