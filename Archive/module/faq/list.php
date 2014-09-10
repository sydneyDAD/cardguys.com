<? if ( !defined('INCLUDED') ) { die("Access Denied");}
if ($_POST['option']=='add')
{
		$faq->add();
}?>

<a name="top"></a>

<div class="infocard">
				<div class="border-content-card-top"></div>
				<div class="title-content-card-top"><span class="text-title-Content-card-top"> Frequently Asked Questions</span></div>
				<div class="content-card-text-infomation">
					<div class="content-apply-text">

<div style="text-align:left;">
<div id="faq">
<?
 $i = 1; $where = ' status = 1 ';
$row = $faq->lists($faq->key.',question',$where,'');
$n=count($row);
echo "<ul>";
if ($row)
{
	foreach ($row as $row)
	{
	?>
	<li><span class="question"><a class="faq_question" href="faq/#<?=$i?>"><b><?=$row->question?></b></a></span>
	</li>
	<? $i ++;
	}
}
echo "</ul>";
echo "</div>";

echo "<div id='faq_aq'";
$row1 = $faq->lists($faq->key.',question,answer,keyword,meta',$where,'');
$j=1;
if ($row1)
{
	foreach ($row1 as $row1)
	{
	?>
    <div style="margin-top: 20px;">
	<p>
	<span class="faq_question"><a  name=<?=$j?>><?=$row1->question?></a></span><br/>
	<span class="faq_answer"><?=$row1->answer?><?if($j==1){?><a href="contact"> Click here to send us your comments.</a><? } ?></span>;
	</p>
	 <? $j ++;
     if ($j <= $n)
     {
        ?>
        <div class="under_faq">
            <div><hr noshade=""/></div>
            <div style=" float: right; margin-right:30px; font-size: 12px; font-weight: bold;"><a href="faq/#top" style="color:#0D0155;">Back To Top</a></div>
        </div>
        <?
     }
     echo "</div>";
	}
}?>

</div>
</div>
</div>
				</div>
				<div class="border-content-card-bottom"></div>
			</div>

