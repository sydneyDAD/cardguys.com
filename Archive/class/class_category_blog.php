<?php
class category_blog{
	var $table = '8x_blog_category';
	var $key = 'category_id';
	var $module = 'category_blog';
	function category_blog(){
		$this->db = new database;
	}
	function detail(){
		return $this->db->detail($this->table,'',$this->key.' = '. intval($_GET['id']));
	}
	function lists($select='',$where='',$limit=''){
		$result = $this->db->lists($this->table,'',$where,$this->key.' DESC',$limit);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->id = $row[$this->key];		
			$list[$i]->name = $row['name'];						
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function add(){
		    $input = array( 'name' => clear($_POST['name'])
    				 				
    				);
			$this->db->insert_record($this->table,$input);
            security::redirect($this->module,'list');
	}
    
  
	function edit(){
		    $input = array(                    
                    'name' => clear($_POST['name'])
                                   
					);
			$this->db->update_record($this->table,$input,$this->key .' = '.intval($_GET['id']),0);
			security::redirect($this->module,'list');
	}
    
    	function select($cat_id = '',$script = ''){
			$row = $this->lists();
			$temp = '<select name="cat_id" '.$script.'>';
			$temp .= '<option value="0">Select Category blog</option>';
			foreach($row as $row){
				$temp .= '<option value ="'.$row->id.'"';
				if ($row->id == intval($id))
				$temp .= 'selected';
				$temp .= '>'.$row->name.'</option>';
			}
			$temp .= '</select>';
			return $temp;
	}
    
	function delete(){
			$this->db->delete_record($this->table,$this->key,$_POST['cid']);
			security::redirect($this->module,'list');
	}
}
?>
