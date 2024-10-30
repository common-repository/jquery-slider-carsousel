<?php

/**
	* Plugin Name: jQuery Slider Carousel
	* Plugin URI: http://www.indrajeet.pixub.com/
	* Description:  This plugin creates a Slideshow/Slider with post thumbnails in your posts configured for a particular category of your wordpress. WordPress plugin develop by Indrajeet Pal 
	* Version: 1.0
	* Author: Indrajeet Pal
	* Author URI: http://www.indrajeet.pixub.com/
	* License: GPL2
*/

function wp_scripts_with_jquery(){

wp_register_script( 'custom-script1', plugins_url( '/js/jquery.cycle.all.js', __FILE__ ), array('jquery') ); 
wp_enqueue_script( 'custom-script1' );  

wp_register_script( 'custom-script', plugins_url( '/js/slider-script.js', __FILE__ ), array() ); 
wp_enqueue_script( 'custom-script' );  

wp_register_style( 'custom-style', plugins_url( '/css/slider-style.css', __FILE__ ), array(), '20130906', 'all' ); 
wp_enqueue_style( 'custom-style' );

}
add_action( 'wp_enqueue_scripts','wp_scripts_with_jquery' ); 

function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).'...';
} else {
$excerpt = implode(" ",$excerpt);
}	
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
return $excerpt;
}
 
function slider_fnc($post_ID){
?>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery('.slideshow').cycle({
		fx: '<?php echo get_option('jsc_effect'); ?>' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
	});
</script>  

<div id="banner">
<?php
global $post;
$i=1;
$category=get_option('jsc_category');
$args = array( 'posts_per_page' => 4, 'category'=> $category);
$myposts = get_posts( $args );?>
<div class="slideshow">
<?php
foreach ( $myposts as $post ) : 
  setup_postdata( $post ); 
  
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('full');
}

endforeach;
wp_reset_postdata(); ?>
</div>
<?php
foreach ( $myposts as $post ) : 
  setup_postdata( $post ); 
?>

<div class="box<?php echo $i; ?>">
<div class="title"><?php the_title(); ?></div>
<div class="image">
<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  set_post_thumbnail_size(250,101);
  the_post_thumbnail();
  set_post_thumbnail_size('full');
} ?>
</div>
<div class="description"><?php echo excerpt(40); ?>
</div>
<div class="more"><a href="<?php the_permalink(); ?>">Click to know more</a></div>
</div>
<?php 
$i++;
endforeach;
wp_reset_postdata(); ?>
</div>
<?php
echo '<div class="slidershadow"><img src="' . plugins_url( 'images/banner_shadow.gif' , __FILE__ ) . '" ></div> ';
?>

<?php

return $post_ID;
}
    add_shortcode('ip-slider', 'slider_fnc');  
	add_action('admin_init', 'jsc_reg_function' );

	function jquery_slider_menu(){
     add_options_page('jQuery Slider Carousel Options', 'jQuery Slider Carousel', 'manage_options', 'jquery-slider-menu', 'jsc_menu_function');
	 }
	add_action('admin_menu','jquery_slider_menu');
	
//create group of variables
	function jsc_reg_function() {
	register_setting( 'jsc-settings-group', 'jsc_category' );
	register_setting( 'jsc-settings-group', 'jsc_effect' );
	}

//add default value to variables
	function jsc_activate() {
	add_option('jsc_category','1');
	add_option('jsc_effect','fade');
	}

	function jsc_menu_function() {
?>

<div class="wrap">
<h2>jQuery Slider Carousel</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'jsc-settings-group' ); ?>
    <table class="form-table">

        <tr valign="top">
        <th scope="row">Category</th>
        <td>
        <select name="jsc_category" id="jsc_category">
			 <option value="">Select a Category</option>
 			<?php
 				$category = get_option('jsc_category');
  				$categories=  get_categories();
  				foreach ($categories as $cat) {
  					$option = '<option value="'.$cat->term_id.'"';
  					if ($category == $cat->term_id) $option .= ' selected="selected">';
  					else { $option .= '>'; }
					$option .= $cat->cat_name;
					$option .= ' ('.$cat->category_count.')';
					$option .= '</option>';
					echo $option;
  				}
 			?>
		</select>
        </tr>
		
		<tr valign="top">
        <th scope="row">Type of Animation</th>
        <td>
        <label>
        <?php $effect = get_option('jsc_effect'); ?>
        <select name="jsc_effect" id="jsc_effect">
        	<option value="blindX" <?php if($effect == 'blindX') echo 'selected="selected"'; ?> >blindX</option>
        	<option value="blindY" <?php if($effect == 'blindY') echo 'selected="selected"'; ?> >blindY</option>
			<option value="blindZ" <?php if($effect == 'blindZ') echo 'selected="selected"'; ?> >blindZ</option>
			<option value="cover" <?php if($effect == 'cover') echo 'selected="selected"'; ?> >cover</option>
			<option value="curtainX" <?php if($effect == 'curtainX') echo 'selected="selected"'; ?> >curtainX</option>
			<option value="curtainY" <?php if($effect == 'curtainY') echo 'selected="selected"'; ?> >curtainY</option>
			<option value="fade" <?php if($effect == 'fade') echo 'selected="selected"'; ?> >fade</option>
			<option value="fadeZoom" <?php if($effect == 'fadeZoom') echo 'selected="selected"'; ?> >fadeZoom</option>
			<option value="growX" <?php if($effect == 'growX') echo 'selected="selected"'; ?> >growX</option>
			<option value="none" <?php if($effect == 'none') echo 'selected="selected"'; ?> >none</option>
			<option value="scrollUp" <?php if($effect == 'scrollUp') echo 'selected="selected"'; ?> >scrollUp</option>
			<option value="scrollDown" <?php if($effect == 'scrollDown') echo 'selected="selected"'; ?> >scrollDown</option>
			<option value="scrollLeft" <?php if($effect == 'scrollLeft') echo 'selected="selected"'; ?> >scrollLeft</option>
			<option value="scrollRight" <?php if($effect == 'scrollRight') echo 'selected="selected"'; ?> >scrollRight</option>
			<option value="scrollHorz" <?php if($effect == 'scrollHorz') echo 'selected="selected"'; ?> >scrollHorz</option>
			<option value="scrollVert" <?php if($effect == 'scrollVert') echo 'selected="selected"'; ?> >scrollVert</option>
			<option value="shuffle" <?php if($effect == 'shuffle') echo 'selected="selected"'; ?> >shuffle</option>
			<option value="slideX" <?php if($effect == 'slideX') echo 'selected="selected"'; ?> >slideX</option>
			<option value="slideY" <?php if($effect == 'slideY') echo 'selected="selected"'; ?> >slideY</option>
			<option value="toss" <?php if($effect == 'toss') echo 'selected="selected"'; ?> >toss</option>
			<option value="turnUp" <?php if($effect == 'turnUp') echo 'selected="selected"'; ?> >turnUp</option>
			<option value="turnDown" <?php if($effect == 'turnDown') echo 'selected="selected"'; ?> >turnDown</option>
			<option value="turnLeft" <?php if($effect == 'turnLeft') echo 'selected="selected"'; ?> >turnLeft</option>
			<option value="turnRight" <?php if($effect == 'turnRight') echo 'selected="selected"'; ?> >turnRight</option>
			<option value="uncover" <?php if($effect == 'uncover') echo 'selected="selected"'; ?> >uncover</option>
			<option value="wipe" <?php if($effect == 'wipe') echo 'selected="selected"'; ?> >wipe</option>
			<option value="zoom" <?php if($effect == 'zoom') echo 'selected="selected"'; ?> >zoom</option>
        </select>
        </label>
        </tr>
    	</table>

    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>

<?php } ?>