<?php
if(!extension_loaded("soap")){
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("DataService.wsdl");

function getInfo($RetData){
	
  $conn = mysql_connect('localhost','root','root');
	mysql_select_db('sakila', $conn);
	
	$sql = "SELECT * FROM actor";
	$q	= mysql_query($sql);
	while($r = mysql_fetch_array($q)){
	  $items[] = array('id'=>$r['actor_id'],
                          'fname'=>$r['first_name'],
                          'lname'=>$r['last_name']);
	}
	return $items;
}

$server->AddFunction("getInfo");
$server->handle();

?>