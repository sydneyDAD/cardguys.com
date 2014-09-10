 <?php
 if ( !defined('INCLUDED') ) { die("Access Denied");}
?>

<a name="top"></a>
<div class="infocard">
				
				<div class="title-content-card-top3"><span class="text-title-Content-card-top"> Advice Center</span></div>
				<div class="content-card-text-infomation">
					<div class="content-apply-text">

<div style="text-align:left;">
<?
echo "<div id='faq'>";
$row1 = $news->lists('*','cat_id > 0');
$n = count($row1);
$j=1;
if ($row1)
{
	foreach ($row1 as $row1)
	{
	$row1->description = str_replace('"',"'",$row1->description);
	
	?>
    <div style="margin-top: 10px; clear:both">
	<span class="faq_question advice-question"><a href="<?=$sitelink."/".$row1->alias?>" ><?=$row1->name?></a></span>
	<span class="faq_answer"><?=stripslashes($row1->description)?></span>..
	        <div class="under_faq">
          <div style=" text-align: left; font-size: 12px; font-weight: bold; margin-top:10px;margin-bottom:20px;">
	   <a href="<?= $sitelink ?>/<?=$row1->alias?>">
            <button class="applybtn advice-center-btn"><span>Read More</span> 
             <img class="img-arrow" src="<?php echo $sitelink ?>/images/arrowbtn.png"></button>
           </a>
	  </div>
         
        </div>
	 <? $j ++;
     if ($j <= $n)
     {
        ?>
 <div ><hr ></div>
        <?
     }
     ?>
     </div>
     <?
	}
}?>

</div>
</div>
</div>

				
   </div>
            </div>

 
