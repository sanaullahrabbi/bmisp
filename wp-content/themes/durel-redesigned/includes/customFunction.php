<?php
// Page Banner Image
function pageBannerSection($pageTitle)
{
    ?>
    <div class="inner-banner-one position-relative">
        <div class="container">
            <div class="position-relative">
                <div class="row row-cols-1">
                    <div class="col m-auto text-center">
                        <div class="title-two">
                            <h2 class="text-white"><?php echo $pageTitle ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}


function customPostArrayData($postType, $postPerPage = 9, $order = "ASC", $orderBy = "date")
{
    return array(
        "post_type" => $postType,
        "posts_per_page" => $postPerPage,
        "order" => $order,
        "orderby" => $orderBy,
        "paged" => get_query_var("paged") ? get_query_var("paged") : 1,
    );
}

// Custom Post Pagination 
function postPagination($postData)
{
    return paginate_links(
        array(
            'total' => $postData->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'prev_text' => __('&lt;', 'durel'),
            'next_text' => __('&gt;', 'durel'),
        )
    );
}

?>