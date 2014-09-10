<?php
class blog{
	var $table = '8x_blogs';
	var $key = 'blog_id';
	var $module = 'blog';
	function blog(){
		$this->db = new database;
	}
	function detail(){
		return $this->db->detail($this->table,'',$this->key.' = '. intval($_GET['id']));
	}
    function list_date()
    {
        $i =0;
        $select = 'distinct month(publishdate) as month, year(publishdate) as year';        
        $result = $this->db->lists($this->table,$select);
       	while ($row = $this->db->fetch_assoc($result))
        {
            $list[$i]->month = $row['month'];
			$list[$i]->year = $row['year'];
            $i++;
        }
       	$this->db->free_result($result);
		return $list;	
    }
   
	function lists($select='*',$where = '',$ordering = '',$limit='',$other = '')
	{
		$select = str_replace(',',',b.',$select);
		if ($ordering == '')
		{
			$ordering = 'b.'.$this->key.' DESC';
		}
		if ($other != '')
		{		
			$select = $select.',cat.category_id as cat_id, cat.name as cat_name';
			$other = "LEFT JOIN 8x_blog_category as cat ON cat.category_id = b.category_id";
		}
		$result = $this->db->lists($this->table.' AS b','b.'.$select,$where,$ordering,$limit,$other);
		$i =0;
		while ($row = $this->db->fetch_assoc($result))
		{
			$list[$i]->blog_id = $row[$this->key];
			$list[$i]->title = $row['title'];
            $list[$i]->keyword = $row['keyword'];
            $list[$i]->meta = $row['meta'];
			$list[$i]->cat_name = $row['cat_name'];
            $list[$i]->cat_id = $row['cat_id'];
            $list[$i]->body = $row['body'];
            $list[$i]->publishdate = date_fomat($row['publishdate']);            
            $list[$i]->status = $row['status'];	
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function add(){
		    $input = array( 'category_id' => $_POST['cat_id'],
    				'title' => clear($_POST['title']),
    				'body' => clear($_POST['body']),
                    'keyword' => clear($_POST['keyword']),
    				'meta' => clear($_POST['meta']),    				
                    'status' => intval($_POST['status']),
					'publishdate' => date('Y-m-d')
					);
			$this->db->insert_record($this->table,$input);
	       	security::redirect($this->module,'list');
	}
    
    function edit(){
		    $input = array( 
                    'status' => intval($_POST['status']),
                    'category_id' => intval($_POST['cat_id']),
                    'title' => clear($_POST['title']),
                    'body' => clear($_POST['body']),
                    'keyword' => clear($_POST['keyword']),
                    'meta' => clear($_POST['meta'])				
					);
			$this->db->update_record($this->table,$input,$this->key .' = '.intval($_GET['id']),0);
			security::redirect($this->module,'list');
	}
    
    function select($blog_id = '',$script = ''){
			$row = $this->lists();
			$temp = '<select name="blog_id" '.$script.'>';
			$temp .= '<option value="0">Select Category blog</option>';
			foreach($row as $row){
				$temp .= '<option value ="'.$row->blog_id.'"';
				if ($row->blog_id == intval($id))
				$temp .= 'selected';
				$temp .= '>'.$row->title.'</option>';
			}
			$temp .= '</select>';
			return $temp;
	}
    
	function delete(){
			$this->db->delete_record($this->table,$this->key,$_POST['cid']);
			security::redirect($this->module,'list');
	}
    
    	function checkstatus($input){
		if ($input == 1){
			return PRODUCT_STATUS1;
		}
		else
			return PRODUCT_STATUS0;
	}
}
?>

