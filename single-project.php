<?php
/*
This is for the custom "project" taxonomy
*/
?>
<?php get_header() ?>

	<div id="container">
		<div id="blogcontent">

<?php the_post() ?>


			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content">
                
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
<?php
if ($studentnameurl[0]) {
?>
  <div class="meta_section">
		<?php
        // this is the name of the student, the link to their page, and their email addy
        echo "<a href='". $studentnameurl[0] ."'>". $studentname[0] ."</a>";
		if ($department[0]) {echo ", ". $department[0] .""; ?><?php }
        if($projectadvisor[0]){echo "<br />Faculty Advisor: ". $projectadvisor[0] ."";}
		?>
	</div>
<?php
}
?>

<?php
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
?>
 
<?php the_content() ?>
	
<?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>

				</div>
			</div><!-- .post -->
		</div><!-- #content -->
	</div><!-- #container -->

<?php get_footer() ?>