<?php
/*
Template Name: Modern Author Template
*/
?>

<?php get_header(); ?>

<div class="template-container">
    <!-- Content Overview Section -->
    <section class="content-overview">
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <div class="overview-content">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <!-- Book Showcase Section -->
    <section class="book-showcase">
        <div class="container">
            <h2>Our Books</h2>
            <div class="book-grid">
                <?php
                $args = array(
                    'post_type' => 'book',
                    'posts_per_page' => -1
                );
                $books = new WP_Query($args);
                
                if ($books->have_posts()) :
                    while ($books->have_posts()) : $books->the_post();
                        ?>
                        <div class="book-item">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="book-image">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                            <div class="book-description">
                                <?php echo get_the_excerpt(); ?>
                            </div>
                            <?php if (is_user_logged_in()) : ?>
                                <div class="book-actions">
                                    <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Buy Now</a>
                                    <a href="<?php echo get_site_url(); ?>/booking/?book=<?php echo get_the_ID(); ?>" class="btn btn-secondary">Book Meeting</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section class="booking-section">
        <div class="container">
            <h2>Book a Meeting</h2>
            <?php if (is_user_logged_in()) : ?>
                <?php echo do_shortcode('[booking-form]'); ?>
            <?php else : ?>
                <div class="login-prompt">
                    <p>Please login to book a meeting</p>
                    <a href="<?php echo wp_login_url(get_permalink()); ?>" class="btn btn-primary">Login</a>
                    <a href="<?php echo wp_registration_url(); ?>" class="btn btn-secondary">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>
