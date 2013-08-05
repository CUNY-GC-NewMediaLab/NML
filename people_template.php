<?php
/*
Template Name: People PageTemplate
*/
?>
<?php get_header() ?>

	<p>&nbsp;</p>
	<div id="container">
		<div id="blogcontent">

<?php the_post() ?>


			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
            
<?php
// we want to grab the meta fields one by one and customize their appearance....
$theid	=	 get_the_ID(); 
// with the id, let's instantiate individual variables for each field we're working with. 
$startdate		=	get_post_meta($theid, 'people-datestarted', false);
$studentname	=	get_post_meta($theid, 'studentname ', false);
$studentnameurl	=	get_post_meta($theid, 'studentnameurl', false);
$email	=	get_post_meta($theid, 'people-email', false);
$department 	=	get_post_meta($theid, 'department', false);
$studentfaculty	=	get_post_meta($theid, 'studentfaculty', false);
//information on project
$pprojectname	=	get_post_meta($theid, 'people-projectitle', false);
$pprojecturl	=	get_post_meta($theid, 'people-projectlink', false);
$stdepartment	=	get_post_meta($theid, 'stdepartment', false);

//optional fields
$linkedin		=	get_post_meta($theid, 'people-linkedin', false);
$twitter		=	get_post_meta($theid, 'people-twitter', false);
$commons 	=	get_post_meta($theid, 'people-commons', false);
?>
<?php
$projectname	=	get_post_meta($theid, 'title of outside project link', false);
$projecturl	=	get_post_meta($theid, 'offsite main project url', false);
?>


<h2 class="entry-title">
	<?php the_title() ?>
    <span style="font-weight: lighter; color: #999; size: 85%; text-transform: capitalize;">		
 	<?php if($stdepartment[0]){ echo " / ". $stdepartment[0] ."";	}		?>   
    </span>
</h2>
	
<div class="entry-content">
  <?php if($studentfaculty[0]){ echo "". $studentfaculty[0] ."";	}
  ?>
  <div class="emaillink">	   
  <?php  
  echo "Email: <a href='mailto:". $email[0] ."' style='text-decoration:none;'><img src='http://lw4.gc.cuny.edu/nml/images/email.png' style='vertical-align:top;'> $email[0]</a>";         
  ?>
  </div>
<?php the_content() ?>
    <div class="meta_section">
		<?php
		if($pprojecturl[0])
			{
			//this is the link to the student's project page. 
			echo "<a href='". $pprojecturl[0] ."'>". $pprojectname[0] ."</a>";
			}
	   ?>
    </div>
<div class="meta_section">
    <div class="networking_badge">
    	<?php
			if($startdate[0])
				{
				echo " <em>[". $startdate[0] ."]</em>"; 
                }
		?>
        <?php
        if($linkedin[0]){echo  "<a href='". $linkedin[0] ."'><img src='http://lw4.gc.cuny.edu/nml/images/linkedin.png'></a>"; }
        if($twitter[0]){  echo "<a href='http://twitter.com/". $twitter[0] ."'><img src='http://lw4.gc.cuny.edu/nml/images/twitter.png'></a>";  }
        if($commons[0]){ echo  "<a href='". $commons[0] ."'><img src='http://lw4.gc.cuny.edu/nml/images/commons.png'></a>"; }
        ?>
    </div>
</div>

	
<?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>

				</div>
			</div><!-- .post -->
		</div><!-- #content -->
	</div><!-- #container -->

<?php get_footer() ?>