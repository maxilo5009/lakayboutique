<!doctype html>
<html>
 <head>
<meta charset="UTF-8">
 <?php echo '<p>Bonjour le monde</p>'; 
 include('function.map.php');



			$ligne = 1; // compteur de ligne
			$fic = fopen("man.csv", "a+");
			echo '</br>';

		while($tab=fgetcsv($fic,1024,';'))
      {
				$champs = count($tab);//nombre de champ dans la ligne en question
				$ligne ++;  


				    for($i=0;$i>$champs;$i++)
				    	{$tab[$i]=utf8_encode($tab[$i]);
				    		


				    	}

				    	$name=$tab[0];
				    	$adress=$tab[1];
				    	$postal=$tab[2];
				    	$city=$tab[3];

				    	$viewMap=loadMap($adress,$postal,$city);
				    	$lon=$viewMap['longitude'];
				    	$lat=$viewMap['latitude'];
				    	
				    	
echo $name.' ;'.$adress.' ; '.$postal.' ; '.$city.'; '.$lon.' '.$lat;
echo '  <a href="map.php?lon='.$lon.'&lat='.$lat.'">plan</a>' ;
echo '<br>';


							
				      
						
							
								



}




				   