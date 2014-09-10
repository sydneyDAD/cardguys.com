<?php
class product{
	var $table = '8x_product';
	var $table_image = '8x_product_image';
	var $key = 'pro_id';
	var $key_image = 'id';
	var $max_width = '200';
	var $module = 'product';
	var $path = 'upload/product/';
	var $pathadm = '../upload/product/';
	var $path_other = 'upload/product_images/';
	var $path_otheradm = '../upload/product_images/';
	function product(){
		$this->db = new database;
	}
	function detail($select='',$id = ''){
		if ($id == '')
		$id = $_GET['id'];
		return $this->db->detail($this->table,$select,$this->key.' = '.intval($id));
	}
	function lists($select='*',$where = '',$ordering = '',$limit='',$other = ''){
		if ($where != ''){
			$where = ' && '.$where;
		}
		$where = 'p.lang = '.$_SESSION['lang'].$where;
		$select = str_replace(',',',p.',$select);
		if ($ordering == ''){
			$ordering = 'p.special DESC';
		}
		if ($other != ''){
			$cha = new channel_pro;
			$cat = new category_pro;
			$select = $select.',cha.cha_id,cha.name as cha_name,cat.cat_id,cat.name as cat_name';
			$other = " LEFT JOIN ".$cha->table." as cha ON cha.cha_id = p.cha_id
					LEFT JOIN ".$cat->table." as cat ON cat.cat_id = p.cat_id";
		}
		$result = $this->db->lists($this->table.' AS p','p.'.$select,$where,$ordering,$limit,$other);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->pro_id = $row[$this->key];
			$list[$i]->cha_name = $row['cha_name'];
			$list[$i]->cat_name = $row['cat_name'];
			$list[$i]->name = $row['name'];
			$list[$i]->ordering = $row['ordering'];
			$list[$i]->alias = $row['alias'];
			$list[$i]->price = price($row['price']);
			$list[$i]->description = $row['description'];
			
			$list[$i]->color = $row['hit'];
			$list[$i]->date_up = $row['date_up'];
			$list[$i]->image = $row['image'];
			$list[$i]->status = $row['status'];
			$list[$i]->special = $row['special'];
            $list[$i]->link_demo = $row['link_demo'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function add(){
			$image ='';
			if ($_FILES['file']['name']){
			$upload = new upload;
			$upload->process($_FILES['file'],$this->pathadm,$this->max_width);
			$image = clear($upload->name);
			}
		    $input = array( 'name' => clear($_POST['name']),
						    'alias' => clear($_POST['alias']),
		 					'cha_id' => intval($_POST['cha']),
		    				'cat_id' => intval($_POST['cat']),
		    				'ordering' => intval($_POST['ordering']),
						    'price' => floatval($_POST['price']),
		    				'description' => clear($_POST['description']),
		    				'link_demo'=>clear($_POST['link_demo']),
		    				'date_up' => date('Y-m-d'),
		    				'special' => intval($_POST['special']),
		    				'status' => intval($_POST['status']),
							'lang' => intval($_SESSION['lang']),	    				
							'image' => $image
    						);
	//		for ($i = 1; $i < 10; $i++)
			$this->db->insert_record($this->table,$input);
			security::redirect($this->module,'list');
	}
	function edit(){
		$image = clear($_POST['image']);
		if ($_FILES['file']['name']){
			if ($_POST['image']){				
				unlink($this->pathadm.$_POST['image']);
				unlink($this->pathadm.'resize/'.$_POST['image']);
			}
			$upload = new upload;
			$upload->process($_FILES['file'],$this->pathadm,$this->max_width);
			$image = clear($upload->name);
		}
        
		    $input = array( 'name' => clear($_POST['name']),
		    				'alias' => clear($_POST['alias']),
		 					'cha_id' => intval($_POST['cha']),
		 					'ordering' => intval($_POST['ordering']),
		    				'cat_id' => intval($_POST['cat']),
						    'price' => floatval($_POST['price']),
		    				'description' => clear($_POST['description']),
		    				'link_demo' => clear($_POST['link_demo']),
		    				'status' => intval($_POST['status']),
							'special' => intval($_POST['special']),		    				
							'image' => $image
    						);
			$this->db->update_record($this->table,$input,$this->key.'='.$_GET['id']);
			security::redirect($this->module,'list');
	}
	function delete($colum = ''){
		if ($colum == ''){
			$colum = $this->key;
		}
			$this->db->delete_record($this->table,$colum,$_POST['cid'],$this->pathadm);
			$this->db->delete_record($this->table_image,$colum,$_POST['cid'],$this->path_otheradm);
			security::redirect($this->module,'list');
	}
	function add_product_image(){
		$upload = new upload;
		for ($i = 1; $i < 11; $i ++){
			if ($_FILES['image_'.$i]['name']){		
				$upload->process($_FILES['image_'.$i],$this->path_otheradm,$this->max_width);
				$input = array	( 	'pro_id' => intval($_GET['id']),
   									'image' => clear($upload->name)
								);
			$this->db->insert_record($this->table_image,$input,$i);
			}
		}
		security::redirect($this->module,'imglist&id='.$_GET['id']);
	}
	function list_product_image (){
		$ordering = 'id DESC';
		$result = $this->db->lists($this->table_image,'',$this->key .'='. intval($_GET['id']),$ordering);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->image_id = $row[$this->key_image];
			$list[$i]->pro_id = $row[$this->key];
			$list[$i]->image = $row['image'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function delete_product_image ($colum = ''){
		$view = 'list';
		if ($colum == ''){
			$colum = $this->key_image;
			$view = 'imglist&id='.$_GET['id'];
		}
		$this->db->delete_record($this->table_image,$colum,$_POST['cid'],$this->path_otheradm);
		security::redirect($this->module,$view);
	}
	function checkstatus($input){
		if ($input == 1){
			return PRODUCT_STATUS1;
		}
		else
			return PRODUCT_STATUS0;
	}
}
?>