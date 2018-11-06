<?php

require('robotHandle.php');	//机器人服务文件
require('commandHandle.php'); //命令服务文件

//业务处理类
class lastprism{
	private $command_service;
	
	public function __construct(){
		$this->command_service = new commandHandle();
	}
	/**
     * 用户关注服务
     * @param $openid
     * @return string
     */
    public function subscribe($openid)
    {

        $text = "欢迎关注\n\n\n直接发信息可与机器人聊天\n\n\n'#命令'可进行其他操作\n如'#cmd'可返回所有命令";
        return $text;
    }
	/**
     * 取消关注
     */
    public function unSubscribe()
    {
		
    }

	/**
     * 对文本事件的响应逻辑
     *
     * @param $openid 用户微信id
     * @param $input 用户输入文字
     * @return string   系统输出文字
     */
    public function text($openid, $input)
    {
        $text = $input;
        switch (substr($input, 0, 1)) {
			case '#':
            { 	//解析命令
				$array = explode(" @",$input);
				$command = array_shift($array);
				$text = $this->command_service->run($openid,$command,$array);
                break;
            }
			default:
            {
				$text = (string)(new robotHandle($input));
                break;
            }
        }
        return $text;
    }
}




?>