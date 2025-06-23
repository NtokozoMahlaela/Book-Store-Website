<?php
/*
Template Name: Classic Author Template
*/
?>

<?php get_header(); ?>

<div class="classic-template-container">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1><?php the_title(); ?></h1>
                <div class="author-bio">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Book Section -->
    <section class="featured-book">
        <div class="container">
            <h2>Featured Book</h2>
            <?php
            $featured_book = get_field('featured_book');
            if ($featured_book) :
                ?>
                <div class="featured-book-content">
                    <div class="book-image">
                        <?php echo wp_get_attachment_image($featured_book['image'], 'large'); ?>
                    </div>
                    <div class="book-details">
                        <h3><?php echo $featured_book['title']; ?></h3>
                        <p><?php echo $featured_book['excerpt']; ?></p>
                        <?php if (is_user_logged_in()) : ?>
                            <div class="book-actions">
                                <a href="<?php echo $featured_book['buy_link']; ?>" class="btn btn-primary">Buy Now</a>
                                <a href="<?php echo get_site_url(); ?>/booking/?book=<?php echo $featured_book['id']; ?>" class="btn btn-secondary">Book Meeting</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Book Categories -->
    <section class="book-categories">
        <div class="container">
            <h2>Book Categories</h2>
            <div class="category-grid">
                <?php
                $categories = get_terms(array(
                    'taxonomy' => 'book_category',
                    'hide_empty' => false,
                ));
                
                foreach ($categories as $category) :
                    ?>
                    <div class="category-item">
                        <h3><?php echo $category->name; ?></h3>
                        <div class="category-books">
                            <?php
                            $args = array(
                                'post_type' => 'book',
                                'posts_per_page' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'book_category',
                                        'field'    => 'term_id',
                                        'terms'    => $category->term_id,
                                    ),
                                ),
                            );
                            $books = new WP_Query($args);
                            
                            while ($books->have_posts()) : $books->the_post();
                                ?>
                                <div class="book-item">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="book-image">
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <h4><?php the_title(); ?></h4>
                                    <?php if (is_user_logged_in()) : ?>
                                        <div class="book-actions">
                                            <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Buy Now</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <h2>Get in Touch</h2>
            <?php if (is_user_logged_in()) : ?>
                <?php echo do_shortcode('[contact-form]'); ?>
            <?php else : ?>
                <div class="login-prompt">
                    <p>Please login to contact us</p>
                    <a href="<?php echo wp_login_url(get_permalink()); ?>" class="btn btn-primary">Login</a>
                    <a href="<?php echo wp_registration_url(); ?>" class="btn btn-secondary">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>
