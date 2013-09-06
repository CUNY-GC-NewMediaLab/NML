<?php
/*
This is for the custom "project" taxonomy
*/
?>
<?php
if ( 'projects' == get_post_type() && is_single('Projects')  ){
	$themedir = get_template_directory_uri();
	wp_enqueue_script('qt', $themedir . '/js/jquery.qtip.custom/jquery.qtip.min.js', array('jq'), '1.5', true);
	wp_enqueue_style('qt', $themedir . '/js/jquery.qtip.custom/jquery.qtip.min.css');
	get_header();
?>

<div id="container">
<div id="blogcontent">
<?php the_post() ?>
<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
<h2 class="entry-title">
  <?php the_title() ?>
</h2>
<div class="entry-content projects-landing-page">
<?php the_content() ?>
<h2>Current Projects</h2>
<?php 
    $args = array( 'post_type' => 'projects', 'child_of'=> 2543);
    $pages	=	get_pages($args); 
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
  <?php 
    $args = array( 'post_type' => 'projects', 'child_of'=> 2546);
    $pages	=	get_pages($args); 
    
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
<?php

} else {
/*  It's any other page, not titled "Projects"  */
 get_header() ?>
<div id="container">
  <div id="blogcontent">
    <?php the_post()  ?>
    
    <!-- this file is picked up by items in the projets custom post type -->
    <div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
      <h2 class="entry-title">
        <?php the_title() ?>
      </h2>
      <div class="entry-content">
        <h2>This is for custom post type "projects" </h2>
     
        <?php
		// we want to grab the meta fields one by one and customize their appearance....
		$theid	=	 get_the_ID(); 
		// with the id, let's instantiate individual variables for each field we're working with. 
		$startdate		=	get_post_meta($theid, 'startdate', false);
		$studentname	=	get_post_meta($theid, 'studentname ', false);
		$studentnameurl	=	get_post_meta($theid, 'studentnameurl', false);
		$studentemail	=	get_post_meta($theid, 'studentemail', false);
		$department 	=	get_post_meta($theid, 'department', false);
		$projectadvisor =	get_post_meta($theid, 'projectadvisor', false);
		
		$projectname	=	get_post_meta($theid, 'title of outside project link', false);
		$projecturl	=	get_post_meta($theid, 'offsite main project url', false);
?>
        
        <!-- chunk for displaying student's name. optional because of double-sponsored projects -->
        <?php if ($studentnameurl[0]) { ?>
        <div class="meta_section">
          <?php
        // this is the name of the student, the link to their page, and their email addy
        echo "<a href='". $studentnameurl[0] ."'>". $studentname[0] ."</a>";
		if ($department[0]) {echo ", ". $department[0] .""; ?>
          <?php }
        if($projectadvisor[0]){echo "<br />Faculty Advisor: ". $projectadvisor[0] ."";}
		?>
        </div>
        <?php
}
 
if($projectname[0]) {
?>
        <div class="meta_section"> 
          <!-- chunk for displaying student's name. optional because of double-sponsored projects -->
          
          <?php	
        //this is the link to the student's project page. 
		
        echo "Project Link: <a href='". $projecturl[0] ."'>". $projectname[0] ."</a>";
        ?>
        </div>
        <?php
}
the_content();
        }
?>
        <?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>
      </div>
    </div>
    <!-- .post --> 
  </div>
  <!-- #content --> 
</div>
<!-- #container -->

<?php get_footer(); ?>
