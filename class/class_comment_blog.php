<?php
class comment_blog{
	var $table = '8x_comment_blog';
	var $key = 'comment_id';
	var $module = 'comment_blog';
	function comment_blog(){
		$this->db = new database;
	}
	function detail(){
		return $this->db->detail($this->table,'',$this->key.' = '. intval($_GET['id']));
	}
    
	function lists($select='*',$where = '',$ordering = '',$limit='',$other = '')
	{
		$select = str_replace(',',',c.',$select);
		if ($ordering == '')
		{
			$ordering = 'c.'.$this->key.' DESC';
		}
		if ($other != '')
		{		
			$select = $select.',b.blog_id as blog_id, b.title';
			$other = "LEFT JOIN 8x_blogs as b ON b.blog_id = c.blog_id";		
		}
		$result = $this->db->lists($this->table.' as c','c.'.$select,$where,$ordering,$limit,$other);
		$i =0;
		while ($row = $this->db->fetch_assoc($result))
		{
			$list[$i]->comment_id = $row[$this->key];
			$list[$i]->name = $row['name'];
			$list[$i]->email = $row['email'];
            $list[$i]->blog_id = $row['blog_id'];
            $list[$i]->title = $row['title'];
            $list[$i]->comments = $row['comments'];
            $list[$i]->url = $row['url'];            
            $list[$i]->commentdate = date_fomat($row['commentdate']);            
            $list[$i]->status = $row['status'];	
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
    
	function add(){
		    $input = array( 'blog_id' => $_POST['blog_id'],
    				'name' => clear($_POST['name']),
    				'comments' => clear($_POST['comments']),    				
					'email' => clear($_POST['email']),
                    'url' => clear($_POST['url']),
                    'status' => $_POST['status'],			
					'commentdate' => date('Y-m-d h:m:s')
					);
			$this->db->insert_record($this->table,$input);
	       	security::redirect($this->module,'list');
	}
	function add_user(){
		    $input = array( 'blog_id' => $_POST['blog_id'],
    				'name' => clear($_POST['name']),
    				'comments' => clear($_POST['comments']),    				
					'email' => clear($_POST['email']),
                    'url' => clear($_POST['url']),
                    'status' => $_POST['status'],			
					'commentdate' => date('Y-m-d h:m:s')
					);
                    unset($_POST);
			$this->db->insert_record($this->table,$input);            	       	
	}
    function edit(){
		    $input = array( 
                    'blog_id' => $_POST['blog_id'],
                   	'name' => clear($_POST['name']),
    				'commets' => clear($_POST['comments']),    				
					'email' => clear($_POST['email']),
                    'url' => clear($_POST['url']),
                    'status' => $_POST['status']								
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
