<?php
session_start();
if (isset($_SESSION['admin'])){

include("modele/esto.php");


if(!empty($_POST['nom']) AND !empty($_POST['departement']) AND !empty($_POST['cni'])){


  $Enseignant=new Enseignant();
  
    try
    {
        if(1)
        {
            $Enseignant->add_ensg($_POST['nom'],$_POST['departement'],$_POST['cni']);
            header("Location :prof2.php");
        }



    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
    

}



?>


<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css" />
  <link rel="shortcut icon" href="" />
  <link rel="stylesheet" href="CSS/theme.css" />
  <link rel="stylesheet" href="CSS/esto.css" />
  <title>ESTO</title>
</head>

<body>



  <div class="jumbotron">
    <div class="col-lg-8">
      <a href="http://esto.ump.ma/"><span class="ESTO-logo">ESTO UMP<span class="dot"></span></span></a>
    </div>
    <div class="col-lg-4">
      <div id="logoright">Gestion des Matériels</div>
    </div>
  </div>
  <div class="col-lg-6">
    <ul class="nav nav-pills">

        <li><a href="etudiant2.php">Étudiant</a></li>
        <li><a href="prof2.php">Enseignant</a></li>
        <li><a href="admin.php">Matériels</a></li>
        <li><a href="demande.php">Demande</a></li>
        <li><a href="suiver.php">Emprunts</a></li>

    </ul>
  </div>
  <fieldset>
  <form action="add_ensg.php" method="post">
		<table class="login_table">
        
        <td></td></br>

        <div class="col-lg-6">
        <td><h3 id="logoright" >Ajouter un Enseignant</h3></td>
        </div>
        <tr>
		<td>Nom et prénom</td>
		<td><input type="text" name="nom" id="nom" placeholder="Nom et prénom" required></td>
		</tr>
		<tr>
		<td>CNI</td>
		<td><input type="text" name="cni" id="cni"  placeholder="Carte nationale d'identité" required></td>
		</tr>
<tr>
    <td>Département</td>
                  <td>
                    <select name="departement" >
                      <option value="Génie Informatique" >Génie Informatique</option>
                    <option value="Génie Appliqué">Génie Appliqué</option>
            </select>
        </td>
        </tr>
		</tr>

		
	
		<td></td>
		<td><input name="button" type="submit" value="Ajouter un Enseignant"/>
		</tr>
    <td></td>
</br>
</br>
		</table>
	</form>
  </fieldset>
  <div class="col-lg-12">
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
    <footer class="footer">
      <?php include('composant/footer.php');
      
       ?>
    </footer>
  </div>
  
  <?php
}
else{
  header('location:index.php');
}