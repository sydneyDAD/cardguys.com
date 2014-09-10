<?php

class cards_issuer{
	var $table = '8x_cards_issure';
	var $key = 'tbl_id';
    var $module = 'cards';
   	var $path = 'upload/product/';
	var $pathadm = '../upload/product/';
	var $path_other = 'upload/product_images/';
	var $path_otheradm = '../upload/product_images/';
   	var $max_width = '200';
	function cards_issuer(){
		$this->db = new database;
	}
	function detail($select='',$id=''){
		if($id=='')
		$id = intval($_GET['id']);
		return $this->db->detail($this->table,$select,$this->key.' = '.$id);
	}
    function detail2($select='',$id=''){
		if($id=='')
		$id = intval($_GET['issuer']);
		return $this->db->detail($this->table,$select,$this->key.' = '.$id);
	}
	function add(){

            $image ='';
			if ($_FILES['file1']['name']){
			$upload1 = new upload;
			$upload1->process($_FILES['file1'],$this->pathadm,$this->max_width);
			$image = clear($upload1->name);
			}

			$result=$this->db->query("SELECT tbl_id,alias FROM 8x_cards_bank WHERE tbl_id='".(int)$_POST['assign_bank']."' LIMIT 1 ");
			$rowdata=$this->db->fetch_assoc($result);

			if(isset($rowdata['tbl_id']) && $rowdata['tbl_id']){
		    $alias=(isset($rowdata['alias']))?$rowdata['alias']:"";
		    $input = array( 
							'tbl_id'=>$rowdata['tbl_id'],
							'name' => clear($_POST['name']),
		      				'alias' => clear($alias),
                            //'url' => clear($_POST['url']),
                            'destination' => clear($_POST['destination']),
						    'ordering' => intval($_POST['ordering']),
                            'status' => intval($_POST['status']),
                            'image' => $image
    					);
			$this->db->insert_record($this->table,$input);
			}
			security::redirect($this->module,'list_issuers');
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
    		
    		$result=$this->db->query("SELECT tbl_id,alias FROM 8x_cards_bank WHERE tbl_id='".(int)$_POST['assign_bank']."' LIMIT 1 ");
			$rowdata=$this->db->fetch_assoc($result);			
    		
            //var_dump($image); exit;
		    if(isset($rowdata['tbl_id']) && $rowdata['tbl_id']){
		    $alias=(isset($rowdata['alias']))?$rowdata['alias']:"";
		    $input = array( 
							'tbl_id'=>$rowdata['tbl_id'],
							'name' => clear($_POST['name']),
		      				'alias' => clear($alias),
                            //'url' => clear($_POST['url']),
                            'destination' => clear($_POST['destination']),
						    'ordering' => intval($_POST['ordering']),
                            'status' => intval($_POST['status']),
                            'image' => $image
    					);
			$this->db->update_record($this->table,$input,$this->key.'='.intval($_GET['id']));
			}
			security::redirect($this->module,'list_issuers');
	}
    function delete($colum = ''){
		if ($colum == ''){
			$colum = $this->key;
		}
			$this->db->delete_record($this->table,$colum,$_POST['cid'],$this->pathadm);
			$this->db->delete_record($this->table_image,$colum,$_POST['cid'],$this->path_otheradm);
			security::redirect($this->module,'list_issuers');
	}

	function lists($where='',$limit='100'){

		//$result = $this->db->lists($this->table,'*',$where,'',$limit);
            
                $this->db->select($table,$select,$where,$ordering,$limit,$other);
                $thequery=mysql_query($this->db->select($this->table,$select,$where,$ordering,$limit,$other));

                if(mysql_error() && (isset($this) && get_class($this)==__CLASS__)){
                            $this->mysql_error=mysql_error();
                }
		$i =0;
	 while ($row = mysql_fetch_assoc($thequery)) {
			$list[$i]->tbl_id = $row['tbl_id'];
			$list[$i]->name = $row['name'];
			$list[$i]->ordering = $row['ordering'];
			$list[$i]->alias = $row['alias'];
            $list[$i]->image = $row['image'];
            $list[$i]->url = $row['url'];
            $list[$i]->destination = $row['destination'];
            $list[$i]->status = $row['status'];
            $list[$i]->special = $row['special'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;
	}



}
?>