<?php


class robotHandle{
	//保存图灵返回结果
	protected $content;
	
	
	public function __construct($keyword){
		$this->content = $this->callTuling($keyword);
	}
	//调用机器人
	private function callTuling($keyword){
		$apikey = "a8d8b5be984446d6bddf8c361f9f8caf";
		$apiURL = "http://www.tuling123.com/openapi/api?key=KEY&info=INFO";
		
		$reqInfo = $keyword;
		$url = str_replace("INFO", $reqInfo, str_replace("KEY", $apikey, $apiURL));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$file_contents = curl_exec($ch);
		curl_close($ch);
		
		//获取图灵机器人返回的数据，并根据code值的不同获取到不用的数据
		$message = json_decode($file_contents,true);
		$result = "";
		if($message['code'] == 100000){
			$result = $message['text'];
		}else if(message['code'] == 200000){
			$text = message['text'];
			$url = $message['url'];
			$result = $text." ".$url;
		}else if($message['code'] == 302000){
			$text = $message['text'];
			$url = $message['list'][0]['detailurl'];
			$result = $text." ".$url;
		}else{
			$result = "求求你说人话好不好？要不然就闭嘴吧";
		}
		return $result;	
	}
	public function __toString(){
		return $this->content;
	}
}
?>