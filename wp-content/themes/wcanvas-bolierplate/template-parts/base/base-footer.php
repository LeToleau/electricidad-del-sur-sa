<?php
    //Remember to import this file into the footer.php file for it to work!

    //CONFIG
    //You can create custom menus from the wp-menus.php file found in the path inc/optional/wp-menus.php
    $theme_location_menu = 'main-menu'; //Set your menu from here
?>

<div class="b-footer">

    <div class="b-footer__container container">

        <div class="b-footer__brand">
            <h3><?php the_title();?></h3>
        </div>

        <?php //Nav menu 
            wp_nav_menu( array( 
                'theme_location' => $theme_location_menu, //Nav menu selector
                'container_class' => 'menu b-footer__menu') //Nav menu class
            ); 
        ?>

    </div>

</div>