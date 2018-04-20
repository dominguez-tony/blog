<!-- Code by Jordan & Gautier -->

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crash Blog</title>
</head>

<body>
  <p>Pour créer votre article c'est ici !</p>
  <p>N'oubliez pas de créer votre <a href="#modale_categorie">Catégorie</a> et votre <a href="#modale_auteur">Auteur</a> !</p>

  <form method="post">
    <p>Titre de l'article : <input type="text" name="titre" size="50"></p>

    <p>Catégories : <select size="1" class="categorie" name="cate">
      <!-- premier champ vide pour forcer à choisir dans la liste -->
      <option></option>
      <?php

        include "param.php";

        try {
            $connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $reponse = $connexion->query('SELECT * FROM Categorie');
            while ($ligne = $reponse->fetch()) {
              echo "<option>", $ligne['Nom_Categorie'], "</option>";
            }
          }
        catch(PDOException $e){
          echo 'Echec: ' .$e->getMessage();
          }
        $connexion=null;
      ?>
    </select>
  </p>
  
  <p class="clique1">Vous n'avez pas encore créé votre catégorie ? <a href="#modale_categorie"> <i>Cliquez ici</i> ! </a></p>

  <p>Auteurs <select size="1" class="auteur" name="auteur">
    <!-- premier champ vide pour forcer à choisir dans la liste -->
    <option></option>
    <?php
    try {
          $connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
          $reponse = $connexion->query('SELECT * FROM Auteur');

          while ($ligne = $reponse->fetch()) {
            echo "<option>", $ligne['Nom_Auteur'], "</option>";
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
      $connexion=null;
    ?>
    </select>
  </p>

  <p class="clique1">Vous n'êtes pas encore renseigné comme auteur ? <a href="#modale_auteur"> <i>Cliquez ici</i> ! </a></p>

  <p>Image : <input class="clique2" size="50" type="text" placeholder="Ex: http://www..."></p>

    <textarea name="article" placeholder="Votre Article..."></textarea>

<?php
try {
      $connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

        $requete = $connexion->prepare("INSERT INTO Article(Titre, URL_image, Auteur, Categorie, Contenu) VALUES (:titre, :image, :auteur, :cat, :contenu)");

        $requete->bindParam(':titre', $titre);
        $requete->bindParam(':cat', $cat);
        $requete->bindParam(':auteur', $auteur);
        $requete->bindParam(':image', $image);
        $requete->bindParam(':contenu', $contenu);

        if ( isset($_POST["titre"]) && ($_POST["titre"] <> "") && isset($_POST["article"]) && ($_POST["article"] <> "") ) {
          $titre = $_POST['titre'];
          if (isset($_POST['cate'])) {
            $cat = $_POST['cate'];
          }
          else {
            $cat = "";
          }
          if (isset($_POST['auteur'])) {
            $auteur = $_POST['auteur'];
          }
          else {
            $auteur = "";
          }
          if (isset($_POST['image'])) {
            $image = $_POST['image'];
          }
          else {
            $image = "";
          }
          $contenu = $_POST['article'];

          $requete->execute();
          echo "<em>Insertion réussie.</em>";
        }
        else {
          echo "<em>Veuillez renseigner le titre et le contenu de l'article.</em>";
        }

      unset($_POST['titre']);
      unset($_POST['cate']);
      unset($_POST['auteur']);
      unset($_POST['image']);
      unset($_POST['article']);
      foreach ($_POST as $value) {
        echo $value;
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

    $connexion=null;
  ?>

  <input type="submit">
  </form>

</body>
</html>
