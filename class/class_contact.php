<? 
class contact{
	var $table = '8x_contact';
	var $key = 'contact_id';
	var $module = 'contact';
	function contact(){
		$this->db = new database;
	}
	function detail(){
		return $this->db->detail($this->table,'',$this->key.' = '. intval($_GET['id']));
	}
	function lists($where='',$limit){
		$result = $this->db->lists($this->table,'',$where,$this->key.' DESC',$limit);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->contact_id = $row[$this->key];
			$list[$i]->name = $row['name'];
			$list[$i]->email = $row['email'];
			$list[$i]->status = $row['status'];
			$list[$i]->date = $row['date'];
			$list[$i]->subject = $row['subject'];
            $list[$i]->ma_nhanvien = $row['ma_nhanvien'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function add(){
	      global $sitelink;
		    $input = array( 'name' => clear_all($_POST['name']),
                     'email' => clear_all($_POST['email']),
    				'subject' => clear_all($_POST['subject']),
    				'content' => clear_all($_POST['content']),
					'date' => date('Y-m-d h:m:s')
					);
			$this->db->insert_record($this->table,$input);
            
              
            
			header_redirect($sitelink.$this->module.'/success');
	}
	function edit(){
		    $input = array( 'status' => 1,
					);
			$this->db->update_record($this->table,$input,$this->key .' = '.intval($_GET['id']),0);
	}
	function delete(){
			$this->db->delete_record($this->table,$this->key,$_POST['cid']);
			security::redirect($this->module,'list');
	}
}
?>