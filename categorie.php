<!-- Code by Laure -->
<form action="" method="POST">
  <h3>Catégories :</h3>
  <input type="text" id="newCat" name="newCat" placeholder="Nouvelle catégorie">
  <input type='submit'>
<?php

  include "param.php";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $requete = $conn->prepare('INSERT INTO Categorie VALUES (:categorie)');
      $requete->bindParam(':categorie', $cat);

      if (isset($_POST['newCat']) && ($_POST['newCat'] <> "")) {

          if ( preg_match('/^[A-Za-zá-œ]+[A-Za-z0-9á-œ\.\- ]+$/', $_POST['newCat']) ) {
            $cat = $_POST['newCat'];
            $requete-> execute();
            echo '<em>Catégorie créée.</em>';
          }
          else {
            echo '<em>Veuillez utiliser des caractères autorisés.</em>';
          }
        }
        else {
          echo '<em>Veuillez entrer un nom.</em>';
        }
      }
  catch(PDOException $e) {
        $raison = $e->getMessage();
        if (strstr($raison, '[23000]')) {
          echo "<em>Entrée déjà existante.</em>";
        }
        else {
          echo "<em>L'insertion a échoué. </em>";
        }
      }
  unset($_POST['newCat']);
  $conn=null;
?>

<div id="cat">
  <?php

    include "param.php";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        foreach ($conn->query('SELECT * FROM Categorie') as $ligne) {
            print_r('<p>' . $ligne['Nom_Categorie'] . '</p>');
          }
        }
    catch(PDOException $e) {
          $raison = $e->getMessage();
            echo "<em>Echec de connexion à la base de données. </em>";
        }
    $conn=null;
  ?>
</div>
</form>
