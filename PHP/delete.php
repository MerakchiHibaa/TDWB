
<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_REQUEST["culturedel"] )) {
		$culturedel = stripslashes($_REQUEST['culturedel']);
		$culturedel = mysqli_real_escape_string($conn, $culturedel); 


	
	  $query = "DELETE from `culture`where Nom_culture = '$culturedel'";
		$res = mysqli_query($conn, $query);
		if($res) {
			echo("la culture est bien supprimée") ;
		} 
    }
    else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_REQUEST["especedel"] )) {
        $especedel = stripslashes($_REQUEST['especedel']);
		$especedel = mysqli_real_escape_string($conn, $especedel); 

		
        $query = "DELETE FROM `elevage` where Nom_animal ='$especedel'";
          $res = mysqli_query($conn, $query);
          if($res) {
              echo("lanimal est bien supprimé") ;
          } 
    }

    header('Location: adminhome.php') ; 
    exit() ;
        
        ?>