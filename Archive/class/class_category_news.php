<?php
class category_news
{
    var $table = '8x_category_news';
    var $key = 'cat_id';
    var $module = 'category_news';

    function category_news()
    {
        $this->db = new database;
    }
    function detail()
    {
        return $this->db->detail($this->table,'', $this->key . ' = ' . intval($_GET['id']));
    }
    function lists($select='',$where)
    {
        $result = $this->db->lists($this->table,$select,$where,'ordering');
        $i = 0;
        while ($row = $this->db->fetch_assoc($result)){
            $list[$i]->cat_id = $row[$this->key];
			$list[$i]->cha_id = $row['cha_id'];
            $list[$i]->name = $row['name'];
        //    $list[$i]->alias = $row['alias'];
            $list[$i]->ordering = $row['ordering'];
            $i++;
        }
        $this->db->free_result($result);
        return $list;
    }
    function add()
    {
        $input = array(	'name' => clear($_POST['name']), 
	//			        'alias' => clear($_POST['alias']), 
						'cha_id' => intval($_POST['cha']),
            			'ordering' => intval($_POST['ordering']));
        $this->db->insert_record($this->table, $input);
        security::redirect($this->module, 'list');
    }
    function edit()
    {
        $input = array(	'name' => clear($_POST['name']),
		//		        'alias' => clear($_POST['alias']),
						'cha_id' => intval($_POST['cha']),
						'ordering' => intval($_POST['ordering']));
        $this->db->update_record($this->table, $input, $this->key . '=' . intval($_GET['id']));
        security::redirect($this->module, 'list');
    }
    function delete($colum = '')
    {
    	$cha = new channel_news;
    	$news = new news;
    	$module = $cha->module;
    	if ($colum == ''){
    		$colum = $this->key;
    		if ($this->db->check_delete($news->table,$colum,$_POST['cid']) > 0){
			$this->db->alert('Bạn phải xóa tin tức thuộc chủ đề cần xóa trước');
			security::redirect($news->module,'list');
			return false;
			}
    		$module = $this->module;
    	}
        $this->db->delete_record($this->table, $colum, $_POST['cid']);
        security::redirect($module,'list');
    }
    function select($cha_id, $cat_id = '', $script = '')
    {
        $row = $this->lists('name,'.$this->key,'cha_id ='.intval($cha_id));
		$temp = '<select name="cat" ' . $script . '>';
        $temp .= '<option value="0">Select Category</option>';
        if ($row){
		foreach ($row as $row) {
            $temp .= '<option value ="' . $row->cat_id . '"';
            if ($row->cat_id == intval($cat_id))
                $temp .= 'selected';
            $temp .= '>' . $row->name . '</option>';
        }
        }
        $temp .= '</select>';
        return $temp;
    }
}
?>