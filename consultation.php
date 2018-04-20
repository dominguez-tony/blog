<!-- Code by Tony -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="developpement" />
  <title>CrashBlog</title>
</head>

<body>

    <?php

        include "param.php";
        $base = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $reponse = $base->query("SELECT *, DATE_FORMAT(Date_Creation,'%d/%m/%Y %H:%i') as Date  FROM Article"); 


        echo "<table id='t_consult'>";
        echo "<th>"."Titre"."</th>";
        echo "<th>"."Date de création"."</th>";
        echo "<th>"."Image"."</th>";
        echo "<th>"."Auteur"."</th>";
        echo "<th>"."Catégorie"."</th>";

        while ($donnees = $reponse->fetch()) {
            echo "<tr>";
            echo "<td>" . $donnees['Titre'] . "</td>";
            echo "<td>" . $donnees['Date'] . "</td>";
            echo "<td><img src='" . $donnees['URL_image'] . "'></td>";
            echo "<td>" . $donnees['Auteur'] . "</td>";
            echo "<td>" . $donnees['Categorie'] . "</td>";
            echo "</tr>";
            }
            $reponse->closeCursor();
        echo "</table>";

    ?>



</body>
</html>
