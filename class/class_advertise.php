<?php
class advertise{
	var $table = '8x_advertise';
	var $key = 'adv_id';
	var $module = 'advertise';
	var $path = 'upload/adv/';
	var $pathadm = '../upload/adv/';
	var $width = '200px';
    var $height = '100px';
	function advertise(){
		$this->db = new database;
	}
	function detail(){
		return $this->db->detail($this->table,'',$this->key.' = '.intval($_GET['id']));
	}
    function detail1($id){
		return $this->db->detail($this->table,'',$this->key.' = '.intval($id));
	}
	function lists($where='',$limit=''){
		$result = $this->db->lists($this->table,'',$where,'ordering');
		$i =0;
		while ($row = $this->db->fetch_assoc($result)){
			$list[$i]->adv_id = $row[$this->key];
			$list[$i]->image = $row['image'];
			$list[$i]->name = $row['name'];
			$list[$i]->link = $row['link'];
            $list[$i]->position = $row['position'];
			$list[$i]->ordering = $row['ordering'];
            $list[$i]->status = $row['status'];
            $list[$i]->assign = $row['assign'];
			$i++;
		}
		$this->db->free_result($result);
		return $list;	
	}
	function add(){
			$image ='';
			if ($_FILES['file']['name']){
			$upload = new upload;
            if($_POST['position']=='banner')
            {
                $this->width='486px';
                $this->height= '60px';
            }
            elseif($_POST['position']=='image')
            {
                $this->width='125px';
                $this->height= '125px';
            }
			$upload->process($_FILES['file'],$this->pathadm,$this->width,$this->height);
			$image = clear($upload->name);
			}
			$input = array( 'name' => clear($_POST['name']),
    				'image' => $image,
					'link' => clear($_POST['link']),
                    'position' => clear($_POST['position']),
					'ordering' => intval($_POST['ordering']),
                    'status' => intval($_POST['status']),
                    'assign' => intval($_POST['assign']),
					);
			$this->db->insert_record($this->table,$input);
			security::redirect($this->module,'list');	
	}
    function addimg(){
			$image ='';
			if ($_FILES['file']['name']){
			$upload = new upload;
            if($_POST['position']=='banner')
            {
                $this->width='486px';
                $this->height= '60px';
            }
            elseif($_POST['position']=='image')
            {
                $this->width='125px';
                $this->height= '125px';
            }
			$upload->process($_FILES['file'],$this->pathadm,$this->width,$this->height);
			$image = clear($upload->name);
			}
			$input = array( 'name' => clear($_POST['name']),
    				'image' => $image,
					'link' => clear($_POST['link']),
                    'position' => clear($_POST['position']),
					'ordering' => intval($_POST['ordering']),
                    'status' => intval($_POST['status']),
                    'assign' => intval($_POST['assign']),
					);
			$this->db->insert_record($this->table,$input);
			security::redirect($this->module,'listimg');	
	}
	function edit(){
		$image = clear($_POST['image']);
		if ($_FILES['file']['name']){
			if ($_POST['image']){				
				unlink($this->pathadm.$_POST['image']);
				unlink($this->pathadm.'resize/'.$_POST['image']);
			}
			$upload = new upload;
            if($_POST['position']=='banner')
            {
                $this->width='486px';
                $this->height= '60px';
            }
            elseif($_POST['position']=='image')
            {
                $this->width='125px';
                $this->height= '125px';
            }
			$upload->process($_FILES['file'],$this->pathadm,$this->width,$this->height);
			$image = clear($upload->name);
		}
		    	$input = array( 'name' => clear($_POST['name']),
    				'image' => $image,
					'link' => clear($_POST['link']),
                    'position' => clear($_POST['position']),
					'ordering' => intval($_POST['ordering']),
                    'status' => intval($_POST['status']),
                    'assign' => intval($_POST['assign']),
					);
			$this->db->update_record($this->table,$input,$this->key.'='.intval($_GET['id']));
			security::redirect($this->module,'list');
	}
    function editimg(){
		$image = clear($_POST['image']);
		if ($_FILES['file']['name']){
			if ($_POST['image']){				
				unlink($this->pathadm.$_POST['image']);
				unlink($this->pathadm.'resize/'.$_POST['image']);
			}
			$upload = new upload;
            if($_POST['position']=='banner')
            {
                $this->width='486px';
                $this->height= '60px';
            }
            elseif($_POST['position']=='image')
            {
                $this->width='125px';
                $this->height= '125px';
            }
			$upload->process($_FILES['file'],$this->pathadm,$this->width,$this->height);
			$image = clear($upload->name);
		}
		    	$input = array( 'name' => clear($_POST['name']),
    				'image' => $image,
					'link' => clear($_POST['link']),
                    'position' => clear($_POST['position']),
					'ordering' => intval($_POST['ordering']),
                    'status' => intval($_POST['status']),
                    'assign' => intval($_POST['assign']),
					);
			$this->db->update_record($this->table,$input,$this->key.'='.intval($_GET['id']));
			security::redirect($this->module,'listimg');
	}
	function delete(){
			$this->db->delete_record($this->table,$this->key,$_POST['cid'],$this->pathadm);
			security::redirect($this->module,'list');
	}
    function deleteimg(){
			$this->db->delete_record($this->table,$this->key,$_POST['cid'],$this->pathadm);
			security::redirect($this->module,'listimg');
	}
}
?>