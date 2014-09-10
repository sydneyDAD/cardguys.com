<? 	if ( !defined('INCLUDED') ) { die("Access Denied"); }
	$row = $menu->lists('child = 0 && position = \'bottom\'');
?>


<?
if ($row){
	foreach ($row as $row){
	   $name = explode('.',$row->link);
       ?>
    

	<?}
}
?>

