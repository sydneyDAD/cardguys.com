<?php

class cards_int{
	var $table = '8x_cards_int';
	var $key = 'tbl_id';
    var $module = 'cards';
   	var $path = 'upload/product/';
	var $pathadm = '../upload/product/';
	var $path_other = 'upload/product_images/';
	var $path_otheradm = '../upload/product_images/';
   	var $max_width = '200';
	function cards_int(){
		$this->db = new database;
	}
	function detail($select='',$id=''){
		if($id=='')
		$id = intval($_GET['id']);
		return $this->db->detail($this->table,$select,$this->key.' = '.$id);
	}
	function add(){
	   
            $image ='';
			if ($_FILES['file']['name']){
			$upload1 = new upload;
			$upload1->process($_FILES['file1'],$this->pathadm,$this->max_width);
			$image = clear($upload1->name);
			}
            $my_top=(isset($_POST['top_name']))?$this->add_top_name($_POST['top_name']):"";
            $topname=(isset($my_top['names']))?$my_top['names']:$my_top;
            $toplist=(isset($my_top['ids']))?$my_top['ids']:"";
		    $input = array( 'name' => clear($_POST['name']),
		      				'alias' => clear($_POST['alias']),
		      				'head_name' => clear($_POST['head_name']),
		      				'top_list' => $toplist,
                            'top_type_name' => $topname,
                            'icon_on'=>intval($_POST['iconchk']),
							'header_text' => clear($_POST['header_text']),
                            'footer_text' => clear($_POST['footer_text']),
                            
						    'ordering' => intval($_POST['ordering']),
                            'status' => intval($_POST['status']),
                            'cards_list' => implode(',',$_POST['cards']),
                            'sapxep' => implode(',',$_POST['sapxep']),
                            'title' => clear($_POST['title']),
                            'keyword' => clear($_POST['keyword']),
                            'destination' => clear($_POST['destination']),
                            'destination' => clear($_POST['assign_banner']),
                            'banner' => intval($_POST['banner']),
                            'featured' => intval($_POST['featured']),
                            'image' => $image,
                            'card_slogan'=>clear($_POST['card_slogan'])
    					);
			$this->db->insert_record($this->table,$input);
			security::redirect($this->module,'list_ints');
	}
	function edit(){
    	   	$image = clear($_POST['image']);
    		if ($_FILES['file1']['name']){
                if ($_POST['image']){
    				unlink($this->pathadm.$_POST['image']);
    				unlink($this->pathadm.'resize/'.$_POST['image']);
    			}

    			$upload1 = new upload;
    			$upload1->process($_FILES['file1'],$this->pathadm,$this->max_width);
    			$image = clear($upload1->name);
    		}
            //var_dump($image); exit;
            $my_top=(isset($_POST['top_name']))?$this->add_top_name($_POST['top_name']):"";
            $topname=(isset($my_top['names']))?$my_top['names']:$my_top;
            $toplist=(isset($my_top['ids']))?$my_top['ids']:"";
		    $input = array( 'name' => clear($_POST['name']),
		      				'alias' => clear($_POST['alias']),
		      				'head_name' => clear($_POST['head_name']),
		      				'top_list' => $toplist,
                            'top_type_name' => $topname,
                            'icon_on'=>intval($_POST['iconchk']),
							'header_text' => clear($_POST['header_text']),
                            'footer_text' => clear($_POST['footer_text']),
                            
						    'ordering' => intval($_POST['ordering']),
                            'status' => intval($_POST['status']),
                            'cards_list' => implode(',',$_POST['cards']),
                            'sapxep' => implode(',',$_POST['sapxep']),
                            'title' => clear($_POST['title']),
                            'keyword' => clear($_POST['keyword']),
                            'destination' => clear($_POST['destination']),
                            'destination' => clear($_POST['assign_banner']),
                            'banner' => intval($_POST['banner']),
                            'featured' => intval($_POST['featured']),
                            'image' => $image,
                            'card_slogan'=>clear($_POST['card_slogan'])
    					);
			$this->db->update_record($this->table,$input,$this->key.'='.intval($_GET['id']));
			security::redirect($this->module,'list_ints');
	}
	function add_top_name($thelist=""){
		$filllist=array();
		if(is_array($thelist)){
		foreach($thelist as $kk=>$vv){
			//clear();
			$filllist['names'].=($filllist['names'])?"@||@|@".clear($vv):clear($vv);
			$filllist['ids'].=($filllist['ids'])?",$kk":$kk;
		}}return $filllist;
		
	}
    function delete($colum = ''){
		if ($colum == ''){
			$colum = $this->key;
		}
			$this->db->delete_record($this->table,$colum,$_POST['cid'],$this->pathadm);
			$this->db->delete_record($this->table_image,$colum,$_POST['cid'],$this->path_otheradm);
			security::redirect($this->module,'list_ints');
	}

	//function lists($where=''){
	function lists($where='',$limit='',$order=''){
	
		$result = $this->db->lists($this->table,'*',$where,$order);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->tbl_id = $row['tbl_id'];
			$list[$i]->name = $row['name'];
			$list[$i]->head_name = $row['head_name'];
			$list[$i]->icon_on = $row['icon_on'];
			$list[$i]->header_text = $row['header_text'];
			$list[$i]->footer_text = $row['footer_text'];
			$list[$i]->cards_list = $row['cards_list'];
			$list[$i]->ordering = $row['ordering'];
			$list[$i]->alias = $row['alias'];
            $list[$i]->sapxep = $row['sapxep'];
            $list[$i]->image = $row['image'];
            $list[$i]->status = $row['status'];
            $list[$i]->special = $row['special'];
            $list[$i]->banner = $row['banner'];
            $list[$i]->title = $row['title'];
            $list[$i]->keyword = $row['keyword'];
            $list[$i]->destination = $row['destination'];
            $list[$i]->assign_banner = $row['assign_banner'];
            $list[$i]->featured = $row['featured'];
            $list[$i]->card_slogan = $row['card_slogan'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	


}
?>