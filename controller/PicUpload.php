<?php
session_start(); 
require_once('DBconnection.php'); 

//echo "fuck";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    $eid = $conn->real_escape_string($_POST['hero']);
    $qr="SELECT * FROM emblem WHERE eid=".$eid;
    $result=$conn->query($qr);
    $row=$result->fetch_assoc();

    $target_dir="../uploads/";

    //$eid = $row['eid'];
    $prevnoOfFiles = $row['numberofFile'];
    	
    $tempNoFIles=sizeof($_FILES['file']['name']);

    $numberOfFiles = $prevnoOfFiles + $tempNoFIles;

    echo $numberOfFiles;

	$index=$prevnoOfFiles;

	$dbFileArray=array();

	while ($index >= $prevnoOfFiles && $index < $numberOfFiles) 
	{
		//$fileType=pathinfo($_FILES["file"]["name"][$index]);
		$fileName=$_FILES["file"]["name"][$index];
		$target_file=$target_dir."emblem".$eid."-".$fileName;
		$save_file="./uploads/"."emblem".$eid."-".$fileName;
		move_uploaded_file($_FILES["file"]["tmp_name"][$index], $target_file);

		$dbFileArray[$index]=$save_file;
		//echo "saved in db as ".$dbFileArray[$index]."\r\n";
		//echo "saved as".$target_file."\r\n";

		$index=$index+1;
	}

	$index=$prevnoOfFiles;
    $serial=$prevnoOfFiles+1;
    echo $dbFileArray[$index];
    
    $qr="UPDATE emblem SET numberofFile = "."'".$numberOfFiles."'".",";

	
	while ( $serial<=$numberOfFiles-1){
        $qr=$qr." File".$serial;
        $qr=$qr." = "."'".$dbFileArray[$index]."'".",";
        
		$serial=$serial+1;
    }
    
    $qr=$qr." File".$serial;
    $qr=$qr." = "."'".$dbFileArray[$index]."'";
        
	
    $qr=$qr." WHERE eid = "."'".$eid."'";
    
    $index=0;
	
	if($conn->query($qr)==true)
		//echo "fuck";
		header('Location: ../EBhero.php');
		//header('Location: ../waitingforblogapproval.php');
	else
		echo "error".$conn->error;
}


?>