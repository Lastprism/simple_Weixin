<?php
header("Content-type: text/html; charset=utf-8");
define("ACCESS_TOKEN", "13_4Jjg1D2gVULX07sCtcyIs2Jp2PVX8OX6iuOOfvyqEFQ-8gLThDZwiygo-NR6FWYtKYzgNR7IgYasBFz0MDmsYaiHPCvo3i5qo7lzatrMBgCvw5Y2oiUdZW11xPUTwwsW4A59d9P5lpDxNa2GETHeADALAO");


//创建菜单
function createMenu($data){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".ACCESS_TOKEN);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tmpInfo = curl_exec($ch);
if (curl_errno($ch)) {
  return curl_error($ch);
}

curl_close($ch);
return $tmpInfo;

}

//获取菜单
function getMenu(){
return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".ACCESS_TOKEN);
}

//删除菜单
function deleteMenu(){
return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".ACCESS_TOKEN);
}





$data = '{
     "button":[
      {
           "type":"click",
           "name":"所有指令",
           "key":"command"
      },{
           "type":"click",
           "name":"所有电影",
           "key":"movie"
      },{
           "type":"click",
           "name":"所有pdf",
           "key":"pdf"
      }
	  ]
}';




echo createMenu($data);
//echo getMenu();
//echo deleteMenu();