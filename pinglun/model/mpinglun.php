<?php  


class mpinglun extends Model{
	// 通过指定aid获取对应的评论
	function list_pl($aid){
		// 因为需要获取该用户的头像，头像信息在dede_member表中，所以使用联合查询
		$sql = "select a.*, b.face, b.uname from dede_a67_comments a left join dede_member b on a.userid = b.mid where a.movieid = $aid";
		$this->dsql->SetQuery($sql);
		$res = $this->dsql->Execute();
		$rows = array();
		while ($row = $this->dsql->GetArray()) { 
			// 装入数组
			$rows[] = $row;
		}
		return $rows;
	}

	function archive_infos($aid){
		$sql = "select a.*, b.* from dede_archives a left join dede_addonmovie b on a.id = b.aid where a.id = $aid";
 		
 		$this->dsql->SetQuery($sql);
		$res = $this->dsql->Execute();
		$rows;
		while ($row = $this->dsql->GetArray()) { 
			// 装入数组
			$rows = $row;
		}
		return $rows;
	}

	// 添加一条评论
	function add_pl($userid, $title, $content, $addtime, $movieid){
		$sql = "insert into dede_a67_comments(userid, title, content, addtime, movieid) values($userid, '".$title."', '".$content."', $addtime, $movieid)";

		$affected_rows = $this->dsql->ExecuteNoneQuery2($sql);
		if ($affected_rows) {
			return true;
		}else{
			return false;
		}
	}
}

?>