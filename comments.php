<?php
//echo "hello1";
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
 
    try{
	$PDO = new PDO('mysql:host=localhost;dbname=FM', 'webroot', 'webroot-');
    $q = $PDO->prepare("SELECT * FROM FM.`comments`");
    $q->execute();
    $r = $q->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($r);
    //print_r( $q->errorInfo());

    }catch(PDOException $e){
    	echo  "ERROR:".$e;
    }
}else{
	try{
	$PDO = new PDO('mysql:host=localhost;dbname=FM', 'webroot', 'webroot-');
	$name = $_POST['name'];
	$message = $_POST['message'];
        $q = $PDO->prepare("INSERT INTO FM.comments (name,message) VALUES('".$name."','".$message."')");
        if(!$q->execute()){
        	echo "Error";
        }else{
        	echo " success";
        }
    }catch(PDOException $e){
    	echo  "ERROR:".$e;
    }


}
?>