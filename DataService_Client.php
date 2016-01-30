<?php
try{
  $sClient = new SoapClient('http://localhost/phptest/DataService.wsdl');
  
  $params = "kamran";
  $response = $sClient->getInfo($params);
 if($sClient->fault)
{
	echo "FAULT: <p>Code: (".$client->faultcode.")</p>";
	echo "String: ".$client->faultstring;
}
else
{
	$r = $response;
	$count = count($r);
	?>
	 <table border="0" cellspacing="5" cellpadding="5">
    <tr>
    	<th>ID</th>
    	<th>First Name</th>        
    	<th>Last Name</th>               
    </tr>
	<?php
	  for($i=0;$i<=$count-1;$i++){
		  ?>
		   <tr>
    	<td><?=$r[$i]['id']?></td>
    	<td><?=$r[$i]['fname']?></td>
    	<td><?=$r[$i]['lname']?></td>                   
    </tr>
		  <?php
	  }
	  ?>
	  </table>
	  <?php
}
} catch(SoapFault $e){
  var_dump($e);
}
?> 