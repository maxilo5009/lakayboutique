<?php
//$ref.' '.$nom.' '.$description.' '.$img;
 function insertManu($name,$email,$description,$url)
{
  utf8_encode($name);
  utf8_encode($email);
  utf8_encode($description);
  utf8_encode($url);
  

require 'connexionBase.php';

///////Variable//////////////
$virtuemart_manufacturer_id=10; 
$virtuemart_manufacturercategories_id=1;
$mf_name=$name; 
$mf_email=$email; 
$mf_desc=$description; 
$mf_url=$url;
$metadesc='';
$metakey=''; 
$customtitle=''; 

$id=NULL;
$virtuemart_media_id=10;
$ordering=7;
$hits =0 ;
$intnotes =NULL ;
$metarobot = NULL;
$metaauthor =NULL ;
$created_on = '2018-10-03 19:11:04';
$created_by =378 ;
$modified_on = '2018-10-03 19:11:04';
$modified_by =378 ;
$locked_on ='2018-10-03 19:11:04' ;
$locked_by = 0;
$published = 1;
$mf_category_name='';
$mf_category_desc='';
///////////////////////////


 // on écrit la requête sql

		$reponse = $db->query('SELECT MAX(virtuemart_manufacturer_id) AS id FROM na2uf_virtuemart_manufacturers_fr_fr');

		while ($donnees = $reponse->fetch())
		{
		    $ID=$donnees['id'];

		}

		$reponse->closeCursor();

		$reponse = $db->query('SELECT MAX(virtuemart_media_id) AS idMedia FROM na2uf_virtuemart_manufacturer_medias');

		while ($donnees = $reponse->fetch())
		{
		    $idMedia=$donnees['idMedia'];

		}

		$reponse->closeCursor();
		$ID++;
		$idMedia++;
$slug=$name.$ID;
		$slug= strtolower(str_replace(array('ä', 'ê', 'ë', 'ô', 'î', 'ï', 'ô', 'ö', 'û', 'ü', 'ÿ', '€', '#', '+', '*', ' ', "'", '"', '²', '&', 'é', '~', '"', '{', '(', '[', '|', 'è', '`', 'ç', '^', 'à', 'à', ')', '}', '=', '}', '^', '$', '£', '¤', 'ù', '%', '*', 'µ', ',', '?', ';', ':', '/', '!', '§', '>', '<'), '_', $slug));;



		


	    $req = $db->prepare('INSERT INTO na2uf_virtuemart_manufacturers_fr_fr (virtuemart_manufacturer_id, mf_name,mf_email, mf_desc, mf_url, metadesc, metakey, customtitle, slug) 
	    	VALUES(:virtuemart_manufacturer_id, :mf_name, :mf_email,  :mf_desc , :mf_url , :metadesc , :metakey , :customtitle , :slug)');
	    $req->execute(array(
			'virtuemart_manufacturer_id' => $ID,
			'mf_name' => $mf_name,
			'mf_email' => $mf_email,
			'mf_desc'=> $mf_desc,
			'mf_url' => $mf_url,
			'metadesc' => $metadesc,
			'metakey' => $metakey,
			'customtitle' => $customtitle,
			'slug' => $slug
	    ));



		$req = $db->prepare('INSERT INTO na2uf_virtuemart_manufacturer_medias (id, virtuemart_manufacturer_id, virtuemart_media_id, ordering) 
	        VALUES(:id, :virtuemart_manufacturer_id, :virtuemart_media_id, :ordering)');
	    $req->execute(array(
			'id' => $id,
			'virtuemart_manufacturer_id' => $ID,
			'virtuemart_media_id' => $idMedia,
			'ordering'=> $ordering
	    ));


		$req = $db->prepare( 'INSERT INTO na2uf_virtuemart_manufacturers (virtuemart_manufacturer_id, virtuemart_manufacturercategories_id, metarobot, metaauthor, hits, published, created_on, created_by, modified_on, modified_by, locked_on, locked_by) 
	        VALUES( :virtuemart_manufacturer_id, :virtuemart_manufacturercategories_id,  :metarobot, :metaauthor, :hits, :published, :created_on, :created_by, :modified_on, :modified_by, :locked_on, :locked_by)');
	    $req->execute(array(
			'virtuemart_manufacturer_id' => $ID,
			'virtuemart_manufacturercategories_id' => $virtuemart_manufacturercategories_id,
			'metarobot'=> $metarobot,
			'metaauthor' => $metaauthor,
			'hits' => $hits,
			'published'=> $published,
			'created_on' => $created_on,
			'created_by' => $created_by,
			'modified_on'=> $modified_on,
			'modified_by' => $modified_by,
			'locked_on' => $locked_on,
			'locked_by'=> $locked_by
	    ));

	   

		echo "It Work";
		

}


