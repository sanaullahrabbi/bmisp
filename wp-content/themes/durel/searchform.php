
<form role="search" method="get" class="search-form position-relative mb-50 lg-mb-40"
    action="<?php echo esc_url(home_url('/')); ?>">
    <!-- <label>
        <span class="screen-reader-text"><?php echo _x('Search for:', 'label'); ?></span> -->
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search …', 'placeholder'); ?>"
        value="<?php echo get_search_query(); ?>" name="s" />
    <!-- </label> -->
    <button type="submit">
        <i class="bi bi-search"></i>
    </button>
</form>