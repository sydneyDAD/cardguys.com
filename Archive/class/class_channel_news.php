<?php
class channel_news{
	var $table = '8x_channel_news';
	var $key = 'cha_id';
	var $module = 'channel_news';
	function channel_news(){
		$this->db = new database;
	}
	function detail (){
		return $this->db->detail($this->table,'',$this->key.' = '.intval($_GET['id']));
	}
	function lists($limit = '',$where=''){
		if ($where != ''){
			$where = ' && '.$where;
		}
		$where = 'lang = '.$_SESSION['lang'].$where;
		$result = $this->db->lists($this->table,'',$where,'ordering',$limit);
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->cha_id = $row[$this->key];
	//		$list[$i]->alias = $row['alias'];
			$list[$i]->name = $row['name'];
			$list[$i]->ordering = $row['ordering'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function add(){
		    $input = array( 'name' => clear($_POST['name']),
		//   					'alias' => clear($_POST['alias']),
							'lang' => intval($_SESSION['lang']),
						    'ordering' => intval($_POST['ordering'])
    					);
			$this->db->insert_record($this->table,$input);
			security::redirect($this->module,'list');
	}
	function edit(){
		    $input = array( 'name' => clear($_POST['name']),
	//					    'alias' => clear($_POST['alias']),
						    'ordering' => intval($_POST['ordering'])
    					);
			$this->db->update_record($this->table,$input,$this->key.'='.intval($_GET['id']));
			security::redirect($this->module,'list');
	}
	function delete(){
			$cat = new category_news;
			$news = new news;
			if ($this->db->check_delete($news->table,$this->key,$_POST['cid']) > 0){
				$this->db->alert('You must delete news first.');
				security::redirect($news->module,'list');
				return false;
			}
			$this->db->delete_record($this->table,$this->key,$_POST['cid']);
			$cat->delete($this->key);
	}
	function select($cha_id = '',$script = ''){
			$row = $this->lists();
			$temp = '<select name="cha" '.$script.'>';
			$temp .= '<option value="0">Select Channel</option>';
			foreach($row as $row){
				$temp .= '<option value ="'.$row->cha_id.'"';
				if ($row->cha_id == intval($cha_id))
				$temp .= 'selected';
				$temp .= '>'.$row->name.'</option>';
			}
			$temp .= '</select>';
			return $temp;
	}
	function get_cha(){
		if ($_GET['module'] == 'news'){
			if (intval($_GET['cha']) > 0){
				return intval($_GET['cha']);
			}
			elseif(intval($_GET['cat']) > 0){
				$cat = new category_news;
				$row = $cat->detail($_GET['cat']);
				return $row['cha_id'];
			}
			elseif (intval($_GET['id']) > 0){
				$news = new news;
				$row = $news->detail('cha_id',$_GET['id']);
				return $row['cha_id'];
			}
		}
		else
		return 0;
	}
}
?>