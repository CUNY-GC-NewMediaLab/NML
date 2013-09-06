<?php
/*
Template Name Posts: Projects Landing Page: Custom Post Types
*/
?>
<?php 
wp_enqueue_script('qt', $themedir . '/js/jquery.qtip.custom/jquery.qtip.min.js', array('jq'), '1.5', true);
wp_enqueue_style('qt', $themedir . '/js/jquery.qtip.custom/jquery.qtip.min.css');

get_header() ?>
<?php 
$themedir = get_template_directory_uri();
//wp_enqueue_script('rolloveractuals', $themedir . '/js/rollovers_projects.js');
?>

	<div id="container">
		<div id="blogcontent">

<?php the_post() ?>
			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content projects-landing-page">
<?php the_content() ?>

<h2>Current Projects</h2>
    <?php $pages	=	get_pages("child_of=503"); 
    echo '<ul class="qt">';
	foreach ($pages as $pagg) {
  		$option = '<li><a href="'.get_page_link($pagg->ID).'" class="'. $pagg->ID .'">' . $pagg->post_title . '</a>';
  		$studentname	=	get_post_meta($pagg->ID, 'studentname ', false);
  		$simage	=	get_post_meta($pagg->ID, 'icon-rollover', false);
		$rdesc	=	get_post_meta($pagg->ID, 'rollover description', false);
		$depo	=	get_post_meta($pagg->ID, 'department', false);
		$gdesc	=	strip_tags($rdesc[0]);
  		$option .= '<div style="display:none">';	
  		$option .=  '<a href="' .get_page_link($pagg->ID)   .  '"><img src="' . $simage[0] . '"></a>';
  		$option .= '<p class="proj-desc">'. $rdesc[0] .'</p><p class="proj-auth">'. $studentname[0] . ", " . $depo[0] ;
  		$option .= '</p></div>';
  		$option .= '</li>'; 
		echo $option;	
 	}
 	echo "</ul>";
 ?>
<div class="projectborder">
<h2>Previous Projects</h2>
     <?php $pages	=	get_pages("child_of=505"); 
    echo '<ul class="qt">';
	foreach ($pages as $pagg) {
  		$option = '<li><a href="'.get_page_link($pagg->ID).'" class="'. $pagg->ID .'">' . $pagg->post_title . '</a>';
  		$studentname	=	get_post_meta($pagg->ID, 'studentname ', false);
  		$simage	=	get_post_meta($pagg->ID, 'icon-rollover', false);
		$rdesc	=	get_post_meta($pagg->ID, 'rollover description', false);
		$depo	=	get_post_meta($pagg->ID, 'department', false);
		$gdesc	=	strip_tags($rdesc[0]);
  		$option .= '<div style="display:none">';	
  		$option .=  '<a href="' .get_page_link($pagg->ID)   .  '"><img src="' . $simage[0] . '"></a>';
  		$option .= '<p class="proj-desc">'. $rdesc[0] .'</p><p class="proj-auth">'. $studentname[0] . ", " . $depo[0] ;
  		$option .= '</p></div>';
  		$option .= '</li>'; 
		echo $option;	
 	}
 	echo "</ul>";
 ?>
</div>
			
<?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>

				</div>
			</div><!-- .post -->
		</div><!-- #content -->
	</div><!-- #container -->

<?php get_footer() ?>