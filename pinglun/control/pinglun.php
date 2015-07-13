<?php  

class pinglun extends Control{
	// 显示指定的评论
	public function ac_listpl(){
		require_once(DEDEINC."/datalistcp.class.php");
		global $cfg_pl_dir;
		// 获取get参数aid
		$aid = request('aid', '');

		// 调用Model获取数据
		$res = $this->Model('mpinglun')->list_pl($aid);

		// 为了实现分页，这里通过DataListCP类代替上面的Model来获取数据
		// $dlist = new DataListCP();
		// $sql = "select a.id, b.face, b.uname from dede_a67_comments a left join dede_member b on a.userid = b.mid where a.movieid = $aid";
		// $sql = "select id from dede_a67_comments where movieid = $aid";
		// $sql = "select id from dede_a67_comments where movieid = $aid";
		// $dlist->pageSize = 1;

 

		// 此方法有问题
		// require_once(DEDEINC.'/arc.archives.class.php');
		// 获取当前电影的所有相关信息数据
		// $res2 = new Archives($aid);

 		// 自定义获取当前电影的所有相关信息数据
		$res2 = $this->Model('mpinglun')->archive_infos($aid);
		// $archive_row = GetOneArchive($res2['id']);
		$GLOBALS['archive_infos'] = $res2;
		$GLOBALS['aid'] = $aid;

		// 分配给模板文件
		$GLOBALS['res'] = $res;
		$GLOBALS['plnum'] = count($res);
		$this->SetTemplate('list_pl.html');
		$this->Display();



		/**
		 * 下面代码在运行时，报错：内存使用超过上限
		 */
		// 拼接用于显示结果的模板路径
		// $templatefile = DEDEROOT."/pinglun/templates/default/list_pl.html";
		// 设置用于显示结果的模板
		// $dlist->SetTemplate($templatefile);
		// 设置用于查询结果的sql语句
		// $dlist->SetSource($sql);
		// var_dump($dlist);
		// die();
		// 引入模板文件html代码，执行并显示
		// $dlist->Display();
	}


	// 添加一条评论
	function ac_addpl(){
		// 引入全局对象(当前用户的相关信息)
		global $cfg_ml;

		// 如果当前没有用户处于登录状态，不允许发表评论
		if (!$cfg_ml->M_ID) {
			ShowMsg("请先登录，再发表评论", -1, 0, 2000);
			return;
		}

		$title   = request('title', '');
		$content = request('content', '');
		$movieid = request('movieid', '');
		$addtime = time();
		$userid  = $cfg_ml->M_ID;

		if ($title == "" || $content == "") {
			ShowMsg("对不起，请先输入评论内容", -1, 0, 2000);
			return;
		}

		// 调用Model执行添加操作
		$res = $this->Model('mpinglun')->add_pl($userid, $title, $content, $addtime, $movieid);

		if ($res) {
			// ShowMsg("添加评论 成功", -1, 0, 2000);
			ShowMsg("添加评论 成功", "?c=pinglun&a=listpl&aid=$movieid", 0, 1500);
		}else{
			ShowMsg("添加评论 失败", -1, 0, 2000);
		}
	}
}


?>