<?php

class menu{
	var $table = '8x_menu';
	var $key = 'menu_id';
	var $module = 'menu';
	function menu(){
		$this->db = new database;
	}
	function detail(){
		return $this->db->detail($this->table,'',$this->key.' = '.intval($_GET['id']));
	}
	function lists($where = ''){
		if ($where != ''){
			$where = ' && '.$where;
		}
		$where = 'lang = '.$_SESSION['lang'].$where;
		$result = $this->db->lists($this->table,'',$where,'position,ordering');
		$i =0; $target = '';
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->menu_id = $row[$this->key];
			$list[$i]->name = $row['name'];
				if ($row['target'] != '')
				$target = 'target ='.$row['target'];
				if (strpos($row['link'],'&id=') == true || strpos($row['link'],'&cha=') == true || strpos($row['link'],'&cat=') == true)
				$alias = '&alias='.seourl($row['name']);
				else
				$alias = '';
			$list[$i]->link = change_url($row['link'].$alias);
			$list[$i]->position = $row['position'];
			$list[$i]->ordering = $row['ordering'];
            $list[$i]->alow = $row['alow'];
			$list[$i]->child = $row['child'];
			$list[$i]->target = $target;
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function add(){
 		$input = array( 'name' => clear($_POST['name']),
		    			'link' => clear($_POST['link']),
		    			'ordering' => intval($_POST['ordering']),
		    			'child' => intval($_POST['child']),
		    			'target' => clear($_POST['target']),
		    			'lang' => intval($_SESSION['lang']),
                        'alow' => intval($_SESSION['alow']),
		    			'position' => clear($_POST['position'])
    					);
                        
			$this->db->insert_record($this->table,$input);
			security::redirect($this->module,'list');
	}
	function edit(){
 		$input = array( 'name' => clear($_POST['name']),
		   				'link' => clear($_POST['link']),
		   				'ordering' => intval($_POST['ordering']),
		   				'position' => clear($_POST['position']),
						'child' => intval($_POST['child']),
                        'alow' => intval($_POST['alow']),
		   				'target' => clear($_POST['target']),
    					);
                        
			$this->db->update_record($this->table,$input,$this->key.'='.intval($_GET['id']));
			security::redirect($this->module,'list');
	}
	function delete(){
			$this->db->delete_record($this->table,$this->key,$_POST['cid']);
			security::redirect($this->module,'list');
	}
	function select_child($current = ''){
		$row = $this->lists('child = \'0\'');
		$child = '<select name = "child"><option value = "0">Parent Menu</opiton>
		';
		if ($row){
			foreach ($row as $row){
				$child .= '<option value = "'.$row->menu_id.'"';
				if ($row->menu_id == $current) 
				$child .= 'selected';
				$child .= '>'.$row->name.'</option>';
			}	
		}
			$child .= '</select>';
			return $child;
		
	}
	function select_module(){
	return '<span style="float:left;">
				<select name = "module" onchange="select_view();">
						<option value = "">Select Module</option>
						<option value = "product">Product</option>
						<option value = "news">News</option>
						<option value = "contact">Contact</option>
						<option value = "faq">FAQ</option>
				</select>
			</span>
			<span id = "view_2" style="float: left; display: block;">
					<select style="margin-left: 5px;" name="view" onchange="select_view();">
						<option value="">Show All</option>
						<option value="&cha=">Show Channel</option>
						<option value="&cat=">Show Category</option>
					</select>
			</span>
			<span id= "view_3" style="float: left; display: block;">
					<b> ID: </b><input onkeyup="select_view();" type="text" name="id" value="" title="Enter ID for Menu">
			</span>';
	}
}
?>