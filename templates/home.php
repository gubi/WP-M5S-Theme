<?php
/*
Template Name: Home page
*/

function get_tab_content_by_tag($category_id, $tag) {
    $tag_content = get_posts(array(
        "posts_per_page"   => 3,
        "offset"           => 0,
        "category"         => $category_id,
        "orderby"          => "date",
        "order"            => "DESC",
        "post_type"        => "post",
        "tax_query" => array(
            array(
                "taxonomy" => "post_tag",
                "field" => "slug",
                "terms" => $tag
            )
        )
    ));
    foreach($tag_content as $k => $v) {
        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($v->ID) );
        ?>
        <li>
            <a href="<?php print get_permalink($v->ID);?>">
                <img src="<?php print $feat_image; ?>" />
                <span><?php print $v->post_title; ?></span>
                <small><?php print $v->post_excerpt; ?></small>
            </a>
        </li>
        <?php
    };
}
function get_icon($tag) {
    $o = new stdClass();
    switch($tag) {
        case "Esposto":
            $o->icon = "!";
            $o->class = "complaint";
            break;
        case "Mozione":
            $o->icon = "M";
            $o->class = "motion";
    }
    return $o;
}

$config = get_config();
get_header();

?>

<section id="last_news">
    <div class="container">
        <div class="row">
            <!-- Latest news -->
            <div class="col-lg-8 col-md-7 col-sm-6 col-xs-12">
                <!-- Menu -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#altre_notizie" aria-controls="altre_notizie" role="tab" data-toggle="tab"><?php print __("Altre notizie", "m5s"); ?></a>
                    </li>
                    <li role="presentation">
                        <a href="#nazionale" aria-controls="nazionale" role="tab" data-toggle="tab"><?php print __("Nazionale", "m5s"); ?></a>
                    </li>
                    <li role="presentation">
                        <a href="#regione_lazio" aria-controls="regione_lazio" role="tab" data-toggle="tab"><?php print __("Regione Lazio", "m5s"); ?></a>
                    </li>
                </ul>
                <!-- Contenuti -->
                <div class="tab-content">
                    <!-- Altre notizie -->
                    <ul role="tabpanel" class="list-inline tab-pane active text-center" id="altre_notizie">
                        <?php
                        get_tab_content_by_tag(7, "altre notizie");
                        ?>
                    </ul>
                    <!-- Nazionale -->
                    <ul role="tabpanel" class="list-inline tab-pane" id="nazionale">
                        <?php
                        get_tab_content_by_tag(16, "altre notizie");
                        ?>
                    </ul>
                    <!-- Regione Lazio -->
                    <ul role="tabpanel" class="list-inline tab-pane" id="regione_lazio">
                        <?php
                        get_tab_content_by_tag(17, "altre notizie");
                        ?>
                    </ul>
                </div>
            </div>
            <!-- Ultimi atti -->
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 text-right">
                <!-- Menu -->
                <ul class="nav nav-pills nav-justified" role="menu">
                    <li role="presentation" class="active">
                        <span><?php print __("Ultimi atti presentati", "m5s"); ?></span>
                    </li>
                    <li>
                        <a href="javascript:;" role="tab" data-toggle="tab"><?php print __("elenco completo", "m5s"); ?></a>
                    </li>
                </ul>
                <!-- Contenuti -->
                <div class="tab-content">
                    <!-- <ul role="tabpanel" class="" id="ultimi_atti"> -->
                    <div id="ultimi_atti">
                        <?php
                        $ultimi_atti = get_posts(array(
                            "posts_per_page"   => 3,
                            "offset"           => 0,
                            "category"         => 6, // "Atti" ID
                            "orderby"          => "date",
                            "order"            => "DESC",
                            "post_type"        => "post"
                        ));
                        foreach($ultimi_atti as $k => $v) {
                            $tag = ucfirst(wp_get_post_tags($v->ID)[0]->name);
                            $title = $v->post_title;
                            $excerpt = $v->post_excerpt;
                            $icon = get_icon($tag);
                            ?>
                            <div class="media">
                                <div class="media-left <?php print $icon->class; ?>">
                                    <span><?php print $icon->icon; ?></span>
                                    <span><?php print $tag; ?></span>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a class="media-heading" href="<?php print get_permalink($v->ID);?>">
                                            <?php print $v->post_title; ?>
                                        </a>
                                    </h4>
                                    <p><?php print $v->post_excerpt; ?></p>
                                    </a>
                                </div>
                            </div>
                            <?php
                        };
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid" id="container_main">
	<div class="row">
        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <!-- Main content -->
                                <div class="column col-lg-8 col-md-7 col-sm-12 col-xs-12">
                                    <?php
                                    $in_rilievo = get_posts(array(
                                    	"posts_per_page"   => 3,
                                    	"offset"           => 0,
                                    	"category"         => 11, // "In rilievo" ID
                                    	"orderby"          => "date",
                                    	"order"            => "DESC",
                                    	"post_type"        => "post",
                                    ));
                                    foreach($in_rilievo as $k => $v) {
                                        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($v->ID) );
                                        ?>
                                        <article>
                                            <head>
                                                <img class="img-responsive" src="<?php print $feat_image; ?>" />
                                                <span class="date">
                                                    <?php
                                                    $mesi = array(1 => "gennaio", "febbraio", "marzo", "aprile", "maggio", "giugno", "luglio", "agosto", "settembre", "ottobre", "novembre", "dicembre");
                                                    $mese = $mesi[date("n", strtotime($v->post_date))];
                                                    ?>
                                                    <h1><?php print date("d", strtotime($v->post_date)); ?></h1>
                                                    <span><?php print $mese ;?></span>
                                                    <span><?php print date("Y", strtotime($v->post_date)); ?></span>
                                                </span>
                                                <div class="tags">
                                                    <?php
                                                    foreach(wp_get_post_tags($v->ID) as $k => $tag) {
                                                        $tags_arr[] = $tag->name;
                                                        ?>
                                                        <span class="tag visible-lg"><?php print $tag->name; ?></span>
                                                        <?php
                                                    }
                                                    ?>
                                                    <span class="tag hidden-lg"><?php print implode(", ", $tags_arr); ?></span>
                                                </div>
                                            </head>
                                            <div class="content">
                                                <h1><?php print $v->post_title; ?></h1>
                                                <p><?php print $v->post_excerpt; ?></p>
                                                <a href="<?php print get_permalink($v->ID);?>">Leggi &rsaquo;</a>
                                                <div class="share_icons"><?php echo do_shortcode('[ssba url="' . get_permalink($v->ID) . '"]'); ?></div>
                                            </div>
                                        </li>
                                        <?php
                                    };
                                    ?>
                                </div>

                                <!-- Notizie dalla stampa -->
                                <!-- <div class="column col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                </div> -->

                                <!-- Widget -->
                                <div class="column col-lg-4 col-md-5 col-sm-12 col-xs-12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
        <?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
