<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

var_dump($noms);



for($i=0;$i<sizeof($noms);$i++)
{
  switch ($i)
   {
       case 0:
       echo 'Aramis  -->'.$noms[$i]."<br>";
       break;
       case 1:
       echo 'Athos -->'.$noms[$i]."<br>";
       break;
       case 2:
       echo 'Clatronic -->'.$noms[$i]."<br>";
       break;
       case 3:
       echo 'Camping -->'.$noms[$i]."<br>";
       break;
       case 4:
       echo 'Green -->'.$noms[$i]."<br>";
       break;
   }

}


echo site_url('/utilisateur/toto')."<br>"; //pour pouvoir manipuler site_url (qui se crée dans config/config.php -> $config['base_url'] = 'http://localhost/ci/';  ) ET SURTOUT il faut charger  $this->load->helper('url'); dans le CONTROLLEUR

echo base_url()."<br>";
echo site_url()."<br>";

/* L'EXEMPLE QUI SUIT (en commentaires) CORRESPOND A LA CONNEXION A LA BASE DE DONNEES ET LA REQUETE FAITES DANS exempleControlleur.php
	
<!DOCTYPE html>
	
<html lang="fr">
	
<head>
	
    <meta charset="utf-8">
	
    <title>Liste des produits</title>
	
</head>
	
<body>
	
<h1>Liste des produits</h1>
	
 //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	

	
foreach ($liste_produits as $row) 
	
{
	
    echo"<p>".$row->pro_id."</p>";
	
    echo"<p>".$row->pro_ref."</p>";
	
    echo"<p>".$row->pro_libelle."</p>";
	
     echo"<p>".$row->pro_libelle."</p>";
	
    echo"<p>".$row->pro_description."</p>";        
	
}



*/

?>


</body>
</html>