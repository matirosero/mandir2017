<?php

    global $wpdb;

    $today = date('Y-m-d');
    $args = array(
        'post_type' => 'mro-announcement',
        'posts_per_page' => 0,
        'meta_key' => 'mro_announcement_date_end',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'mro_announcement_date_start',
                'value' => $today,
                'compare' => '<=',
            ),
            array(
                'key' => 'mro_announcement_date_end',
                'value' => $today,
                'compare' => '>=',
            )
        )
    );

    // Add a filter to do complex 'where' clauses...
    add_filter( 'posts_where', 'sap_filter_where' );
    $query = new WP_Query( $args );
    // Take the filter away again so this doesn't apply to all queries.
    remove_filter( 'posts_where', 'sap_filter_where' );

    $announcements = $query->posts;

    if($announcements) :
        ?>
        <div id="announcements" class="hidden">
            <div class="wrapper">
                <a class="close" href="#" id="close"><?php _e('x', 'simple-announcements'); ?></a>
                <div class="sap_message">
                    <?php
                    foreach ($announcements as $announcement) {
                        ?>
                        <?php echo do_shortcode(wpautop(($announcement->post_content))); ?>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    endif;