<?php 


class memp extends Model{
	// 从数据库中获取所有的雇佣
	public function list_emp(){
		$sql = "select * from dede_emps";

		$this->dsql->SetQuery($sql);
		$this->dsql->Execute();

		// 将数据结果集放入数组中
		$rows = array();
        while($row = $this->dsql->GetArray())
        {
            $rows[] = $row;
        }
        return $rows;
	}
}


?>