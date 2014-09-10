<?php
 if ( !defined('INCLUDED') ) { die("Access Denied");}
?>
<body>
<a name="top"></a>
<div class="infocard">
				<div class="border-content-card-top"></div>
				<div class="title-content-card-top"><span class="text-title-Content-card-top"> Advice Center</span></div>
				<div class="content-card-text-infomation">
					<div class="content-apply-text">

<div style="text-align:left;">
<?
echo "<div id='faq_aq'";
$row1 = $news->lists('*','cat_id > 0');
$n = count($row1);
$j=1;
if ($row1)
{
	foreach ($row1 as $row1)
	{
	?>
    <div style="margin-top: 10px; clear:both">
	<span class="faq_question"><a href="<?=$row1->alias?>" ><?=$row1->name?></a></span><br/>
	<span class="faq_answer"><?=$row1->description?></span>;
	 <? $j ++;
     if ($j <= $n)
     {
        ?>
        <div class="under_faq">
          <div style=" text-align: right; font-size: 12px; font-weight: bold;"><a href="<?=$row1->alias?>" style="color:#0D0155;">Read More</a></div>
          <div style=" "><hr noshade=""/></div>
        </div>
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
				<div class="border-content-card-bottom"></div>
   </div>
            </div>

 </body>
