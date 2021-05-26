<?php
//$ref.' '.$nom.' '.$description.' '.$img;
 function insertProd($ref,$name,$prix,$urlimg,$description,$cat,$manufacturer)
{
  utf8_encode($ref);
  utf8_encode($name);
  utf8_encode($prix);
  utf8_encode($urlimg);
  utf8_encode($description);

require 'connexionBase.php';

//donne table
$virtuemart_product_id ='' ;
$virtuemart_vendor_id =1 ;
$product_parent_id =0 ;
$product_sku = $ref;
$product_weight = NULL;
$product_weight_uom = NULL;
$product_length =NULL ;
$product_width =NULL ;
$product_height = NULL;
$product_lwh_uom = NULL;
$product_url = NULL;
$product_in_stock =100 ;
$product_ordered =50 ;
$low_stock_notification = 10;
$product_available_date ='0000-00-00 00:00';
$product_availability = NULL;
$product_special = 0;
$product_sales = 0;
$product_unit = NULL;
$product_packaging = NULL;
$product_params =0 ;
$hits =NULL ;
$intnotes =NULL ;
$metarobot = NULL;
$metaauthor =NULL ;
$layout =NULL ;
$published =1 ;
$created_on = '0000-00-00 00:00:00';
$created_by =378 ;
$modified_on = '0000-00-00 00:00';
$modified_by =378 ;
$locked_on ='0000-00-00 00:00' ;
$locked_by = 0;
$product_s_desc =$description ;
$product_desc = $description;
$product_name = $name ;
$metadesc ='meta' ;
$metakey ='' ;
$product_price = $prix; 
$product_tax_id = -1; 
$product_discount_id = 0; 
$product_currency = 47; 
$virtuemart_media_id =NULL ; 
$virtuemart_vendor_id = 1; 
$file_title = 'titre'; 
$file_mimetype = 'image'; 
$file_type = 'product'; 
$file_url = 'url'; 
$file_is_product_image = 0; 
$file_is_downloadable = 0; 
$file_is_forSale = 0; 
$file_params = NULL; 
$shared = 0; 
$published = 1; 
$virtuemart_vendor_id =1 ;
$file_title = $name;
$file_description =$name ;
$file_meta = 'filemeta';
$file_class = '';
$file_mimetype = 'image/jpeg';
$file_type = '';
$file_url =$urlimg ;
$file_url_thumb ='' ;
$file_is_product_image =0 ;
$file_is_downloadable =0 ;
$file_is_forSale = 0;
$file_params ='' ;
$file_lang ='' ;
$shared =0 ;
$published =1 ;
$created_on = '0000-00-00 00:00' ;
$created_by ='0000-00-00 00:00' ;




 // on écrit la requête sql
    $req = $db->prepare(
    	'INSERT INTO na2uf_virtuemart_products
    	(virtuemart_product_id,
    	 virtuemart_vendor_id,
    	  product_parent_id,
    	   product_sku,
    	   product_weight,
    	    product_weight_uom,
    	     product_length,
    	      product_width, product_height, product_lwh_uom, product_url, product_in_stock, product_ordered, low_stock_notification, product_available_date, product_availability, product_special, product_sales, product_unit, product_packaging, product_params, hits, intnotes, metarobot, metaauthor, layout, published, created_on, created_by, modified_on, modified_by, locked_on, locked_by) 
    	VALUES(:virtuemart_product_id, :virtuemart_vendor_id, :product_parent_id,  :product_sku , :product_weight , :product_weight_uom , :product_length , :product_width , :product_height , :product_lwh_uom , :product_url , :product_in_stock, :product_ordered , :low_stock_notification ,  :product_available_date , :product_availability , :product_special , :product_sales , :product_unit , :product_packaging , :product_params , :hits, :intnotes, :metarobot, :metaauthor, :layout, :published, :created_on, :created_by, :modified_on, :modified_by, :locked_on, :locked_by)');

    $req->execute(array(
'virtuemart_product_id' => $virtuemart_product_id,
'virtuemart_vendor_id' => $virtuemart_vendor_id,
'product_parent_id' => $product_parent_id,
'product_sku'=> $product_sku,
'product_weight' => $product_weight,
'product_weight_uom' => $product_weight_uom,
'product_length' => $product_length,
'product_width' => $product_width,
'product_height' => $product_height,
'product_lwh_uom' => $product_lwh_uom,
'product_url' => $product_url,
'product_in_stock' => $product_in_stock,
'product_ordered' => $product_ordered,
'low_stock_notification' => $low_stock_notification,
'product_available_date' => $product_available_date,
'product_availability' => $product_availability,
'product_special' => $product_special,
'product_sales' => $product_sales,
'product_unit' => $product_unit,
'product_packaging' => $product_packaging,
'product_params' => $product_params,
'hits' => $hits,
'intnotes' => $intnotes,
'metarobot' => $metarobot,
'metaauthor' => $metaauthor,
'layout' => $layout,
'published' => $published,
'created_on' => $created_on,
'created_by' => $created_by,
'modified_on' => $modified_on,
'modified_by' => $modified_by,
'locked_on' => $locked_on,
'locked_by' => $locked_by
    ));

   
    $reponse = $db->query('SELECT MAX(virtuemart_product_id) AS id FROM na2uf_virtuemart_products');

while ($donnees = $reponse->fetch())
{
    $id=$donnees['id'];

}

$reponse->closeCursor();
//bd-joomla.urofc_virtuemart_products
echo $id;
$slug =$product_name.$id;

//traite le nom sans majuscule


$slug= strtolower(str_replace(array('ä', 'ê', 'ë', 'ô', 'î', 'ï', 'ô', 'ö', 'û', 'ü', 'ÿ', '€', '#', '+', '*', ' ', "'", '"', '²', '&', 'é', '~', '"', '{', '(', '[', '|', 'è', '`', 'ç', '^', 'à', 'à', ')', '}', '=', '}', '^', '$', '£', '¤', 'ù', '%', '*', 'µ', ',', '?', ';', ':', '/', '!', '§', '>', '<'), '_', $slug));;

$product_s_desc =utf8_encode($description);
$product_desc =utf8_encode($description) ;
$product_name = $name ;
$metadesc ='meta' ;
$metakey ='' ;

$slug=$slug.$id;
 $virtuemart_category_id=$cat;
 $ordering=1;
//requete insertion 

$req = $db->prepare(
        'INSERT INTO na2uf_virtuemart_products_fr_fr
        (virtuemart_product_id, product_s_desc, product_desc, product_name, metadesc, metakey, slug) 
        VALUES(:virtuemart_product_id, :product_s_desc, :product_desc,  :product_name , :metadesc , :metakey , :slug)');
    $req->execute(array(
'virtuemart_product_id' => $id,
'product_s_desc' => $product_s_desc,
'product_desc' => $product_desc,
'product_name'=> $product_name,
'metadesc' => $metadesc,
'metakey' => $metakey,
'slug' => $slug
    ));

$idt='';
$req = $db->prepare(
        'INSERT INTO na2uf_virtuemart_product_categories
        ( virtuemart_product_id, virtuemart_category_id, ordering) 
        VALUES( :virtuemart_product_id, :virtuemart_category_id,  :ordering)');
    $req->execute(array(
'virtuemart_product_id' => $id,
'virtuemart_category_id' => $virtuemart_category_id,
'ordering'=> $ordering
    ));

    

//jusqu'ici tout vas bien !


    $req = $db->prepare(
       
        'INSERT INTO na2uf_virtuemart_product_prices
        ( 
        virtuemart_product_id,
         product_price, product_tax_id
         ,product_discount_id,product_currency)

        VALUES( :virtuemart_product_id,
         :product_price, 
          :product_tax_id, 
          :product_discount_id, 
          :product_currency)');
    $req->execute(array(
'virtuemart_product_id' => $id,
'product_price' => $product_price,
'product_tax_id'=> $product_tax_id,
'product_discount_id' => $product_discount_id,
'product_currency' => $product_currency
    ));
    $req = $db->prepare( 'INSERT INTO na2uf_virtuemart_medias ( virtuemart_vendor_id, file_title, file_description, file_meta, file_class, file_mimetype, file_type, file_url, file_url_thumb, file_is_product_image, file_is_downloadable, file_is_forSale, file_params, file_lang, shared, published, created_on, created_by, modified_on, modified_by, locked_on, locked_by)
VALUES(  :virtuemart_vendor_id, :file_title, :file_description, :file_meta, :file_class, :file_mimetype, :file_type, :file_url, :file_url_thumb, :file_is_product_image, :file_is_downloadable, :file_is_forSale, :file_params, :file_lang, :shared, :published, :created_on, :created_by, :modified_on, :modified_by, :locked_on, :locked_by)'
);
$req->execute(array(

'virtuemart_vendor_id' => $virtuemart_vendor_id,
'file_title' => $file_title,
'file_description' => $file_description,
'file_meta' => $file_meta,
'file_class' => $file_class,
'file_mimetype' => $file_mimetype,
'file_type' => $file_type,
'file_url' => $urlimg,
'file_url_thumb' => $file_url_thumb,
'file_is_product_image' => $file_is_product_image, 
'file_is_downloadable' => $file_is_downloadable,
'file_is_forSale' => $file_is_forSale,
'file_params' => $file_params,
'file_lang' => $file_lang,
'shared' => $shared,
'published' => $published,
'created_on' => $created_on,
'created_by' => $created_by,
'modified_on' => $modified_on,
'modified_by' => $modified_by,
'locked_on' => $locked_on,
'locked_by' => $locked_by
 ));
$reponse = $db->query('SELECT MAX(virtuemart_media_id) AS idMedia FROM na2uf_virtuemart_medias');

while ($donnees = $reponse->fetch())
{
    $idMedia=$donnees['idMedia'];

}

$reponse->closeCursor();

echo $idMedia;
$req = $db->prepare( '
INSERT INTO na2uf_virtuemart_product_medias ( virtuemart_product_id, virtuemart_media_id, ordering) VALUES ( :virtuemart_product_id, :virtuemart_media_id, :ordering)');
$req->execute(array(

'virtuemart_product_id' => $id,
'virtuemart_media_id' => $idMedia,
'ordering' => $ordering,

 ));
$req = $db->prepare( '
INSERT INTO na2uf_virtuemart_product_manufacturers (id, virtuemart_product_id, virtuemart_manufacturer_id) VALUES (:id, :virtuemart_product_id,:virtuemart_manufacturer_id)');
$req->execute(array(
	'id'=>NULL,
	'virtuemart_product_id'=>$id,
	'virtuemart_manufacturer_id'=>$manufacturer
	));



}

