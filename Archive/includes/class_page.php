<?php
// Can nhap vao du lieu $sql va so row tren 1 trang
class page{
	var $table;
	var $pagerow;
	var $where;
	function limit (){
		return $this->getstart().','.$this->pagerow;
	}
	function calculation (){
		$db = new database;
		return $db->count($this->table,$this->where);
	}
	function curent_page(){
		if (!$_GET['page'])
		$current = 1; 
		else
		$current = intval($_GET['page']);
		return $current;
	}
	function getstart(){
		return ($this->curent_page() - 1)*$this->pagerow;
	}
	function geturl(){
		$url = full_url();
		if ($_GET['page']){
			$url = str_replace('&page='.$_GET['page'],'',$url);
		}
		return $url;
	}
	function paging($table,$pagerow,$where = '',$lang = ''){
		if ($lang != ''){
			$lang = 'lang = '.$_SESSION['lang'];
			if ($where != ''){
				$where = $lang.' && '.$where;
			}
		}
		$this->table = $table;
		$this->pagerow = $pagerow;
		$this->where = $where;
		
		$total = $this->calculation();
		$current_page = $this->curent_page();
		$href = $this->geturl();
		$row = $this->pagerow;

		if ($total <= $row)
		return false;
		//so trang tren 1 phan doan
		// Tinh tong so trang
		if ($total % $row == 0) 
		$total_page = (int)($total/$row);
		else 
		$total_page = (int)($total/$row + 1);
		$page="";
		
		if ($current_page < 7){
			$page .= ' ';
			for ($i=1;$i<$current_page;$i++){
				$page .= '<a class="page" href="'.$href.'&page='.$i.'">'.$i.'</a>';
			}
		}
		else{
			$page .= '<b><a class="page" href="'.$href.'">Fist...</a></b>';
			for ($i=($current_page - 5);$i<$current_page;$i++){
				$page .= '<a class="page" href="'.$href.'&page='.$i.'">'.$i.'</a>';
			}
		}
		$page .= '<span style="padding: 0px 5px; font-size:15px; color:#8000FF; text-decoration:underline;">'.$current_page.'</span>';
		if ($current_page + 5 >= $total_page){
			for ($j = $current_page+1;$j <= ($current_page+($total_page - $current_page));$j++){
				$page .= '<a class="page" href="'.$href.'&page='.$j.'">'.$j.'</a>';
			}
		}
		else{
			for($j = $current_page + 1;$j<=$current_page+5;$j++){
				$page .= '<a class="page" href="'.$href.'&page='.$j.'">'.$j.'</a>';
			}
			$page .= '<b><a class="page" href="'.$href.'&page='.$total_page.'">...End</a></b>';
		}
		
		$output = '<div class="list_paging"><span class="paging" style="font-weight: bold; font-size: 14px;">'.$page.'</span></div>';
		return $output;		
	}
}
?>