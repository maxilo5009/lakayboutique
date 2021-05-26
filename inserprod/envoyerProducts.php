<!doctype html>
<html>
 <head>
<meta charset="UTF-8">
  <title>Test PHP</title>
 </head>
 <body>
 <?php echo '<p>Bonjour le monde</p>'; 
 include('fonctionInsert.php');
            
//variables a changer fournisseur et categories du produits
            $manufacturer=1;
 			$cat=3;
			

			$ligne = 1; // compteur de ligne
			$fic = fopen("csv/fruitsv1.csv", "a+");
			echo '</br>';

		while($tab=fgetcsv($fic,1024,';'))
      {
				$champs = count($tab);//nombre de champ dans la ligne en question
				$ligne ++;  


				    for($i=0;$i>$champs;$i++)
				    	{$tab[$i]=utf8_encode($tab[$i]);}
				      
								$ref=$tab[0];
								$nom=$tab[1];
								$prix=$tab[2];
								$description=$tab[3];
								$img=$tab[4];


//$img='/fruits/.$img;';

insertProd($ref,$nom,$prix,$img,$description,$cat,$manufacturer);

echo $ref.' '.$nom.' '.$description.' '.$img;





				   }