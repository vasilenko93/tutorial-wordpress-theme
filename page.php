<?php get_header()?>

<?php
    while(have_posts()) {
        the_post(); ?>

        <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg')?>)"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title()?></h1>
                <div class="page-banner__intro">
                <p>TODO: make this dynamic with custom field for pages</p>
                </div>
            </div>
        </div>

        <div class="container container--narrow page-section">
            <?php
                $parentId = wp_get_post_parent_id(get_the_ID());
                if($parentId > 0) { ?>
                    <div class="metabox metabox--position-up metabox--with-home-link">
                        <p>
                            <a class="metabox__blog-home-link" href="<?php echo get_permalink($parentId)?>">
                                <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($parentId) ?>
                            </a>
                            <span class="metabox__main"><?php the_title()?></span>
                        </p>
                    </div>
                <?php }
            ?>
            
            
            
            <!-- Page sidebar, to be shown only for parent-child relationship page  -->
            <?php 
            $childPages = get_pages(array(
                'child_of' => get_the_ID()
            ));
            // $parentId being true means this is a child page
            // $childPages being true means this is a parent page with child pages
            // If its not a parent or a child, aka a regular page, than don't show this section
            if($parentId or $childPages) { ?>
            <div class="page-links">
                <h2 class="page-links__title">
                    <a href="<?php echo get_permalink($parentId); ?>"><?php echo get_the_title($parentId); ?></a>
                </h2>
                <ul class="min-list">
                    <?php
                        // If the page is a parent than use its own ID,
                        // however, if the page is a child us the parent ID
                        if($parentId) {
                            $idToUse = $parentId;
                        } else {
                            $idToUse = get_the_ID();
                        }
                        wp_list_pages(array(
                            'title_li' => NULL,
                            'child_of' => $idToUse,
                            'sort_column' => 'menu_order'
                        ));
                    ?>
                </ul>
            </div>
            <?php } ?>
            <!-- End Page Sidebar  -->

            <div class="generic-content">
                <?php the_content()?>
            </div>
        </div>
    
    <?php
    }
    ?>

<?php get_footer()?>

