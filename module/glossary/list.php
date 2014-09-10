<? if ( !defined('INCLUDED') ) { die("Access Denied");}
if ($_POST['option']=='add')
{
$glossary->add();
}?>

<a name="top"></a>
<div class="infocard">

    <div class="title-content-card-top3"><span class="text-title-Content-card-top"> Glossary Of Terms</span></div>
    <div class="content-card-text-infomation">
        <div class="content-apply-text">



            <div style="text-align:left;">
                <?
                echo "<div id='faq_aq'>";
                $row1 = $glossary->lists($glossary->key.',subject,content',$where,'');
                $n = count($row1);
                $j=1;
                if ($row1)
                {
                foreach ($row1 as $row1)
                {
                ?>
                <div style="margin-top: 10px;">
                    <p>
                        <span class="faq_question"><a  name=<?= $j ?>><?= $row1->subject ?></a></span><br/>
                        <span class="faq_answer"><?= $row1->content ?></span>;
		        <div class="backtotop">
                            <button class="applybtn">
                                <span style="top:-3px;">Back To Top</span> 
                                <img style="top:1px;" class="img-arrow readarrow" src="<?php echo $sitelink ?>/images/arrowbtn.png">
                            </button>
			   
                        </div>
				<br class="clear" />
                    </p>
                    <? $j ++;
                    if ($j <= $n)
                    {
                    ?>
            <!--        <div class="under_faq">-->

                   
			
                        <div style="margin-top: 3px;"><hr noshade=""/></div>
<!--                    </div>-->
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
