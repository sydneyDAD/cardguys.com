<?php
$row_block = $block->lists('WHERE position = \'left\'');
if ($row_block){
	foreach ($row_block as $row_block){
		$template->module_title($row_block->name);?>
		<div class="left_menu">
			<? 
			$row_news = $news->show_news('WHERE '.$row_block->type.'_id = '.$row_block->id,$row_block->limit_item);
			if ($row_news){
				foreach ($row_news as $row_news){?>
						<a href="index.php?module=<?=$news->module;?>&view=detail&id=<?=$row_news->news_id?>"><?=$template->show_image($row_news->image,$news->path_site.'resize/','align = "left" style="margin-right: 7px; margin-top: 5px; margin-bottom: 5px;"  width = "60px"')?></a>
				<a class="title_news_left" href="index.php?module=<?=$news->module;?>&view=detail&id=<?=$row_news->news_id?>"><?=$row_news->name;?></a><br>
				<span class="description_news_left"><?=substr($row_news->description,'0','100')?>...</span>
					<div class="dot"></div>
				<?}
			}?>
		</div>
	<?}
}
?>