<?php
class glossary{
	var $table = '8x_glossary';
	var $key = 'id';
	var $module = 'glossary';
	function glossary(){
		$this->db = new database;
	}
	function detail(){
		return $this->db->detail($this->table,'',$this->key.' = '. intval($_GET['id']));
	}
	function lists($select,$where='',$limit){
		$result = $this->db->lists($this->table,'',$where,$this->key.' DESC',$limit);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->id = $row[$this->key];		
			$list[$i]->content = $row['content'];
			$list[$i]->subject = $row['subject'];			
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function add(){
		    $input = array( 'subject' => clear($_POST['subject']),
    				'content' => clear($_POST['content']),  				
    				);
			$this->db->insert_record($this->table,$input);
            security::redirect($this->module,'list');
	}
    
  
	function edit(){
		    $input = array(                    
                    'content' => clear($_POST['content']),
                    'subject' => clear($_POST['subject'])                    
					);
			$this->db->update_record($this->table,$input,$this->key .' = '.intval($_GET['id']),0);
			security::redirect($this->module,'list');
	}
	function delete(){
			$this->db->delete_record($this->table,$this->key,$_POST['cid']);
			security::redirect($this->module,'list');
	}
}
?>

