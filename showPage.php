<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>
	table {
		border-collapse: collapse;
		text-align:center;
		width:50%;
	}
	tr{
		height:100px;
	}
	table, td, tr {
		border: 1px solid black;
	}
	
	a{ 
		text-decoration:none;
	} 
	#ctr{
		
	}
	button{
		width:150px;
		height:50px;
	}
	
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=no" />
	<?php
		$show_type = (isset($_GET['show_type']))?$_GET['show_type']:'movie';	
		echo '<title>'.$show_type.'</title>'; 
	?>
</head>
<body>
	<center>
		<table border='1'>
			<?php
				require('mysqlHandle.php');
				$page = (isset($_GET['page']))?$_GET['page']:0;
				$action = (isset($_GET['action']))?$_GET['action']:'0';
				
				if($action == "up")	$page --;
				else if($action == 'down')	$page ++;
					
				$test = new mysqlHandle("localhost","root","123456","weixin");
				$sql = sprintf("select * from %s_table limit %d,%d;",$show_type,$page*30,30);
				$sql2 = sprintf("select count(*) from %s_table;",$show_type);
				$res = $test->query($sql2);
				$cnt = empty($res)?0:$res[0]['count(*)'];
				//echo $sql ;
				echo '<br>';
				$res = $test->query($sql);
				if(empty($res))
					echo "啥也都没有啦";
				else{
					foreach($res as $a)
					{
						echo '<tr>';
						foreach($a as $b){
							echo '<td>'.$b.'</td>';
						}
						echo '</tr>';
					}
				}
			?>
		</table>
	</center>
	</br>
	</br>
	
	<center>
		<div id = 'ctr'>
			<?php
				if($page == 0)
					echo '<button>已经是第一页了</button>';
				else{
					echo sprintf('<a href="?action=up&page=%s&show_type=%s">',$page,$show_type);
					echo '<button>上一页</button></a>';
				}
				echo "  ";
				if($page*30+29 >= $cnt)
					echo '<button>已经是最后一页了</button>';
				else{
					echo sprintf('<a href="?action=down&page=%s&show_type=%s">',$page,$show_type);
					echo '<button>下一页</button></a>';
				}
			?>
		</div>
	</center>
</body>
</html>