<?php
/*
Template Name: Interactive Author Template
*/
?>

<?php get_header(); ?>

<div class="interactive-template-container">
    <!-- Interactive Hero Section -->
    <section class="interactive-hero">
        <div class="container">
            <div class="hero-content">
                <h1><?php the_title(); ?></h1>
                <div class="author-bio">
                    <?php the_content(); ?>
                </div>
                <?php if (is_user_logged_in()) : ?>
                    <div class="action-buttons">
                        <a href="<?php echo get_site_url(); ?>/booking" class="btn btn-primary">Book a Meeting</a>
                        <a href="<?php echo get_site_url(); ?>/books/new" class="btn btn-secondary">New Releases</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Interactive Book Grid -->
    <section class="interactive-book-grid">
        <div class="container">
            <h2>Explore Our Books</h2>
            <div class="book-filters">
                <select id="book-category-filter">
                    <option value="">All Categories</option>
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'book_category',
                        'hide_empty' => false,
                    ));
                    foreach ($categories as $category) :
                        ?>
                        <option value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
                <select id="book-price-filter">
                    <option value="">Price Range</option>
                    <option value="low">$0 - $20</option>
                    <option value="medium">$20 - $50</option>
                    <option value="high">$50+</option>
                </select>
            </div>
            
            <div class="book-grid" id="filtered-books">
                <?php
                $args = array(
                    'post_type' => 'book',
                    'posts_per_page' => -1
                );
                $books = new WP_Query($args);
                
                if ($books->have_posts()) :
                    while ($books->have_posts()) : $books->the_post();
                        ?>
                        <div class="book-card">
                            <div class="book-image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                            <div class="book-info">
                                <h3><?php the_title(); ?></h3>
                                <p class="book-category"><?php echo get_the_term_list(get_the_ID(), 'book_category', '', ', '); ?></p>
                                <p class="book-price"><?php echo get_field('price'); ?></p>
                                <?php if (is_user_logged_in()) : ?>
                                    <div class="book-actions">
                                        <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Buy Now</a>
                                        <a href="<?php echo get_site_url(); ?>/booking/?book=<?php echo get_the_ID(); ?>" class="btn btn-secondary">Book Meeting</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section class="events-section">
        <div class="container">
            <h2>Upcoming Events</h2>
            <div class="events-grid">
                <?php
                $args = array(
                    'post_type' => 'event',
                    'posts_per_page' => 4,
                    'meta_key' => 'event_date',
                    'orderby' => 'meta_value',
                    'order' => 'ASC'
                );
                $events = new WP_Query($args);
                
                if ($events->have_posts()) :
                    while ($events->have_posts()) : $events->the_post();
                        ?>
                        <div class="event-card">
                            <div class="event-date"><?php echo get_field('event_date'); ?></div>
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo get_field('event_location'); ?></p>
                            <?php if (is_user_logged_in()) : ?>
                                <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Register</a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <h2>Stay Updated</h2>
            <?php if (is_user_logged_in()) : ?>
                <?php echo do_shortcode('[newsletter-form]'); ?>
            <?php else : ?>
                <div class="login-prompt">
                    <p>Subscribe to our newsletter for updates</p>
                    <a href="<?php echo wp_login_url(get_permalink()); ?>" class="btn btn-primary">Login</a>
                    <a href="<?php echo wp_registration_url(); ?>" class="btn btn-secondary">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>
