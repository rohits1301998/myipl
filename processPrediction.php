<?php

$timeData=file_get_contents('http://api.timezonedb.com/v2/get-time-zone?key=JEXI0R6B5SQL&format=json&by=zone&zone=Asia/Kolkata');
$jsonTimeData=json_decode($timeData,true);
$time=intval(explode(":",explode(" ",$jsonTimeData['formatted'])[1])[0]);
if($time>=14){
	echo "Oops,you cannot give predictions after 2pm";
	exit;
}
session_start();
include('conn.php');
if(!empty($_POST['predictionInfo'])){
	$info=json_decode($_POST['predictionInfo'],true);
	$id=$_SESSION['user_srno'];
	$match1=$info['match1'];
	$match2=$info['match2'];
	$alreadyPredicted=mysqli_query($conn,"select user_id from `predictions` where `user_id`=$id");
	//echo mysqli_num_rows($result);
	if(mysqli_num_rows($alreadyPredicted)==0){
		$result=mysqli_query($conn,"insert into `predictions` (user_id,match1,match2) values($id,'$match1','$match2');");
		echo "Successfully registered";

	}
	else if(mysqli_num_rows($alreadyPredicted)==1){
		$result=mysqli_query($conn,"update `predictions` set match1=IF(match1='null','$match1',match1),match2=IF(match2='null','$match2',match2) where `user_id`=$id");
		echo "Successfully registered";		
	}
	else{
		echo "some error occured";		
	}
	
}
mysqli_close($conn);

?>