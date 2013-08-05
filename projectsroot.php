<?php
/*
Template Name: Projects Root Page
*/
?>
<?php get_header() ?>
<?php 
$themedir = get_template_directory_uri();
//wp_enqueue_script('rolloveractuals', $themedir . '/js/rollovers_projects.js');
?>

	<div id="container">
		<div id="blogcontent">

<?php the_post() ?>
			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content">
<?php the_content() ?>



<h2>Current Projects</h2>
    <?php $pages	=	get_pages("child_of=503"); 
	foreach ($pages as $pagg) {
  		$option = '
			<li>
				<a href=\''.get_page_link($pagg->ID).'\' class=\''. $pagg->ID .'\'>'; 
				echo $option .= $pagg->post_title;
		echo '	</a>
		</li>';
	//echo $option;
	$studentname	=	get_post_meta($pagg->ID, 'studentname ', false);
	//echo "<span class=\"studname\">". $studentname[0] ."</span>";
 }?>



 <?php $pages	=	get_pages("child_of=503"); 
	foreach ($pages as $pagg) {
		$simage	=	get_post_meta($pagg->ID, 'icon-rollover', false);
		$rdesc	=	get_post_meta($pagg->ID, 'rollover description', false);
		$soma	=	get_post_meta($pagg->ID, 'studentname ', false);
		$depo	=	get_post_meta($pagg->ID, 'department', false);
		$gdesc	=	strip_tags($rdesc[0]);
		echo "<div id=\"". $pagg->ID ."\" class=\"hide\" style=\"	position: absolute; 
	left:47.4em;
	top: 27em;
	width: 27em;\">
		<img src=\"". $simage[0] ."\"style=\"float:left; padding: .5em;\">
		". $rdesc[0] ."<p>". $soma[0] .", ". $depo[0] ."</p></div>";
 }?>
 

<div class="projectborder">

<h2>Previous Projects</h2>
    <?php $pages	=	get_pages("child_of=505"); 
	foreach ($pages as $pagg) {
  		$option = '
			<li>
				<a href=\''.get_page_link($pagg->ID).'\' class=\''. $pagg->ID .'\'>'; 
				echo $option .= $pagg->post_title;
		echo '	</a>
		</li>';
	//echo $option;
	$studentname	=	get_post_meta($pagg->ID, 'studentname ', false);
	//echo "<span class=\"studname\">". $studentname[0] ."</span>";
 }?>

 <?php $pages	=	get_pages("child_of=505"); 
	foreach ($pages as $pagg) {
		$simage	=	get_post_meta($pagg->ID, 'icon-rollover', false);
		$rdesc	=	get_post_meta($pagg->ID, 'rollover description', false);
				$soma	=	get_post_meta($pagg->ID, 'studentname ', false);
		$depo	=	get_post_meta($pagg->ID, 'department', false);
		$gdesc	=	strip_tags($rdesc[0]);
		echo "<div id=\"". $pagg->ID ."\" class=\"hide\" style=\"position: absolute; 
	left:47.4em;
	top: 65em;
	width: 27em;\"><img src=\"". $simage[0] ."\"style=\"float:left; padding: .5em;\">". $rdesc[0] ."<p>". $soma[0] .", ". $depo[0] ."</p></div>";
 }?>
 

</div>
			
<?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>

				</div>
			</div><!-- .post -->
		</div><!-- #content -->
	</div><!-- #container -->

<?php get_footer() ?>