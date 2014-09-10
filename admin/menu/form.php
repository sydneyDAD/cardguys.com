<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }

if ($_POST['option']=='add')
	$menu->add();
if ($_POST['option']=='edit')
	$menu->edit();
if ($_GET['id']){
	$row = $menu->detail();
	$option = 'edit';
}
	echo $temp->title('Add Menu');
	echo $temp->input_text('Name','name',$row['name']);
		$menu_position = '<select name="position"><option value="top">Top</option><option value="left"';
		if ($row['position'] == 'left')
		$menu_position .= 'selected';
		$menu_position .= '>Left</option>';
		$menu_position .= '<option value ="bottom"';
		if ($row['position'] == 'bottom')
		$menu_position .= 'selected';
		$menu_position .= '>Bottom</option></select>';
	echo $temp->select_text('Position',$menu_position);
	echo $temp->select_text('Choise Type Link',$menu->select_module());
	echo $temp->input_text('Link','link',$row['link'],'60');
    $alow = '<select name="alow"><option value="1">Link</option><option value="0"';
		if ($row['alow'] == '0')
		$alow .= 'selected';
		$alow .= '>Not link</option></select>';
	echo $temp->select_text('Alow Link',$alow);
	echo $temp->select_text('Menu Level',$menu->select_child($row['child']));
		$menu_target = '<select name="target"><option value="">Open in Windown</option><option value="_blank"';
		if ($row['target'] == '_blank')
		$menu_target .= 'selected';
		$menu_target .= '>Open in New Windown</option>';
	echo $temp->select_text('Target',$menu_target);
	echo $temp->input_text('Order','ordering',$row['ordering'],'15');
	echo $temp->submit();

?>
<script language="javascript">
	function select_view(val){
			md = document.admin_form.module.value;
			vw = document.admin_form.view.value;
			id = document.admin_form.id.value;
			if (md == 'contact' || md == 'faq'){
				document.getElementById('view_2').style.display = 'none';
				document.getElementById('view_3').style.display = 'none';
			}
			else{
				document.getElementById('view_2').style.display = 'block';
				document.getElementById('view_3').style.display = 'block';
			}
			if (md == '' && (vw != '' || id !='')){
				alert("You must select module.");
				document.admin_form.view.value = '';
				document.admin_form.id.value = '';
				vw = ''; id = ''
			}
			show_link(md,vw,id);
	}
	function show_link(module,view,id){
		if (id != 0 && view ==''){
			id = '&id='+id;
			<? echo $check->check_number('id','id o dang so') ?>
		}
		document.admin_form.link.value = 'index.php?module=' + module + view + id;
	}
function checkinput(){
	<? 	echo $check->check_blank('name','Menu Name cannot be blank.');
		echo $check->check_blank('link','Link cannot be blank.');
			echo $check->check_number('ordering','Order must be a number and cannot be blank.');
	
	?>
}
</script>