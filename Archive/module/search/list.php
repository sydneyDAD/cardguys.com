<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
		$where = '';
		$type = replace_blank($_GET['type']);
		$keyword = replace_blank($_GET['keyword']);
		switch ($type) {
			case 'pro_name':
			$where = "WHERE name LIKE '%".$keyword."%' OR code LIKE '%".$keyword."%'";
			break;
			case 'pro_description':
			$where = "WHERE description LIKE '%".$keyword."%'";
			break;
			case 'pro_detail':
			$where = "WHERE detail LIKE '%".$keyword."%'";
			break;
			case 'pro_price_up':
			$where = "WHERE price > '".$keyword."'";
			break;
			case 'pro_price_down':
			$where = "WHERE price < '".$keyword."'";
			break;
			default:
			$where = "WHERE name LIKE '%".$keyword."%' OR code LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%' OR detail LIKE '%".$keyword."%'";
			break;
		}
$page->insert($product->table,'8',$where);
$show_pro = $product->show($page->pagerow,$where);
$i = 1;
?>
<title>Tìm kiếm <?=$keyword?></title>
	<i>(<?=$page->calculation()?> kết quả)</i>
<div>
		<?
		if ($show_pro){ 
			foreach ($show_pro as $show_pro){?>
					<div class="list_pro">
						<a align="left" style="float:left; margin-right: 8px;" href="index.php?module=<?=$product->module?>&view=detail&id=<?=$show_pro->pro_id?>"><?=$template->show_image($show_pro->image,$product->path_site.'resize/','width="125px"')?></a>
						<a class="product_name_detail" href="index.php?module=<?=$product->module?>&view=detail&id=<?=$show_pro->pro_id?>"><?=$show_pro->name?></a><br/>
						<b>Giá: </b><span class="product_price"><?=price($show_pro->price)?> VNĐ</span><br>
						<?=$show_pro->description;?>
					</div>
					<div class="dot"></div>
				<?}
			}
		?>	
</div>
<?=$page->paging()?>