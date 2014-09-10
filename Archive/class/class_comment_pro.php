<?php
class comment_pro{
	var $table = '8x_comment_pro';
	var $key = 'com_id';
	function comment_pro(){
		$this->db = new database;
	}
	function lists($limit = '',$where=''){
		$result = $this->db->lists($this->table,'',$where,$this->key.' DESC',$limit);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->com_id = $row[$this->key];
			$list[$i]->pro_id = $row['pro_id'];
			$list[$i]->username = $row['username'];
			$list[$i]->content = $row['content'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function add(){
			$input = array( 'username' => clear_all($_POST['username']),
		    				'content' => clear_all($_POST['content']),
						    'pro_id' => intval($_GET['id'])
    					);
			$this->db->insert_record($this->table,$input);
			$this->db->alert(COMMENT_SUCCESS);
		header_redirect(change_url(full_url()));
	}
	function delete(){
			$this->db->delete_record($this->table,$this->key,$_POST['cid']);
			security::redirect('product','comment&id='.$_GET['id']);
	}
}
?>