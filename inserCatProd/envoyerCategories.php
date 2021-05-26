<!doctype html>
<html>
 <head>
<meta charset="UTF-8">
 <?php echo '<p>Bonjour le monde</p>'; 
 include('inserCat.php');



			$ligne = 1; // compteur de ligne
			$fic = fopen("categories0.csv", "a+");
			echo '</br>';

		while($tab=fgetcsv($fic,1024,';'))
      {
				$champs = count($tab);//nombre de champ dans la ligne en question
				$ligne ++;  


				    for($i=0;$i>$champs;$i++)
				    	{$tab[$i]=utf8_encode($tab[$i]);
				    		


				    	}

				    	$nomCategory=$tab[0];
				    		echo $nomCategory.'<br>';
							insertCat($nomCategory);
				      
								
							
								



}




				   