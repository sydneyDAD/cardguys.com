<? 	if ( !defined('INCLUDED') ) { die("Access Denied"); }
$where = 'special=1 && image <> ""';
$types = $cards_type->lists($where);

?>

<?

foreach ($types as $type) {
?>
<div class="mostpopular">
 <?

 if($type->image!='' && !$type->icon_on){


echo "<div class=\"mostpopularImage\"> <a title=\"".$type->name."\"  href=\"".$type->alias."\"><img border=\"0\" src=\"{$sitelink}upload/product/".$type->image."\" /></a> </div>";

 ?>
 

 <?

 }
 echo "<div class=\"mostpopularText\"> <a title=\"".$type->name."\"  href=\"".$type->alias."\">".$type->name."</a> </div>";
 ?>
</div>

<?

}

?>