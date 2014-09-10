<?php
class block{
	var $table = '8x_block';
	var $key = 'block_id';
	var $module = 'block';
	function block(){
		$this->db = new database;
	}
	function detail (){
		return $this->db->detail($this->table,'',$this->key.' = '.intval($_GET['id']));
	}
	function lists($where = ''){
		if ($where != ''){
			$where = ' && '.$where;
		}
		$where = 'lang = '.$_SESSION['lang'].$where;
		$result = $this->db->lists($this->table,'',$where,'position,ordering');
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->block_id = $row[$this->key];
			$list[$i]->name = $row['name'];
			$list[$i]->position = $row['position'];
			$list[$i]->limit_item = $row['limit_item'];
			$list[$i]->type = $row['type'];
			$list[$i]->id = $row['id'];
			$list[$i]->ordering = $row['ordering'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;
	}
	function add(){
		    $input = array('name' => clear($_POST['name']),
		    			'type' => clear($_POST['type']),
		    			'limit_item' => intval($_POST['limit_item']),
		    			'position' => clear($_POST['position']),
		    			'ordering' => intval($_POST['ordering']),
		    			'lang' => intval($_SESSION['lang']),
		    			'id' => intval($_POST['id'])
    					);
			$this->db->insert_record($this->table,$input);
			security::redirect($this->module,'list');
	}
	function edit(){
		    $input = array( 
						'name' => clear($_POST['name']),
		    			'type' => clear($_POST['type']),
		    			'position' => clear($_POST['position']),
		    			'limit_item' => intval($_POST['limit_item']),
		    			'ordering' => intval($_POST['ordering']),
		    			'id' => intval($_POST['id'])
    					);
			$this->db->update_record($this->table,$input,$this->key.'='.intval($_GET['id']));
			security::redirect($this->module,'list');
	}
	function delete(){
			$this->db->delete_record($this->table,$this->key,$_POST['cid']);
			security::redirect($this->module,'list');
	}
	function type($input){
		switch ($input){
			case 'cha':
				$type = 'Nhóm tin';
			break;
			case 'cat':
				$type = 'Chủng loại';
			break;
			case 'id':
				$type = 'Một tin';
			break;
		}
		return $type;
	}
}
?>