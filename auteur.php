<!-- Code by Caroline -->

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crash Blog</title>
</head>

<body>

    <div id="creationAuteur">
      <form method="POST" action="" id="form">
        <p>
          <label for="name">Nom, prénom ou pseudo</label>
          <input type="text" name="name" id="name">
        </p>
        <p>
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
        </p>

        <?php
          include "param.php";

          try {
              $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              // echo "Connected successfully";

                $requete = $conn->prepare(
                      "INSERT INTO Auteur (Nom_Auteur, Mail_Auteur)
                      VALUES  (:name, :email)"
                      );

                $requete->bindParam(':name', $name);
                $requete->bindParam(':email', $email);

                if (isset($_POST["name"]) && ($_POST["name"] <> "")) {
                  if (preg_match('/^[A-Za-zá-œ]+$/', ($_POST["name"]))) {
                    $email = $_POST["email"];
                    $name = $_POST["name"];
                    if ($name){
                      $requete->execute();
                      echo "<em>Insertion réussie.</em>";
                    }
                  }
                  else {
                     echo "<em>Veuillez entrer un nom ou pseudo composé uniquement de lettres.</em>";
                  }
                }
                else {
                  echo "<em>Veuillez entrer un nom.</em>";
                }
              }
          catch(PDOException $e)
              {
                $raison = $e->getMessage();
                if (strstr($raison, '[23000]')) {
                  echo "<em>Entrée déjà existante.</em>";
                }
                else {
                  echo "<em>L'insertion a échoué. </em>";
                }
              }

            unset($_POST["name"]);
            unset($_POST["email"]);
            $conn = null;
          ?>

          <p>
            <input type="submit" value="Ajouter">
          </p>
          </form>

      <div id = "listeAuteurs">
          <p>Liste des auteurs déjà enregistrés:</p>

          <?php

            include "param.php";

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo "Connected successfully";

                    // Remplissage de la table des auteurs :
                    echo '<table id="t_auteur">'."\n";
                    echo '<tr>';
                    echo '<td>Nom/Prénom/Pseudo</td>';
                    echo '<td>Email</td>';
                    echo '</tr>'."\n";
                    foreach($conn->query("SELECT * FROM Auteur") as $row) {
                        echo '<tr>';
                        echo '<td>'.$row["Nom_Auteur"].'</td>';
                        echo '<td>'.$row["Mail_Auteur"].'</td>';
                        echo '</tr>'."\n";
                        }
                    echo '</table>'."\n";
                    // Fin de la table des auteurs
                  }
                catch(PDOException $e)
                    {
                    echo "Connection failed: " . $e->getMessage();
                    die();
                    }

                    $conn=null;

                ?>
      </div>
    </div>

</body>
</html>
