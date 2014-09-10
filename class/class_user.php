<?php
class user{
	var $table = '8x_user';
	var $key = 'user_id';
	var $module = 'user';
	var $nomal_user = 'user';
	var $admin_user = 'administrator';
	//////////Có 3 quy?n administrator, mod t?ng module, user thu?ng.//////////
	function user(){
		$this->db = new database;
	}
	function detail(){
		return $this->db->detail($this->table,'',$this->key.' = '.intval($_GET['id']));
	}
	function get_detail_by_id($select='',$id = ''){
		
		return $this->db->detail($this->table,$select,$this->key.' = '.intval($id));
	}
	function lists($where,$limit){
		$result = $this->db->lists($this->table,'',$where,$this->key.' DESC',$limit);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->user_id = $row[$this->key];
			$list[$i]->full_name = $row['full_name'];
			$list[$i]->username = $row['username'];
			$list[$i]->email = $row['email'];
			$list[$i]->status = $row['status'];
			$list[$i]->permission = $row['permission'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function add(){
		    $input = array( 'full_name' => clear($_POST['full_name']),
    				'username' => clear($_POST['username']),
    				'email' => clear($_POST['email']),
    				'status' => intval($_POST['status']),
					'password' => md5(clear($_POST['username'].$_POST['password'])),
					'permission' => clear($_POST['permission'])
					);
			$this->db->insert_record($this->table,$input);
			security::redirect($this->module,'list');	
	}
	function edit(){
		// neu co nhap pass thi lay gia tri moi, kho se lay gia tri ban dau
		if ($_POST['confirm_password']!='')
		$password = md5(trim($_POST['username']).trim($_POST['confirm_password']));
		else
		$password = clear($_POST['resetpass']);
        
		    $input = array( 'full_name' => clear($_POST['full_name']),
    				'email' => clear($_POST['email']),
    				'status' => intval($_POST['status']),
					'password' => $password,
					'permission' => clear($_POST['permission'])
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