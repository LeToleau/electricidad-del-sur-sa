<?php
//For js req http://your-virtual-host.local/wp-json/post-powers/v1/paged-posts

//*************
//Api endpoint
//*************

add_action('rest_api_init', 'postPowers');
function postPowers()
{
    register_rest_route('post-powers/v1', 'paged-posts', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'pagedPosts'
    ));
}

function pagedPosts($data)
{
    //Get parammeters
    $post_type = $data['post_type']; //Post type
    $page = $data['page'];
    $postsPerPage = intval($data['posts_per_page']);
    $component = $data['component'];
    $paged = get_query_var('paged', $page);

    //WP Query
    $args = [
        'post_type' => $post_type,
        'posts_per_page'   => $postsPerPage,
        'post_status' => 'publish',
        'paged' => $paged,
        'order' => 'DESC'
    ];
    $full_posts = new WP_Query($args);

    //Filter fields
    $postsFilter = array();
    $postData = '';
    while ($full_posts->have_posts()) {
        $full_posts->the_post();
        ob_start();
        set_query_var('newpost', get_post());
        get_template_part('template-parts/components/component', $component);
        $postData .= ob_get_contents();
        ob_end_clean();
    }
    wp_reset_postdata();
    array_push($postsFilter, $postData);

    if ($postsFilter) {
        return array(
            'status' => true,
            'posts' => $postsFilter,
            'pages' => $full_posts->max_num_pages,
            'current_page' => intval($page)
        );
    } else {
        return array(
            'status' => false,
            'message' => __('Nothing Found...', 'wlc-courier')
        );
    }
}

//*************
//Module Function
//*************

function postPagination(
    $opt = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'component' => 'post',
        'next_button' => 'Next >',
        'prev_button' => '< Prev',
        'loader_color' => '#444',
        'numbers_limit' => 3
    )
) {
    $post_type = $opt['post_type'];
    $component = $opt['component']; //template part from template-parts/component/component-$component
    $nextBtn = $opt['next_button'];
    $prevBtn = $opt['prev_button'];
    $currentPage = isset($_GET[$post_type . '-page']) ? intval($_GET[$post_type . '-page']) : 1;
    $loaderColor = $opt['loader_color'];
    $numbersLimit = $opt['numbers_limit'];
    $postsPerPage = $opt['posts_per_page'];

    //WP Query.
    $args = [
        'post_type' => $post_type,
        'posts_per_page'   => $postsPerPage,
        'post_status' => 'publish',
        'paged' => $currentPage
    ];
    $posts = new WP_Query($args);

    //First posts.
    $postsData = '';
    while ($posts->have_posts()) {
        $posts->the_post();
        ob_start();
        set_query_var('newpost', get_post());
        get_template_part('template-parts/components/component', $component);
        $postsData .= ob_get_contents();
        ob_end_clean();
    }
    wp_reset_postdata();

    //Buttons for pages.
    $pages = $posts->max_num_pages;
    $buttonsPages = '';
    for ($i = 1; $i <= $pages; $i++) {
        if ($i == $currentPage) {
            $buttonsPages .= "<button class='js-page page active' page='$i'>$i</button>";
        } else {
            $buttonsPages .= "<button class='js-page page' page='$i'>$i</button>";
        }
    }

    //Controllers
    $controller = $posts->max_num_pages <= 1 ? '' : "<div class='c-pagination__controllers'>
    <button class='js-back prev-page disabled'>$prevBtn</button>
    <div class='c-pagination__pages js-pages' limit='$numbersLimit'>$buttonsPages</div>
    <button class='js-next next-page'>$nextBtn</button>
    </div>";

    //Print pagination ajax.
    echo "<div class='c-pagination js-post-pagination' post_type='$post_type'>
        <div class='c-pagination__container js-posts' posts_per_page='$postsPerPage' page='$currentPage' pages='$pages' component='$component' loader_color='$loaderColor'>$postsData</div>
        $controller
    </div>";
}
