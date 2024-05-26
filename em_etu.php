<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}
$con = mysqli_connect("localhost", "root", "", "esto");
if (!$con) {
    echo "Vous n'êtes pas connecté à la base de données";
}

//on récupère le id dans le lien
$id = $_GET['id'];
//requête pour afficher les infos d'un Matériel
$req = mysqli_query($con, "SELECT * FROM materiel WHERE id = $id");
$row1 = mysqli_fetch_assoc($req);
if (isset($_POST['button'])) {

    $cni = $_POST['cni'];
    $quantite = $_POST['quantite'];

    // Vérifier si l'étudiant existe
    $etudiantQuery = "SELECT * FROM etudiant WHERE cni = '$cni'";
    $etudiantResult = mysqli_query($con, $etudiantQuery);

    if (mysqli_num_rows($etudiantResult) > 0) {
        $rowEtudiant = mysqli_fetch_assoc($etudiantResult);

        // Insérer la demande dans la table "demande"
        $dateDemande = date('Y-m-d');
        $dateEmprunt = date('Y-m-d H:i:s');
        $query = "INSERT INTO demande (nom_user, cni_user, qauntit, nom_materiel, marque_materiel, date_demande, emprunter, date_emprunt, sup)
                  VALUES ('".$rowEtudiant['nom_etudiant']."', '$cni', $quantite, '" . $row1['nom_materiel'] . "', '" . $row1['marque'] . "', '$dateDemande', TRUE, '$dateEmprunt', TRUE)";

        if (mysqli_query($con, $query)) {
            // Mettre à jour la quantité dans la table "materiel"
            $newQuantite = $row1['quantite'] - $quantite;
            $newQuantiteE = $row1['quantite_e'] + $quantite;
            $updateQuery = "UPDATE materiel SET quantite = $newQuantite, quantite_e = $newQuantiteE WHERE id = $id";
            mysqli_query($con, $updateQuery);

            header("location: admin.php");
        } else {
            echo "Erreur lors de l'ajout de la demande : " . mysqli_error($con);
        }
    } else {
        echo "L'étudiant avec le CNI  $cni n'existe pas.";
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
  <div>
    <form action="deconnexion.php">
      <button class="logout-button">
        <table class="table-responsive">Deconnexion</table>
      </button>
    </form>
  </div>
<div class='col-lg-12'>
    <h3 id="logoright">Emprunter le Matériel : <?= $row1['nom_materiel'] ?> </h3>
    <fieldset>
        <form action="" method="post">
            <input type="hidden" name="id_materiel" value="<?= $id ?>">
            <table class="login_table">
                <tr>
                    <td>Nom de matériel :</td>
                    <td><input disabled value="<?= $row1['nom_materiel'] ?>" type="text" name="nom_materiel" readonly></td>
                </tr>
                <tr>
                    <td>CNI :</td>
                    <td><input type="text" name="cni" required></td>
                </tr>
                <tr>
                    <td>Quantité :</td>
                    <td><input value= 1 type="number" name="quantite" min=1 max="<?= $row1['quantite'] ?>" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Emprunter le matériel" name="button"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></br></br></br></td>
                </tr>
            </table>
        </form>
    </fieldset>
</div>
</body>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<div class='col-lg-12'>
<footer class='footer'>
  <?php include('composant/footer.php'); ?>
</footer>
</div>

