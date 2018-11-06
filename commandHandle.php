<?php
require("mysqlHandle.php");
require("ssr_client.php");

//对数据库操作封装了一层，对指令进行操作
class commandHandle{
	
	private $service;
	
	public function __construct(){
		$this->service = new mysqlHandle("localhost","root","123456","weixin");
	}
	public function delete_command($command,$result){
		$sql = "delete from command_table where command = '".$command."' and result = '".$result."';";
		$this->service->operate($sql);
	}
	public function create_command(){
		$sql = "create table command_table(command varchar(50) not null, result varchar(100) not null, primary key(command,result))DEFAULT CHARSET=utf8;";
		$this->service->operate($sql);
	}
	public function clear_command(){
		$sql = "delete from command_table;";
		$this->service->operate($sql);
	}
	public function drop_command(){
		$sql = "drop table command_table;";
		$this->service->operate($sql);
	}
	public function privilege_check($openid,$command_level){
		$tmp = $this->service->query("select user_level from user_table where user_id = '".$openid."';");
		//print_r($tmp);
		
		return (($command_level==0)||(!empty($tmp)&&($tmp[0]['user_level'] >= $command_level)))?true:false;
	}
	
	public function para_num_check($command_para,$command_type,$para_cnt){
		if($command_type ==4 || $command_type == 5){
			return ($para_cnt + 1 >= $command_para)?true:false;
		}else{
			return ($para_cnt >= $command_para)?true:false;
		}
	}
	
	public function run($open_id,$command,$array){
		$result = $this->query_command($command);
		if(empty($result))
			return "没有该命令";
		if(!$this->privilege_check($open_id,$result['command_level']))
			return "权限不够,请注册获得更多的权限或者联系管理员";
		if($this->para_num_check($result['command_para'],$result['command_type'],count($array))){
			//0类型直接查看结果然后返回
			if($result['command_type'] == 0){
				$result = $result['command_result'];
			//1类型参数执行
			}else if($result['command_type'] == 1){
				if($result['command_para'] > 0)
					return $this->service->operate(vsprintf($result['command_sql'],$array));
				else
					return $this->service->operate($result['command_sql']);
			}
			//2类型参数查询
			else if($result['command_type'] == 2){
				$tmp = array();
				if($result['command_para'] > 0){
					$tmp = $this->service->query(vsprintf($result['command_sql'],$array));
				}
				else
					$tmp = $this->service->query($result['command_sql']);
				if(empty($tmp))
					return "没有查询结果";
				else{
					$res = "";
					foreach($tmp as $a)
						$res .= implode($a)."\n";
					return $res;
				}
			}
			//三类型递归执行
			else if($result['command_type'] == 3){
				return run(result['result'],$array);
			}
			//4类型要用到openid执行
			else if($result['command_type'] == 4){
				array_unshift($array,$open_id);
				return $this->service->operate(vsprintf($result['command_sql'],$array));
			}
			//5类型用到openid查询
			else if($result['command_type'] == 5){
				array_unshift($array,$open_id);
				$tmp = $this->service->query(vsprintf($result['command_sql'],$array));
				if(empty($tmp))
					return "没有查询结果";
				else{
					$res = "";
					foreach($tmp as $a)
						$res .= implode($a)."\n";
					return $res;
				}
			}
			//6类型直接返回结果但是用news类型返回
			else if($result['command_type']==6){
				return array($result['command_name'],$result['command_manual'],$result['command_result']);
			}
			//7类型利用反射机制，className和methodName在result中，利用 @分割
			else if($result['command_type']==7){
				$para = explode(' ',$result['command_result']);
				$class = new ReflectionClass($para[0]);
				$instance = $class->newInstanceArgs();
				$method = $class->getmethod($para[1]);
				return $method->invoke($instance);
			}
			else{
				return '该指令无法解释';
			}
			
		}
		else{
			return "参数个数不正确";
		}
		return $result;
	}
	
	
	public function insert_command($command_id,$command_name,$command_sql,$command_type,$command_result,$command_para,$command_manual,$command_level){
		$sql = "insert into command_table values(%d,'%s','%s',%d,'%s',%d,'%s','%d');";
		$sql = sprintf($sql,$command_id,$command_name,$command_sql,$command_type,$command_result,$command_para,$command_manual,$command_level);
		//return $sql;
		$this->service->operate($sql);
	}
	
	public function query_command($command_name){
		$sql = "select * from command_table where command_name = '%s';";
		$sql = sprintf($sql,$command_name);
		$result = $this->service->query($sql);
		if(!empty($result))
			return $result[0];
		else
			return $result;
	}
	
}

?>