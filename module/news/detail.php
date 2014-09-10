<?php if ( !defined('INCLUDED') ) { die("Access Denied"); }
$row = $news->detail();

//echo $template->title_content($row['name']);
?>
<div class="infocard">
				
				<div class="title-content-card-top3" style="height: 25px;"><span class="text-title-Content-card-top" style="display: block; height: 30px; line-height: 15px;"><?=$template->title_content($row['name'])?></span></div>
				<div class="content-card-text-infomation">
	<div class="content-apply-text">
	<div class="body"><div style="width:600px;white-space:wrap;">
        <?
            if($row['description']!='')
            {
                echo "<p>";
                echo $row['description'].'</p>';
            }
            else
            echo '';        
        ?>
		<p >
		<?=$row['detail']?></p>

</div>
</div>
            </div>
				</div>
				
			</div>
	
