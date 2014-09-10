<? if ( !defined('INCLUDED') ) { die("Access Denied"); }
$row1 = $news->lists('*','special=1');
if($row1)
{
?>
<div class="title-content-card-top <?=$extraie9?>"><span class="text-title-Content-card-top"> Advice Center</span></div>
				<div class="content-card-text-infomation <?=$extraie10?>">
                <? 
                    foreach($row1 as $row1)
                    {
                        ?>
                        <div class="content-apply-text22">
                            <span class="faq_question"><a href="<?=$row1->alias?>" ><?=$row1->name?></a></span><br/>
                            <?=substr($row1->description,0,230)?>...
                            <a href="<?=$row1->alias?>" style="font-size:9px;"> >> Read More</a>
                        
					   </div>
                        <?
                        
                    }
                ?>
				<div  style="text-align: center !important; text-decoration: underline; color: #0D0155; font-weight: bold;float:left;width:100%;"><a href="advice-center">Click here to see more articles</a></div>	
				</div>
<? }?>
