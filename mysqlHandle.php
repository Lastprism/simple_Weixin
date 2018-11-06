<?php


//对数据库操作
class mysqlHandle{
	private $server_name;//服务器地址
	private $username;	//用户名
	private $password;	//密码
	private $database;	//数据库名字
	private $conn;		//连接类
	
	//构造函数
	public function __construct($sname,$uname, $pwd, $db){
		$this->server_name = $sname;
		$this->username = $uname;
		$this->password = $pwd;
		$this->database = $db;
	}
	
	
	//连接数据库
	public function connect_sql(){
		$this->conn = new mysqli($this->server_name, $this->username, $this->password);
		if($this->conn->connect_error)
			echo "fail to connect mysql!";
		$this->conn->query("set names 'utf8'");
		$this->conn->select_db($this->database);
	}
	
	//关闭数据库
	public function connect_close(){
		$this->conn->close();
	}
	
	
	//查询服务 返回查询结果(一个数组)
	public function query($sql){
		$this->connect_sql();
		$result = $this->conn->query($sql);
		//print_r($result);
		$data = array();
		if(!empty($result)){
			while($tmp = $result->fetch_assoc()){
				$data[] = $tmp;
			}
		}
		$this->connect_close();
		//print_r($data);
		return	$data;
	}
	
	//插入删除创建...返回成功或者失败
	public function operate($sql){
		$this->connect_sql();
		$result = "";
		if ($this->conn->query($sql) === TRUE) {
			$result = "执行成功";
		} else {
			$result = "执行失败";
			echo "错误原因: " . $this->conn->error;
		}
		$this->connect_close();
		return $result;
	}
	
}



?>