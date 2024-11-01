<?php
// To register my css styles
function sharing_whatsapp_css_register() {
    wp_register_style( 'prefix-style', plugins_url('css/main.css', __FILE__));
    wp_enqueue_style('prefix-style');
}
add_action('wp_enqueue_scripts','sharing_whatsapp_css_register');

// To register my js files
function sharing_whatsapp_jregister() {
	
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script('newscript',plugins_url( 'js/main.js' , __FILE__ ),array( 'jquery' ));
}
add_action('wp_enqueue_scripts','sharing_whatsapp_jregister');

//include short code file in front end and functionality
function view_sharing_whatsapp() {
    $loop = new WP_Query( array( 'post_type' => 'sharings_whatsapp', 'posts_per_page' => -1 ) ); 
?>

    <link href="<?php echo  plugins_url( 'css/normalize.min.css' , __FILE__ ); ?>" rel="stylesheet" type="text/css" />
		<div id="wrapper">
           <div class="posts">
		   <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="post">
                	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>					
				    <div class="image">	<?php  the_post_thumbnail(); ?> </div>
                	<p><?php the_content(); ?></p>
                </div>
            <?php endwhile; ?>
            </div>            
        </div>
    <script>jQuery('.posts').wsBtn();</script>   
    <?php 
    } 
?>
<?php add_shortcode('whatsapp_sharing', 'view_sharing_whatsapp'); ?>