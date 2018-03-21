<?php

$mysql_conf = array(
    'host'    => '127.0.0.1:3306', 
    'db'      => 'easyui', 
    'db_user' => 'root', 
    'db_pwd'  => '', 
    );
$mysql_conn = @mysql_connect($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if (!$mysql_conn) {
    die("could not connect to the database:\n" . mysql_error());//诊断连接错误
}
mysql_query("set names 'utf8'");//编码转化
$select_db = mysql_select_db($mysql_conf['db']);
if (!$select_db) {
    die("could not connect to the db:\n" .  mysql_error());
}
$sql = "select * from user;";
$res = mysql_query($sql);
if (!$res) {
    die("could get the res:\n" . mysql_error());
}


$results = array();
while ($row = mysql_fetch_assoc($res)) {
$results[] = $row;
}

// 将数组转成json格式

echo '{"total":'.count($results).',"rows":';

echo json_encode($results);


echo '}';





/*
echo '{"total":3,"rows":[';

while ($row = mysql_fetch_assoc($res)) {


$j = json_encode($row);
  print_r($j);
  echo ",";

}


echo ']}';


*/

mysql_close($mysql_conn);





/*

echo '{"total":3,"rows":[{"id":"1","name":"\u5f20\u4e09","mobile":"13112341234","address":"\u5e7f\u4e1c\u7701","department":"\u6280\u672f\u90e8","status":"1"},{"id":"2","name":"\u674e\u56db","mobile":"13444445566","address":"\u5e7f\u897f\u7701","department":"\u8bbe\u8ba1\u90e8","status":"1"}]}';



/*
 $json = array(
	        'total'=> 3,
	        'rows'=>array(
			            array(
			                'value'=>'1',
			                'color'=>"#DC143C"
			            ),
			            array(
			                'value'=>'2',
			                'color'=>"#8B1A1A"
			            ),
			            array(
			                'value'=>'3',
			                'color'=>"#FF0000"
			            ),
			            array(
			                'value'=>'5',
			                'color'=>"#FF00FF"
			            )
	        			)
	        
	    );
	
$json = json_encode($json);


 echo "<br>";

echo $json;

*/
?>