 $req = $db->prepare('INSERT INTO na2uf_virtuemart_manufacturercategories_fr_fr (virtuemart_manufacturercategories_id, mf_category_name, mf_category_desc, slug)
			VALUES( :virtuemart_manufacturercategories_id, :mf_category_name, :mf_category_desc, :slug)');
	    $req->execute(array(
			'virtuemart_manufacturercategories_id' => $virtuemart_manufacturercategories_id,
			'mf_category_name' => $mf_category_name,
			'mf_category_desc'=> $mf_category_desc,
			'slug' => $slug
	    ));


	    $req = $db->prepare( 'INSERT INTO na2uf_virtuemart_manufacturercategories (virtuemart_manufacturercategories_id, published, created_on, created_by, modified_on, modified_by, locked_on, locked_by)
			VALUES(  :virtuemart_manufacturercategories_id, :published, :created_on, :created_by, :modified_on, :modified_by, :locked_on, :locked_by)');
		$req->execute(array(
			'virtuemart_manufacturercategories_id' => $virtuemart_manufacturercategories_id,
			'published' => $published,
			'created_on' => $created_on,
			'created_by' => $created_by,
			'modified_on'=>$modified_on,
			'modified_by'=>$modified_by,
			'locked_on'=>$locked_on,
			'locked_by'=>$locked_by
		 ));