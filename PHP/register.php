<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('connection.php');

if (isset($_REQUEST['username'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur 
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 


 
  // récupérer le mot de passe 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);

  $query = "INSERT into `users` (username, password)
        VALUES ('$username' , '".hash('sha256', $password)."')";
 
 $query2 = "INSERT into `users` (username, password) VALUES('admiiin' , 'adminaaaa')" ;
 $res = mysqli_query($conn, $query);
  echo($query); 
  echo($res) ;
  echo('resulttt22'); 



    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title">
  </h1>
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="username" 
  placeholder="Nom d'utilisateur" required />
  
    
  
    <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" 
  value="S'inscrire" class="box-button" />
  
    <p class="box-register">Déjà inscrit? 
  <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>