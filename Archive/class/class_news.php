<?php
class news{
	var $table = '8x_news';
	var $key = 'news_id';
	var $max_width = '200';
	var $module = 'news';
	var $path = 'upload/news/';
	var $pathadm = '../upload/news/';
	function news(){
		$this->db = new database;
	}
	function detail($select='',$id=''){
		if ($id == '')
		$id = intval($_GET['id']);
		return $this->db->detail($this->table,$select,$this->key.' = '.$id);
	}
	function lists($select = '*',$where = '',$ordering = '',$limit='',$other = ''){
		if ($where != ''){
			$where = ' && '.$where;
		}
		$where = 'n.lang = '.$_SESSION['lang'].$where;
		$select = str_replace(',',',n.',$select);
		if ($ordering == ''){
			$ordering = 'n.'.$this->key.' DESC';
		}
		if ($other != ''){
			$cha = new channel_news;
			$cat = new category_news;
			$select = $select.',cha.cha_id,cha.name as cha_name,cat.cat_id,cat.name as cat_name';
			$other = "LEFT JOIN ".$cha->table." as cha ON cha.cha_id = n.cha_id
					LEFT JOIN ".$cat->table." as cat ON cat.cat_id = n.cat_id";
		}
		$result = $this->db->lists($this->table.' AS n','n.'.$select,$where,$ordering,$limit,$other);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->news_id = $row['news_id'];
			$list[$i]->cha_name = $row['cha_name'];
			$list[$i]->cat_name = $row['cat_name'];
			$list[$i]->alias = $row['alias'];
			$list[$i]->name = $row['name'];
			$list[$i]->special = $row['special'];
			$list[$i]->description = $row['description'];
			$list[$i]->detail = $row['detail'];
			$list[$i]->hit = $row['hit'];
			$list[$i]->date_up = date_fomat($row['date_up']);
			$list[$i]->image = $row['image'];
            $list[$i]->ordering = $row['ordering'];
            $list[$i]->cards_list = $row['cards_list'];
            $list[$i]->card_slogan = $row['card_slogan'];
            
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
		    				'lang' => intval($_SESSION['lang']),
		    				'special' => intval($_POST['special']),
		    				'description' => clear($_POST['description']),
		    				'detail' => clear($_POST['detail']),
		    				'date_up' => date('Y-m-d'),
		    				'image' => $image,
                            'cards_list' => implode(',',$_POST['cards']),
                            'ordering' => (int)$ordering,
                            'card_slogan'=>clear($_POST['card_slogan'])
    						);
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
		    				'cat_id' => intval($_POST['cat']),
		    				'special' => intval($_POST['special']),
							'description' => clear($_POST['description']),
							'detail' => clear($_POST['detail']),
							'image' => $image,
                            'cards_list' => @implode(',',$_POST['cards']),
                            'ordering' => (int)$ordering,
                            'card_slogan'=>clear($_POST['card_slogan'])
    						);
			$this->db->update_record($this->table,$input,$this->key.'='.$_GET['id']);
			security::redirect($this->module,'list');
	}
	function delete($colum = ''){
		if ($colum == ''){
			$colum = $this->key;
		}
			$this->db->delete_record($this->table,$colum,$_POST['cid'],$this->pathadm);
			security::redirect($this->module,'list');
	}
	function show_new_news($cha,$cat,$limit){
		return $this->lists('name,news_id,alias,date_up',$this->key.' > '.intval($_GET['id']).' && cha_id ='.intval($cha).' && cat_id ='.intval($cat),'',$limit);
	}
	function show_old_news($cha,$cat,$limit){
		return $this->lists('name,news_id,alias,date_up',$this->key.' < '.intval($_GET['id']).'&& cha_id ='.intval($cha).' && cat_id ='.intval($cat),$this->key .' DESC',$limit);
	}
}
?>