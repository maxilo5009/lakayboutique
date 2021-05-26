  <!doctype html>
<html>
 <head>
<meta charset="UTF-8">
  <title>Test PHP</title>
 </head>
 <body>
<?php
  require_once('manufacturerInsert.php');
			$ligne = 1; // compteur de ligne
			$fic = fopen("manufacturer.csv", "a+");
			echo '</br>';

		while($tab=fgetcsv($fic,1024,';'))
      {
				$champs = count($tab);//nombre de champ dans la ligne en question
				$ligne ++;  

//$name,$email,$description,$url,$key_word
				    for($i=0;$i>$champs;$i++)
				    	{$tab[$i]=utf8_encode($tab[$i]);}
				      
								$name=$tab[0];
								$email=$tab[1];
								$description=$tab[2];
								$url=$tab[3];
								

insertManu($name,$email,$description,$url);
echo'ok';


}
?>