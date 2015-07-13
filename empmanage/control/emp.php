<?php  


class emp extends Control{
	// 控制器中的方法名必须是 "ac_"作为前缀
	public function ac_test(){
		echo "这里是emp control";
	}

	// 显示所有雇佣信息
	public function ac_showemp(){
		// 调用操作数据库的Model 完成数据查询
		$rows = $this->Model('memp')->list_emp();
		// 将结果数据分配给指定的模板文件，用于数据显示
		$GLOBALS['res'] = $rows;

		// 指定模板文件
		$this->SetTemplate('showemp.html');
        $this->Display();
	}
}


?>