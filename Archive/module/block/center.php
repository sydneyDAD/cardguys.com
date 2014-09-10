<?php
$row = $block->lists('position = \'center\'');
if ($row){
	$j=1; $style = '';
	echo '<table id ="block_center" cellpadding="10" cellspacing="0"><tr>';
	foreach ($row as $row){
		$i = 1;
		if ($j > 1) $style = 'style="border-left: 1px solid #DDDDDD"';
		echo '<td valign="top" '.$style.' width="50%"><div class="title">'.$row->name.'</div>';?>
			<? 
			$row_news = $news->lists($news->key.',image,name,description,alias',$row->type.'_id = '.$row->id,$news->key.' DESC',$row->limit_item);
			if ($row_news){
				foreach ($row_news as $row_news){
					if ($i < 4){	
				?>
						<a href="<?=change_url('index.php?module='.$news->module.'&id='.$row_news->news_id.'&alias='.$row_news->alias)?>"><?=$template->show_image($row_news->image,$news->path.'resize/','align = "left" style="margin: 5px 7px 5px 0;" alt="'.$row_news->name.'" width = "100px"');?></a>
				<div class="title_news">
					<a href="<?=change_url('index.php?module='.$news->module.'&id='.$row_news->news_id.'&alias='.$row_news->alias)?>"><?=$row_news->name?></a>
				</div>
				<span style="color: #747474"><?=substr($row_news->description,'0','130')?>...</span>
				<div class="dot"></div>
				<?}
				if ($i>4){
				?>
					<div class="other">- <a href="<?=change_url('index.php?module='.$news->module.'&id='.$row_news->news_id.'&alias='.$row_news->alias)?>"><?=$row_news->name?></a></div>
				<?}
				$i ++;
				}
			}
	$j++;
	}
	
	echo '</td></tr></table>';
}
?>