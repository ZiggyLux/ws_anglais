<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang = "fr-FR">
<?php /*
<!----------------------------------------------------------------------------->
<!-- Application......... Anglais                                            -->
<!-- Version............. 1.0                                                -->
<!-- Plateforme.......... Portabilité                                        -->
<!--                      HTML 5.0, PHP 5, MySQL, Javascript                 -->
<!-- Source.............. index.php                                          -->
<!-- Dernière MAJ........                                                    -->
<!-- Auteur..............                                                    -->
<!-- Remarque............ HTML 5.0                                           -->
<!-- Brève description... Gestion des vocables en anglais - navigation       -->
<!-- Emplacement......... \anglais                                           -->
<!----------------------------------------------------------------------------->
*/ 
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta name="Author" content="Marc Cesarini">
	<meta name="keywords" content="anglais,vocable">
	<link href="styles.css" rel="stylesheet" type="text/css">
	<script language="javascript" type="text/javascript" src="scripts.js"></script>
	<title>Vocables anglais</title>
	<!-- Pour le choix des couleurs, possibilité d'utiliser
	http://www.aharrisbooks.net/haio/book_2/chap_1/webSafe.html
	ou http://colorschemedesigner.com
	//-->
    <style type = "text/css">
	  body {
		background-color: black;
	  }
      p {
        border: 2px black solid;
		font-family: "Arial";
      }
	  .voc {
		background-color: #336633;
		color: yellow;
		font-size: xx-large;
		text-align: center;
	  }
	  .pho {
		background-color: black;
		color: #FF0000;
		font-family: "Lucida";
		font-size: xx-large;
		text-align: center;
	  }
	  .typ {
		background-color: black;
		color: yellow;
		font-size: medium;
		text-align: center;
	  }
	  .def {
		background-color: #006666;
		color: cyan;
		font-size: medium;
	  }
	  .tra {
		background-color: #333333;
		color: #99CC99;
		font-size: small;
	  }
	  .dev {
		background-color: grey;
		font-size: small;
	  }
    </style>
</head>
<body>
<script language="javascript" type="text/javascript">
<!--
//-->
</script>
<?php
	require 'vendor/autoload.php';

	use App\SQLiteConnection;

	/* Connexion à la base de données */
	$con = new SQLiteConnection();
	$pdo = $con->connect();
	if ($pdo = null)
		echo 'Whoops, could not connect to the SQLite database!';

	$tickets = $con->litTickets();
	$tirage = array_rand($tickets, 1);
	$identifiant = $tickets[$tirage];
	$vocable = $con->litVocable($identifiant);
?>
<p class="voc"><?php print $vocable[0]["vocable"]; ?>
<p class="pho"><?php print $vocable[0]["phono"]; ?>
<p class="typ"><?php print $vocable[0]["type"]; ?>
<p class="def"><?php print $vocable[0]["définition"]; ?>
<p class="tra"><?php print $vocable[0]["traduction"]; ?>
<p class="dev"><?PHP print "Tirage = {$tirage}, clé = " . $vocable[0]["identifiant"]; ?>
</body>
</html>
