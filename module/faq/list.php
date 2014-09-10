<? if ( !defined('INCLUDED') ) { die("Access Denied");}
if ($_POST['option']=='add')
{
$faq->add();
}?>

<script type="text/javascript">
$(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    
	    var target = this.hash,
	    $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});
		
</script>
<a name="top"></a>

<div class="infocard">				
    <div class="title-content-card-top3"><span class="text-title-Content-card-top"> Frequently Asked Questions</span></div>
    <div class="content-card-text-infomation">
        <div class="content-apply-text">

            <div style="text-align:left;">
                <div id="faq">
				<br />
                    <?
                    $i = 1; $where = ' status = 1 ';
                    $row = $faq->lists($faq->key.',question',$where,'');
                    $n=count($row);
                    echo "<ul>";
                    if ($row)
                    {
				
				$counter =0;
                    foreach ($row as $row)
                    {
				
                    ?>
                    <li class="faq">

				<span class="question">
				<a href="#<?= $i ?>" class="faq_question"><?= $row->question ?></a></span>
                    </li>
		    <br class='clear' />
                    <? $i ++;
                    }
		
                    }
                    echo "</ul>";
                    echo "</div>";

                    echo "<div id='faq_aq'>";
                    $row1 = $faq->lists($faq->key.',question,answer,keyword,meta',$where,'');
                    $j=1;
                    if ($row1)
                    {
                    foreach ($row1 as $row1)
                    {
                    ?>
                    <div style="margin-top: 20px;">
                        <p>
                            <span class="faq_question"><a id="<?= $j ?>"  name=<?= $j ?>><?= $row1->question ?></a></span><br/>
                            <span class="faq_answer"><?= $row1->answer ?><?if($j==1){?><a href="<?= $sitelink ?>/contact"> Click here to send us your comments.</a><? } ?></span>
                        </p>
                        <? $j ++;
                        if ($j <= $n)
                        {
                        ?>
                        <div class="under_faq">
                            <div><hr /></div>
				<div class="backtotop">
						<button class="applybtn">
				                <span style="top:-3px;">Back To Top</span> 
				                <img style="top:1px;" class="img-arrow readarrow" src="<?php echo $sitelink ?>/images/arrowbtn.png">
				</button>
			   
                        </div>

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
    </div>


