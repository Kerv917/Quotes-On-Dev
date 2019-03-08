<?php /* 
 * The template for displaying Archives Page.
 *
 * @package QOD_Starter_Theme
 */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <h1><?php the_title() ?></h1>

            <section>
                
                <!-- Display Author links to show archive of single post by 
                author with 'Show me another' button -->

                <!-- Authors -->
                <div><h2>Quote Authors</h2></div>
                <ul>
                <?php 
                    // get_posts() with posts_per_page as arg
                    $posts = get_posts('posts_per_page=-1');
                    // foreach and setup_postdata
                    foreach( $posts as $post ) : setup_postdata( $post );  ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                        
                        
                    <?php endforeach;
                    ?>
                    </ul>
                    
            </section>

            <section>
                
                <!-- Displayed Category links to show archive of posts of this 
                category -->

                <!-- Categories -->
                <div><h2>Categories</h2>
                <?php wp_tag_cloud( array('taxonomy' => 'category', 'smallest'=> 14, 'largest'=> 14 )); ?>
                <?php 
                    // Used WordPress method to list my categories
                    // Does not need a loop
                ?>
                </div>
            </section>
                <!-- Tags -->
            <section>
                
                <div><h2>Tags</h2></div> <!-- Display Tags links to show archive of posts of this tag -->
                <?php 
                    // Used a WordPress method to show a tag cloud
                    // Does not need a loop
                wp_tag_cloud( array('smallest'=> 14, 'largest'=> 14));
                ?>
            </section>

        </main><!-- #main --> 
    </div><!-- #primary -->

<?php get_footer(); ?>