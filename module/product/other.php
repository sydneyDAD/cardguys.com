<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
$limit = '7'; $i = 1;
$select = 'name,pro_id,price,description,image,alias';
// lay row[cat_id] tu query product_detail. Chi lay cac san pham cu hon
$where = 'cat_id = '.$row['cat_id'].' && pro_id < '.$_GET['id'];
$row = $product->lists($select,$where,'',$limit);
?>
<table id="product" cellpadding="10px" cellspacing="0">
		<tr>
		<? if ($row){
			foreach ($row as $row){
				$border = '';
				if ($i > 3){
					$border .= $border_top;
				}
				if ($i%3 != 0)
					$border .= $border_right;
			?>
			<td style="width: 33%; <?=$border?>">
				<a  href="<?=change_url('index.php?module='.$product->module.'&id='.$row->pro_id.'&alias='.$row->alias)?>"><?=$template->show_image($row->image,$product->path.'resize/','alt="'.$row->name.'" width="120px" align="right" style="margin: 0 5 3 5;"')?></a>
				<div class="product_name"><a href="<?=change_url('index.php?module='.$product->module.'&id='.$row->pro_id.'&alias='.$row->alias)?>"><?=$row->name;?></a></div>
				<div class="product_description">
					<?=$row->description?>
				</div>
				<a href="<?=change_url('index.php?module='.$product->module.'&id='.$row->pro_id.'&alias='.$row->alias)?>"><?=$template->show_detail($row->pro_id)?></a>
			</td>
			<? if ($i % 3 == 0) echo '</tr><tr>';
				$i++;}
			}
		?>
		</tr>
		<tr>
			<td colspan="3" align="right"><?=$paging?></td>
		</tr>
	</table>