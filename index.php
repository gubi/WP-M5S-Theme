<?php
// ini_set( 'display_errors', 0 );
// config();
get_header();
?>


<?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php the_title('<h1>', '</h1>'); ?>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
<?php endif; ?>

<?php get_footer(); ?>
