<?php //Example pagination 
?>

<div class="m-posts js-posts-pagination">

    <div class="container">

        <?php
        postPagination(
            array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'component' => 'post',
                'next_button' => 'Next >',
                'prev_button' => '< Prev',
                'loader_color' => '#0d2b60',
                'numbers_limit' => 3
            )
        ); ?>

    </div>

</div>