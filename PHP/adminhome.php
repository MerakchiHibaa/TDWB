<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }

 
  ?>
<html>
  <head>
  <link rel="stylesheet" href="../main.css" />


  
  </head>
  <body>
    <div class="sucess">
    <h1 style="text-align: center ;">Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <p style="text-align: center ;">C'est votre espace admin.</p>
    <nav>
			<ul>
				<li>
					<a class="lien" href="#">Accueil</a>
				</li>
				<li>
					<a class="lien" href="#">Types d'agriculture</a>
					<div class="links">
						<ul class="type_agriculture">
							<li>
								<a href="#">l'agriculture conventionnelle</a>
							</li>
							<li><a href="#">l'agriculture biologique</a></li>
							<li><a href="#">l'agriculture durable</a></li>
							<li><a href="#">l'agriculture Raisonnée</a></li>
							<li><a href="#">l'agriculture Intégrée</a></li>
						</ul>
					</div>
				</li>
				<li>
					<a class="lien" href="#">Contact</a>
				</li>
			</ul>
		</nav>
		<main>
			<div class="container">
				<!-- <video autoplay loop muted>
					<source src="../images/agriculture.mp4" />
				</video> -->
				

			</div>
			<section>
				<h2>Statistiques</h2>
				<div>
					 <!--< figure>
						<figcaption>Principale production végétales mondiales</figcaption>
						<table id="table-vgt" class="tableau">
							<thead>
								<th scope="col">Culture</th>
								<th scope="col">Superficie cultivé (1000 ha)</th>
								<th scope="col">Production totale (1000 tonnes)</th>
							</thead>
							<tbody></tbody>
						<tfoot>
								<tr id="total-vgt">
									<th>Total</th>
									<td>0</td>
									<td>0</td>
								</tr>
							</tfoot>
						</table>
					</figure>
					<figure>
						<figcaption>Principaux élévages mondiaux</figcaption>
						<table id="table-anm" class="tableau">
							<thead>
								<th scope="col">Espèce</th>
								<th scope="col">Nombre (1000 tetes)</th>
							</thead>
							<tbody></tbody>
							<tfoot>
								<tr id="total-anm">
									<th>Total</th>
									<td>0</td>
								</tr>
							</tfoot>
						</table>
					</figure>  -->
					<?php
					 include_once("connection.php");

    $q = "SELECT * FROM elevage";
    echo "<table id='table-anm' class='tableau'>
<thead>
  <th scope='col'>Espèce</th>
  <th scope='col'>Nombre (1000 tetes)</th>
</thead>";
$result = mysqli_query($conn,$q) ;
    foreach ($result as $row) {
      echo "<tr>
							<th>" . $row["Nom_animal"] . "</th>
							<td>" . $row["Nombre_tete"] . "</td>
              
						</tr>";
    }
    echo "</table>";

    $q = "SELECT * FROM culture";
    echo "<table id='table-vgt' class='tableau'>
<thead>
<th scope='col'>Superficie cultivé (1000 ha)</th>
<th scope='col'>Culture</th>
<th scope='col'>Production totale (1000 tonnes)</th>
</thead>";
$result = mysqli_query($conn,$q) ;
    foreach ($result as $row) {
      echo "<tr>
							<th>" .  $row["Nom_culture"] . "</th>
							<td>" . $row["Superficie"] . "</td>
							<td>" . $row["Production"]  . "</td>
							
						</tr>";
    }
    echo "</table>"; 
					  ?>
	
				</div>


				<div  style="align:right ; justify-content: space-evenly ;"> 
<style>
	.buttons {
	padding: 0.8rem 1rem;
	margin-top: 2rem;
	width: fit-content;
	border-radius: 6px;
	background-color: #25a59a;
	border: none;
	color: #fff;
	cursor: pointer;"
	}

 </style>
 <script>
	function ajoutphp(e) {
  document.getElementById('secadd').style.display = (e.onclick? 'block':'none');
  document.getElementById('secdel').style.display = "none" ; 
  document.getElementById('secup').style.display = "none" ; 


 }

 function deletephp(e) {
  document.getElementById('secdel').style.display = "block" ; 
  document.getElementById('secadd').style.display = "none" ; 
  document.getElementById('secup').style.display= "none" ; 

 }
 function updatephp(e) {
  document.getElementById('secup').style.display ="block" ; 
  document.getElementById('secadd').style.display ="none" ; 
  document.getElementById('secdel').style.display ="none" ; 

 }

 
 </script>

					<input onclick="deletephp(this)" id="delphp" class="buttons" value="Supprimer" type="button" >				
					<input  onclick="updatephp(this)" id="upphp" class="buttons" value="Modifier" type="button">			
	
					<input   onclick="ajoutphp(this)" id="ajtphp" class="buttons" value="Ajouter" type="button">			
				
</div>
			</section>
			<section id="secadd" class="add" style="display: none;">
				<h2 class="title">Ajouter une nouvelle ligne</h2>
				<form action="ajouter.php" class="container" method="POST">
					<!-- <select name="selectTable" id="selectTable">
						<option value="vegetables" selected>productions végétales</option>
						<option value="animals">élévages mondiaux</option>
					</select> -->
					<div class="inputs show vgt">
						<input name="culture" id="culture" type="text" placeholder="Culutre" required />
						<input name="superficie"
							id="superficie"
							type="number"
							placeholder="Superficie cultivé"
							required
						/>
						<input name="totalprod"
							id="total"
							type="number"
							placeholder="Production totale"
							required
						/>
						<input id="buttonajouter" type="submit" value="Ajouter"/>

					</div>

</form> 

					
					<form action="ajouter.php" class="container" method="POST">
					<div class="inputs show vgt">
					<input name="espece"  type="text" id="espece" placeholder="Espece" required />
						<input name="number" type="number" id="number" placeholder="Nombre" required />
				
					<input id="buttonajouter2" type="submit" value="Ajouter"/>
</div>
				
</form>
</section> 


<!-------------------------------------------------->


<section id="secdel" class="delete" style ="display: none ; ">
				<h2 class="title">Supprimer un produit</h2>
			 

				<form action="delete.php" class="container" method="POST">
					<!-- <select name="selectTable" id="selectTable">
						<option value="vegetables" selected>productions végétales</option>
						<option value="animals">élévages mondiaux</option>
					</select> -->
					<div class="inputs show vgt">
						<input name="culturedel" id="culture" type="text" placeholder="Culutre" required />
						<!-- <input name="superficiedel"
							id="superficie"
							type="number"
							placeholder="Superficie cultivé"
							required
						/>
						<input name="totalprod"
							id="total"
							type="number"
							placeholder="Production totale"
							required
						/> -->
						<input id="buttondelete" type="submit" value="Delete"/>

					</div>

</form> 

					
					<form action="delete.php" class="container" method="POST">
					<div class="inputs show vgt">
					<input name="especedel"  type="text" id="espece" placeholder="Espece" required />
						<!-- <input name="number" type="number" id="number" placeholder="Nombre" required /> -->
				
					<input id="buttondelete2" type="submit" value="Delete"/>
</div>
				
</form>
</section> 



<!-------------------------------------------------->


<section id="secup" class="update" style="display: none ;">
				<h2 class="title">Modifier un produit</h2>
								<p style=" padding: 1rem ; margin: 10px ; text-align: center ;" > si le produit n'existe pas, il sera ajouté à la table des produits</p>

				<form action="update.php" class="container" method="POST">
					<!-- <select name="selectTable" id="selectTable">
						<option value="vegetables" selected>productions végétales</option>
						<option value="animals">élévages mondiaux</option>
					</select> -->
					<div class="inputs show vgt">
						<input name="cultureup" id="culture" type="text" placeholder="Culutre" required />
						<input name="superficieup"
							id="superficie"
							type="number"
							placeholder="Superficie cultivé"
							required
						/>
						<input name="totalprodup"
							id="total"
							type="number"
							placeholder="Production totale"
							required
						/>
						<input id="buttonup" type="submit" value="Update"/>

					</div>

</form> 

					
					<form action="update.php" class="container" method="POST">
					<div class="inputs show vgt">
					<input name="especeup"  type="text" id="espece" placeholder="Espece" required />
						 <input name="numberup" type="number" id="number" placeholder="Nombre" required /> 
				
					<input id="buttonup2" type="submit" value="Update"/>
</div>
				
</form>
</section> 
    <a href="#">Déconnexion</a>
    </ul>
    </div>
	</body>
	
	<script src="../jquery.js"> </script>



</html>

