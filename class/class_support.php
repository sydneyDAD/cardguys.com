<?php
class support{
	var $table = '8x_support';
	var $key = 'sup_id';
	var $module = 'support';
	function support(){
		$this->db = new database;
	}
	function detail(){
		return $this->db->detail($this->table,'',$this->key.' = '.intval($_GET['id']));
	}
	function lists(){
		$result = $this->db->lists($this->table,'','','ordering');
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->sup_id = $row[$this->key];
			$list[$i]->job = $row['job'];
			$list[$i]->ordering = $row['ordering'];
			$list[$i]->yahoo = $row['yahoo'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function add(){
		    $input = array( 'job' => clear($_POST['job']),
		    				'yahoo' => clear($_POST['yahoo']),
		    				'ordering' => intval($_POST['ordering'])
    				);
			$this->db->insert_record($this->table,$input);
			security::redirect($this->module,'list');
	}
	function edit(){
		    $input = array( 'job' => clear($_POST['job']),
		    				'yahoo' => clear($_POST['yahoo']),
		    				'ordering' => intval($_POST['ordering'])
    				);
			$this->db->update_record($this->table,$input,$this->key.'='.intval($_GET['id']));
			security::redirect($this->module,'list');
	}
	function delete(){
			$this->db->delete_record($this->table,$this->key,$_POST['cid']);
			security::redirect($this->module,'list');
	}
}
?>