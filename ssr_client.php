<?php
class ssr_client{
	private $ip = "127.0.0.1";
	private $port = "10010";
	private $socket;
	public function conn(){
		$this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($this->socket < 0) {
			echo "socket_create() failed: reason: " . socket_strerror($this->socket) . "\n";
		}
		$result = socket_connect($this->socket, $this->ip, $this->port);
		if ($result < 0) {
			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
		}
		return true;
	}
	public function send($msg){
		if(!socket_write($this->socket, $msg, strlen($msg)))
			return "发送失败";
	}
	
	public function rev(){
		$buff = "";
		while($tmp = socket_read($this->socket,1024)){
			$buff .= $tmp;
		}
		return $buff;
	}
	
	public function close(){
		socket_close($this->socket);
	}
	
	public function run(){
		$this->conn();
		$this->send("1");
		$res = $this->rev();
		$this->close();
		return $res;
	}
}

?>