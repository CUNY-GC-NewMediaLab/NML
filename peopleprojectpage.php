<?php
/*
Template Name: People Root Page
*/
?>
<?php get_header() ?>
<div id="container">
	<div id="blogcontent">
<?php the_post() ?>
		<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
			<h2 class="entry-title">
<?php the_title() ?>
			</h2>
			<div class="entry-content peoplepage">
<?php the_content() ?>
				<div class="projectborder">
					<h2 class="entry-title">
						Managing Director
					</h2>
					<ul class="people">
<?php wp_list_pages( "depth=1&title_li=&sort_column=menu_order&child_of=507" ); // display the sub pages of the current page only ?>
					</ul>
				</div>
				<div class="projectborder">
					<h2 class="entry-title">
						Project Advisors
					</h2>
					<ul class="people">
<?php wp_list_pages( "depth=1&title_li=&sort_column=menu_order&child_of=513" ); // display the sub pages of the current page only ?>
					</ul>
				</div>
				<div class="projectborder">
					<h2 class="entry-title">Co-Directors</h2>
<ul class="people">
<?php wp_list_pages( "depth=1&title_li=&sort_column=menu_order&child_of=509" ); // display the sub pages of the current page only ?>
</ul>
				</div>
				<div class="projectborder">
					<h2 class="entry-title">Graduate Students and Faculty</h2>
				
<ul class="sortbyOptions">
	<li id="byDept1" class="sort" data-sort="data-department" data-order="desc">Department</li>
	<li id="byAlpha1" class="sort active" data-sort="default" data-order="desc">Default</li>
</ul>

<ul id = "peopleList1">
<?php
$pages = get_pages( 'echo=0&depth=1&title_li=&sort_column=menu_order&child_of=515' );
$oldD = '';
foreach ( $pages as $page ) {
	// taxonomy-level department
	$stdepartmentTaxo = wp_get_object_terms( $page->ID, 'departments' );

	if ( !empty( $stdepartmentTaxo ) ) {
		if ( !is_wp_error( $stdepartmentTaxo ) ) {
			$myDept =  $stdepartmentTaxo[0] ->name ;
		}
	}
	$option = '';
	$dept = ( isset( $myDept ) ) ? $myDept : 'Cryptozoology';
	if ($oldD != $dept) {
		$option .= "<li class='headerLi' style='display:block' data-department ='" .  $dept   . "'><span>$dept</span></li>";
	}
	$option .= '<li  data-department = "' . $dept . '" >';
	$option .= '<a href="' . get_page_link( $page->ID ) . '">';
	$option .= $page->post_title;
	$option .= '</a></li>';
	$oldD = $dept;
	unset( $myDept );
	echo $option;
}
?>
 </ul>
<hr >

				<?php
$page_s = explode( "</li>", wp_list_pages( 'echo=0&depth=1&title_li=&sort_column=menu_order&child_of=515' ) );
$page_n = count( $page_s ) - 1;
$page_col = round( $page_n / 2 );
for ( $i=0;$i<$page_n;$i++ ) {
	if ( $i<$page_col ) {
		$page_left = $page_left.''.$page_s[$i].'</li>';
	} elseif ( $i>=$page_col ) {
		$page_right = $page_right.''.$page_s[$i].'</li>';
	}
}
?>
					<ul class="left people">
<?php echo $page_left; ?>
					</ul>
					<ul class="right people">
<?php echo $page_right; ?>
					</ul>
				</div>
				<div class="projectborder">
					<h2 class="entry-title">
						Visiting Researchers
					</h2>
					<ul class="people">
					<?php wp_list_pages( 'depth=1&title_li=&sort_column=menu_order&child_of=2000&link_before=<span>' . __( 'Poetry' ) . '</span>' ); // display the sub pages of the current page only ?>
					</ul>
				</div>
				<div class="projectborder">
					<h2 class="entry-title">
						Past Researchers
					</h2>
						<?php
$page_s = explode( "</li>", wp_list_pages( 'echo=0&depth=1&title_li=&sort_column=menu_order&child_of=597' ) );
$page_n = count( $page_s ) - 1;
$page_col = round( $page_n / 2 );
for ( $i=0;$i<$page_n;$i++ ) {
	if ( $i<$page_col ) {
		$page_left = $page_left.''.$page_s[$i].'</li>';
	} elseif ( $i>=$page_col ) {
		$page_right = $page_right.''.$page_s[$i].'</li>';
	}
}
?>
					<ul class="left people">
<?php echo $page_left; ?>
					</ul>
					<ul class="right people">
<?php echo $page_right; ?>
					</ul>


	</div>
	<h2 class="entry-title">&nbsp;</h2>
<?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>
			</div>
		</div>
<!-- .post -->
	</div>
<!-- #content -->
</div>
<!-- #container -->


<?php get_footer() ?>
