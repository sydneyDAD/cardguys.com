<? 
class faq{
	var $table = '8x_faq';
	var $key = 'faq_id';
	var $module = 'faq';
	function faq(){
		$this->db = new database;
	}
	function detail(){
		return $this->db->detail($this->table,'',$this->key.' = '. intval($_GET['id']));
	}
	function lists($select,$where='',$limit){
	/*	if ($where != ''){
			$where = ' && '.$where;
		}
		$where = 'lang = '.$_SESSION['lang'].$where;*/
		$result = $this->db->lists($this->table,'',$where,'ordering',$limit);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->faq_id = $row[$this->key];
			$list[$i]->name = $row['name'];
			$list[$i]->email = $row['email'];
			$list[$i]->subject = $row['subject'];
			$list[$i]->question = $row['question'];
			$list[$i]->answer = $row['answer'];
			$list[$i]->status = $row['status'];
			$list[$i]->date = date_fomat($row['date']);
			$list[$i]->ordering = intval($row['ordering']);
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
/*	function add(){
		    $input = array( 'name' => clear($_POST['name']),
    				'email' => clear($_POST['email']),
    				'subject' => clear($_POST['subject']),
    				'question' => clear($_POST['question']),
					'answer' => clear($_POST['answer']),
                    'status' => $_POST['status'],
				//	'lang' => intval($_SESSION['lang']),
					'date' => date('Y-m-d h:m:s'),
                    'ordering' => intval($_POST['ordering'])
					);
			$this->db->insert_record($this->table,$input);
			header_redirect(change_url('index.php?module='.$this->module.'&view=success'));
	}*/
    
    function add_admin(){
		    $input = array( 'name' => clear($_POST['name']),
    				'email' => clear($_POST['email']),
    				'subject' => clear($_POST['subject']),
    				'question' => clear($_POST['question']),
                    'keyword' => clear($_POST['keyword']),
                    'meta' => clear($_POST['meta']),
					'answer' => clear($_POST['answer']),
                    'status' => $_POST['status'],
				//	'lang' => intval($_SESSION['lang']),
					'date' => date('Y-m-d h:m:s'),
                    'ordering' => intval($_POST['ordering'])
					);
			$this->db->insert_record($this->table,$input);
			security::redirect($this->module,'list');
	}
	function edit(){
		    $input = array( 
                    'status' => intval($_POST['status']),
                    'name' => clear($_POST['name']),
                    'subject' => clear($_POST['subject']),
                    'email' => clear($_POST['email']),
                    'status' => $_POST['status'],
		    		'question' => clear($_POST['question']),
					'answer' => clear($_POST['answer']),
                    'meta' => clear($_POST['meta']),
					'keyword' => clear($_POST['keyword']),
                    'ordering' => intval($_POST['ordering'])
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