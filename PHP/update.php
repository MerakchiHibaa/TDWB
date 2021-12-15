
<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_REQUEST["cultureup"] ,  $_REQUEST['superficieup'], $_REQUEST['totalprodup'])) {
		$cultureup = stripslashes($_REQUEST['cultureup']);
		$cultureup = mysqli_real_escape_string($conn, $cultureup); 

		$superficieup = stripslashes($_REQUEST['superficieup']);
		$superficieup = mysqli_real_escape_string($conn, $superficieup);

		$totalprodup = stripslashes($_REQUEST['totalprodup']);
		$totalprodup = mysqli_real_escape_string($conn, $totalprodup);
	$select = "SELECT * from `culture` where Nom_culture= '$cultureup' ";

    $query = "UPDATE `culture` SET Superficie= '$superficieup',Production ='$totalprodup' WHERE Nom_culture= '$cultureup' ";
    $query2 = "INSERT into `culture` (Nom_culture, Superficie, Production)
    VALUES ('$cultureup', '$superficieup', '$totalprodup')";

    $res = mysqli_query($conn, $select);
    
		if($res) {
            if (mysqli_num_rows($res) == 1) {    //s'il existe déja    
            $res2 = mysqli_query($conn, $query);
            if($res2) {
                echo("la culture est bien modifiée") ;
            } 
            }
            else {
                $res2 = mysqli_query($conn, $query2);
                if($res2) {
                    echo("la culture est bien insérée") ;
                } 
            }
		} 

       
    }
    else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_REQUEST["especeup"] ,  $_REQUEST['numberup'])) {
        $especeup = stripslashes($_REQUEST['especeup']);
		$especeup = mysqli_real_escape_string($conn, $especeup); 

		$numberup = stripslashes($_REQUEST['numberup']);
		$numberup = mysqli_real_escape_string($conn, $numberup);
        $select = "SELECT * from `elevage` where Nom_animal='$especeup' ";

        $query = "UPDATE `elevage` SET Nombre_tete= '$numberup' WHERE Nom_animal='$especeup' " ;
        $query2 = "INSERT into `elevage` (Nom_animal, Nombre_tete) VALUES ('$especeup', '$numberup')";
         
        $res = mysqli_query($conn, $select);
        if($res) {
            if (mysqli_num_rows($res) == 1) {    //s'il existe déja    
            $res2 = mysqli_query($conn, $query);
            if($res2) {
                echo("lanimal est bien modifiée") ;
            } 
            }
            else {
                $res2 = mysqli_query($conn, $query2);
                if($res2) {
                    echo("lanimal est bien insérée") ;
                } 
            }
		} 
    }

     header('Location: adminhome.php') ; 
    exit() ; 
        
        ?>