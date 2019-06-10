<div style="margin:10px;" class="wedocs-sidebar wedocs-hide-mobile">

    <?php
    $ancestors = array();
    $root      = $parent = false;

    if ( $post->post_parent ) {
        $ancestors = get_post_ancestors($post->ID);
        $root      = count($ancestors) - 1;
        $parent    = $ancestors[$root];
    } else {
        $parent = $post->ID;
    }

    // var_dump( $parent, $ancestors, $root );
    $walker = new WeDocs_Walker_Docs();
    $children = wp_list_pages( array(
        'title_li'  => '',
        'order'     => 'menu_order',
        'child_of'  => $parent,
        'echo'      => false,
        'post_type' => 'docs',
        'walker'    => $walker
    ) );
    ?>

    <h3 class="widget-title"><?php echo get_post_field( 'post_title', $parent, 'display' ); ?></h3>

    <?php if ($children) { ?>
        <ul class="doc-nav-list">
            <?php echo $children; ?>
        </ul>
    <?php } ?>
</div>