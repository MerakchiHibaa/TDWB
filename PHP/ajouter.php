

<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_REQUEST["culture"] ,  $_REQUEST['superficie'], $_REQUEST['totalprod'])) {
		$culture = stripslashes($_REQUEST['culture']);
		$culture = mysqli_real_escape_string($conn, $culture); 

		$superficie = stripslashes($_REQUEST['superficie']);
		$superficie = mysqli_real_escape_string($conn, $superficie);

		$totalprod = stripslashes($_REQUEST['totalprod']);
		$totalprod = mysqli_real_escape_string($conn, $totalprod);
	
	
	  $query = "INSERT into `culture` (Nom_culture, Superficie, Production)
	  VALUES ('$culture', '$superficie', '$totalprod')";
		$res = mysqli_query($conn, $query);
		if($res) {
			echo("la culture est bien insérée") ;
		} 
    }
    else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_REQUEST["espece"] ,  $_REQUEST['number'])) {
        $espece = stripslashes($_REQUEST['espece']);
		$espece = mysqli_real_escape_string($conn, $espece); 

		$number = stripslashes($_REQUEST['number']);
		$number = mysqli_real_escape_string($conn, $number);
        $query = "INSERT into `elevage` (Nom_animal, Nombre_tete)
        VALUES ('$espece', '$number')";
          $res = mysqli_query($conn, $query);
          if($res) {
              echo("lanimal est bien insérée") ;
          } 
    }

    header('Location: adminhome.php') ; 
    exit() ;
        
        ?>