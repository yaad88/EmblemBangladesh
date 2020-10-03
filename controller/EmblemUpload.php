<?php
session_start(); 
require_once('DBconnection.php'); 

//echo "fuck";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$hname=$conn->real_escape_string($_POST['hname']);

    $desc = $conn->real_escape_string($_POST['desc']);
	

	//echo "Email: ".$email.'\n';
	//echo "Author: ".$name.'\n';
	//echo "Blog: ".$blog.'\n';
	$qr="SELECT MAX(eid) FROM emblem AS neweid";
	$result=$conn->query($qr);
	$ara=$result->fetch_assoc();

	$numOfPreviousPost=$ara['MAX(eid)'];
	$eid=$numOfPreviousPost+1;
	echo "New post id is ".$eid." ";
    
    $target_dir="../uploads/";
    // if (!is_uploaded_file($_FILES['hmoment']['tmp_name'])) 
	// {
	// 	echo "No moment Uploaded  ";
	// 	$qr="Insert into emblem(eid,hero_name,hero_description,hero_moment)".
	// 			" values("."'".$eid."'".","."'".$hname."'".","."'".$desc."'".")";
	// 	//echo $qr;

	// 	if($conn->query($qr))
	// 		//echo "fuck";
	// 		header('Location: ../EBhero.php');
	// 	else
	// 		echo "error".$conn->error;
	// 	exit();

    // }

    $fileName=$_FILES["hmoment"]["name"];
	$target_file=$target_dir."emblem".$eid."-".$fileName;
    $save_file="./uploads/"."emblem".$eid."-".$fileName;
    $hmoment = $save_file;
    move_uploaded_file($_FILES["hmoment"]["tmp_name"], $target_file);

    // if (!is_uploaded_file($_FILES['hmoment']['tmp_name'])) 
	// {
	// 	echo "No moment Uploaded  ";
	// 	$qr="Insert into emblem(eid,hero_name,hero_description,hero_moment)".
	// 			" values("."'".$eid."'".","."'".$hname."'".","."'".$desc."'".")";
	// 	//echo $qr;

	// 	if($conn->query($qr))
	// 		//echo "fuck";
	// 		header('Location: ../EBhero.php');
	// 	else
	// 		echo "error".$conn->error;
	// 	exit();

    // }

    $fileName=$_FILES["hface"]["name"];
	$target_file=$target_dir."emblem".$eid."-".$fileName;
    $save_file="./uploads/"."emblem".$eid."-".$fileName;
    $hface = $save_file;
    move_uploaded_file($_FILES["hface"]["tmp_name"], $target_file);


    // $qr="Insert into emblem(eid,hero_name,hero_description,hero_moment)";
    // $qr=$qr." values ("."'".$eid."'".","."'".$hname."'".","."'".$desc."'".","."'".$save_file."'".")";
    

    // if($conn->query($qr))
	// 		//echo "fuck";
	// 		header('Location: ../EBhero.php');
    // else
    //     echo "error".$conn->error;
	
    $numberOfFiles=sizeof($_FILES['file']['name']);
    echo $numberOfFiles;
	if (!is_uploaded_file($_FILES['file']['tmp_name'][0])) 
	{
		echo "No file Uploaded  ";
		$numberOfFiles=1;
		$qr="Insert into emblem(eid,hero_name,hero_moment,hero_face,hero_description,File1)".
				" values("."'".$eid."'".","."'".$hname."'".","."'".$hmoment."'".","."'".$hface."'".","."'".$desc."'".",
				"."'"."./images/bd_back.jpg"."'".")";
		//echo $qr;

		if($conn->query($qr))
			//echo "fuck";
			header('Location: ../index.html');
		else
			echo "error".$conn->error;
		exit();

	}
	//else
	$index=0;

	$dbFileArray=array();

	while ($index < $numberOfFiles) 
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

	$index=0;
	$serial=1;
	
	
	$qr="Insert into emblem(eid,hero_name,hero_moment,hero_face,hero_description,numberofFile";
	while ( $serial<=$numberOfFiles){
		$qr=$qr.",File".$serial;
		$serial=$serial+1;
	}
	
	$qr=$qr.")";

	

	$qr=$qr." values ("."'".$eid."'".","."'".$hname."'".","."'".$hmoment."'".","."'".$hface."'".","."'".$desc."'".","."'".$numberOfFiles."'";
				
	$index=0;
	while ( $index<$numberOfFiles){
		$qr=$qr.",'".$dbFileArray[$index]."'";
		$index=$index+1;
	}
	
	
	$qr=$qr.")";
	//echo $qr;
	if($conn->query($qr)==true)
		//echo "fuck";
		header('Location: ../index.php');
		//header('Location: ../waitingforblogapproval.php');
	else
		echo "error".$conn->error;
}
?>