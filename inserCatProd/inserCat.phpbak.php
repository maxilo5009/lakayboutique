<?php

 function insertCat($category_name){
//variable pour table _virtuemart_categories
require 'connexionBase.php';
		$virtuemart_category_id = NULL;
 		 $virtuemart_vendor_id = '1';
    	$category_template = NULL;
    	 $category_layout = NULL;
    	$category_product_layout = NULL;
    	  $products_per_row ='';
    	 $limit_list_step =NULL;
    	  $limit_list_initial =NULL;
    	$hits ='0'; 
    	$cat_params='';
    	  $metarobot ='';
    	$metaauthor ='';
    	  $ordering =0;
    	 $shared =0;
    	  $published =1;
    	  $created_on ='0000-00-00 00:00:00.000000';
    	 $created_by =0;
    	$modified_on ='0000-00-00 00:00:00.000000';
    	$modified_by =0;
    	  $locked_on ='0000-00-00 00:00:00.000000';
    	$locked_by =0;
    	//virtuemart_categories_fr_fr
    	
    	    
    	  $category_description   ='description';
    	  $metadesc   ='metadonnée';
    	   $metakey   ='metaword';
    	    $customtitle   ='titre custom';
    	  
    	     //_virtuamart_category_media
    	     
    	       $ordering='';
    	       $numMedia=1;
//_virtuemart_category_categories
    	      $category_parent_id=0;
 	 $category_child_id=0;
 	  $ordering=0;

//requete n°1 table vituemart_categories data null
	$req = $db->prepare(
	    	'INSERT INTO na2uf_virtuemart_categories
	    	(virtuemart_category_id,
	    	 virtuemart_vendor_id,
	    	  category_template, 
	    	  category_layout, 
	    	  category_product_layout,
	    	   products_per_row,
	    	    limit_list_step,
	    	     limit_list_initial,
	    	      hits, 
	    	      cat_params,
	    	       metarobot,
	    	        metaauthor,
	    	         ordering,
	    	          shared,
	    	           published,
	    	            created_on,
	    	             created_by,
	    	              modified_on,
	    	               modified_by,
	    	                locked_on,
	    	                 locked_by) 

	    	VALUES (
	    	:$virtuemart_category_id
	   		 :$virtuemart_vendor_id,
	    	:$category_template,
	    	:$category_layout,
	    	:$category_product_layout,
	    	:$products_per_row,
	    	:$limit_list_step,
	    	:$limit_list_initial,
	    	:$hits,
	    	:$cat_params,
	    	:$metarobot,
	    	:$metaauthor,
	    	:$ordering,
	    	:$shared,
	    	:$published,
	    	:$created_on,
	    	:$created_by,
	    	:$modified_on,
	    	:$modified_by,
	    	:$locked_on,
	    	:$locked_by)');


	    	 $req->execute(array(

		    	'virtuemart_category_id'  =>$virtuemart_category_id ,
		    	 'virtuemart_vendor_id'  =>$virtuemart_vendor_id ,
		    	 ' category_template'  =>$category_template ,
		    	 ' category_layout'  => $category_layout ,
		    	  'category_product_layout'  =>$category_product_layout ,
		    	  'products_per_row'  =>$products_per_row ,
		    	  'limit_list_step'  =>$limit_list_step ,
		    	  'limit_list_initial'  =>$limit_list_initial ,
		    	  'hits'   =>$hits ,
		    	  'cat_params'  =>$cat_params ,
		    	  ' metarobot'  =>$metarobot ,
		    	  ' metaauthor'  =>$metaauthor ,
		    	  ' ordering'  =>$ordering ,
		    	  ' shared'  => $shared ,
		    	  ' published'  => $published ,
		    	  ' created_on'  =>$created_on ,
		    	  ' created_by'  =>$created_by ,
		    	  ' modified_on'  =>$modified_on ,
		    	  ' modified_by'  =>$modified_by ,
		    	  ' locked_on'  => $locked_on ,
		    	  'locked_by'  =>$locked_by

	    ));


/*
	    	 //recuperation id category pour les autres requete
 	
 	
 	$reponse = $db->query('SELECT MAX(virtuemart_category_id) AS id FROM na2uf_virtuemart_categories');

while ($donnees = $reponse->fetch())
{
    $id=$donnees['id'];

}

$reponse->closeCursor();



     //creation du slug 
      

    $slug =$category_name.$id;
    //enlece tous caractere speciaux
    $slug= strtolower(str_replace(array('ä', 'ê', 'ë', 'ô', 'î', 'ï', 'ô', 'ö', 'û', 'ü', 'ÿ', '€', '#', '+', '*', ' ', "'", '"', '²', '&', 'é', '~', '"', '{', '(', '[', '|', 'è', '`', 'ç', '^', 'à', 'à', ')', '}', '=', '}', '^', '$', '£', '¤', 'ù', '%', '*', 'µ', ',', '?', ';', ':', '/', '!', '§', '>', '<'), '_', $slug));;
 
 //requete n°2 table vituemart_categories data null _virtuemart_categories_fr_fr avec datas personnalisées name etc ....
 

 $req = $db->prepare(
'INSERT INTO na2uf_virtuemart_categories_fr_fr (virtuemart_category_id, category_name, category_description, metadesc, metakey, customtitle, slug) VALUES (:$virtuemart_category_id, :$category_name, :$category_description, :$metadesc, :$metakey, :$customtitle, :$slug)');

 $req->execute(array(
 	'virtuemart_category_id'  =>  $id ,
 	'category_name'  => $category_name ,
 	'category_description' => $category_description ,
 	 'metadesc'  => $metadesc ,
 	 'metakey' => $metakey ,
 	  'customtitle' => $customtitle ,
 	   'slug'   => $slug

 	   ));

 //requete n°3 pour affichage dans background obligatoire virtuemart_category_categories category_child_id =$id

$req = $db->prepare('
INSERT INTO na2uf_virtuemart_category_categories (id, category_parent_id, category_child_id, ordering) VALUES (:$id,:category_parent_id,:category_child_id,:ordering)');
$req->execute(array(
 	'id'  =>  $id,
 	'category_parent_id' => $category_parent_id ,
 	'category_child_id' => $id ,
 	 'ordering'  => $ordering 
 	

 	   ));
  


 	  //requete n°4 pour l'image non obligatoire
 	  
$req = $db->prepare('
	INSERT INTO na2uf_virtuemart_category_medias (id, virtuemart_category_id, virtuemart_media_id, ordering) VALUES (:id, :virtuemart_category_id, :virtuemart_media_id, :ordering)');
 	$req->execute(array(
 	'id'  =>  $id,
 	'virtuemart_category_id' => $id ,
 	'virtuemart_media_id' => $numMedia ,
 	 'ordering'  => $ordering
 	

 	   ));
 	   */

echo 'insertion réussi <br>';

 	 }
 	?>


 	
 	






    
