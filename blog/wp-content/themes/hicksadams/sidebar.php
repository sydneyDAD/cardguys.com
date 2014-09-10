<div id="w_submenu_1" class="sm-kickstart-wrapper">
	                   <?php
                            wp_nav_menu(array(
                                'theme_location' => 'additional',
                                'container' => false,
                                'depth' => 0,
                                'items_wrap' => '<ul class="side-menu">%3$s</ul>',
                                'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
                                'walker' => new reverie_walker(array(
                                    'in_top_bar' => true,
                                    'item_type' => 'li',
                                    'menu_type' => 'main-menu'
                                        )),
                            ));
                            ?>
</div><!-- /#sidebar -->