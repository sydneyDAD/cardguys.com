
 <?php if ($row_config['home_header']):
                                ?>			
                                <div id=apply_for class="title-content-card-top <?= $extraie9 ?>">
                                    <h1>
                                        Apply for a Credit Card Online
                                    </h1>
                                </div>
                                <div class="content-card-text-infomation <?= $extraie10 ?>">
                                    <div class="content-apply-text">					

                                        <?= $row_config['home_header'] ?>

                                    </div>
                                </div>
                            <? endif; ?>	

                            <div id=top_credit class="title-content-card-top <?= $extraie9 ?>"><span class="text-title-Content-card-top front-top-title"> Top Credit Card Offers</span></div>			
                            <div class="content-card-text-infomation  <?= $extraie10 ?>">
                                <div class="content-apply-text">
                                    <? include('module/other/special_cards.php') ?>

                                </div>
                            </div>
                                                                                                                                                                                                                                                                                                                                        <div class="content-apply-text">
                            <?
                            include('module/menu/special_type.php')
                            ?>

                            <div id=issuer_credit class="title-content-card-top <?= $extraie9 ?>"><span class="front-top-title text-title-Content-card-top"> Credit Cards By Issuer</span></div>
                            <div class="content-card-text-infomation mainissuer  <?= $extraie10 ?>">

                                <? include('module/other/list_bank_in_home.php') ?>
                                <br class="clear"/>     
                            </div>


                            <?
                            require( 'blog/wp-load.php' );
                            include('module/other/latest_articles.php')
                            ?>


                            <? if ($row_config['home_footer']): ?>
          
                            <? endif; ?>





                            <div style="clear:both"></div>