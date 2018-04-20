<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crash Blog</title>
  <link rel="stylesheet" media="screen and (max-width: 460px)" href="css/xs.css">
  <link rel="stylesheet" media="screen and (min-width: 461px) and (max-width: 780px)" href="css/small.css">
  <link rel="stylesheet" media="screen and (min-width: 781px) and (max-width: 1200px)" href="css/medium.css">
  <link rel="stylesheet" media="screen and (min-width: 1201px)" href="css/large.css">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/form.css">
  <link href="https://fonts.googleapis.com/css?family=Krona+One|Montserrat|Titillium+Web" rel="stylesheet">
  <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
</head>
<body>

  <header>
    <h1><a href="index.php">Crash Blog</a></h1>
  </header>

  <main>

    <p>Bienvenue sur le blog des Crash Coders. Vous trouverez ici nos articles, publiés au fil de la formation.</p>
    <p>Sentez-vous libres de contribuer !</p>

    <section>

        <div id='creation'>
          <h2>Création&nbsp;:</h2>
          <p><a href="#modale_auteur" id="auteur">Auteur</a></p>
          <p><a href="#modale_categorie" id="categorie">Catégorie</a></p>
          <p><a href="#modale_article" id="article">Article</a></p>
        </div>


        <div class="separateur"></div>

        <div id='consult'>
          <h2>Consultation&nbsp;:</h2>
          <p><a href="#modale_consultation">Articles en ligne</a></p>
        </div>

    </section>

    <div id="modale_auteur">
      <?php include 'auteur.php' ?>
    </div>

    <div id="modale_categorie">
      <?php include 'categorie.php' ?>
    </div>

    <div id="modale_article">
      <?php include 'article.php' ?>
    </div>

    <div id="modale_consultation">
      <?php include 'consultation.php' ?>
    </div>
    <script type="text/javascript" src="js/controle.js"></script>


    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->

  </main>
</body>
</html>
