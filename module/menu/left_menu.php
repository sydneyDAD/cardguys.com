<? 	if ( !defined('INCLUDED') ) { die("Access Denied"); }
$menu_1 = $menu->lists('child = 0 && position = \'left\'');
$i = 1;
?>
<table id="menu_cha">
<?
if ($menu_1){
	foreach($menu_1 as $menu_1){
	?>	
		<tr>
			<td class="cha">
            
				<a onclick="document.cookie='menu_id='+<?=$menu_1->menu_id?>" href="<?=$menu_1->link?>" <?=$menu_1->taget?>><?=$menu_1->name?></a>
			</td>
		</tr>
			<? $menu_2 = $menu->lists('child ='.intval($menu_1->menu_id).' && position = \'left\'');
				if ($menu_2){
					echo '<tr id="menu_'.$i.'" style="display: none"><td>';
					foreach ($menu_2 as $menu_2){?>
						<div class="cat">
                       
							<a style="color: red;" href="<?=$menu_2->link?>" <?=$menu_2->target?> ><?=$menu_2->name?></a>
						</div>
					<?}
					echo '</td></tr>';
				}
			$i ++;
	}
}
?>
</table>
<script language="javascript">
	document.getElementById('menu_'+<?=$_COOKIE['menu_id']?>).style.display = 'block';
</script>
			
					
				