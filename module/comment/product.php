<? if ( !defined('INCLUDED') ) { die("Access Denied");}
if ($_POST['option'] == 'add_comment')
$com_pro->add();
	$limit = 7; $i = 1; $where = ' pro_id ='. intval($_GET['id']);
	$paging = $page->paging($com_pro->table,$limit,$where);
	$row = $com_pro->lists($page->limit(),$where); 
		if ($row){
			foreach ($row as $row){
				?>
				<div class="username"><?=$row->username?></div>
				<div class="content"><?=$row->content;?></div>
				<?}
			echo $paging;
			echo '<hr />';
			}
		include_once('module/comment/form.php');
?>