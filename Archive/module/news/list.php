<?php
 if ( !defined('INCLUDED') ) { die("Access Denied");}
?>
<body>
<a name="top"></a>
<div id='faq_title'>Advice Center</div>
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
	<span class="faq_question"><a  name=<?=$j?>><?=$row1->name?></a></span><br/>
	<span class="faq_answer"><?=$row1->description?></span>;	
	 <? $j ++;
     if ($j <= $n)
     {
        ?>
        <div class="under_faq">
          <div style=" float: right; margin-top:-20px; margin-right:-25px; font-size: 12px; font-weight: bold;"><a href="<?echo 'index.php?module=news&id='.$row1->news_id;?>" style="color:#0D0155;">Read More</a></div>          
          <div style="float:left; margin-top:-5px "><hr noshade=""/></div>           
        </div>
        <?
     }
     ?>
     </div>
     <?
	}
}?>

</div>
 </body>
