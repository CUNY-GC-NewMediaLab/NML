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
          <h2 class="entry-title"> Managing Director </h2>
          <ul class="people">
            <?php wp_list_pages( "depth=1&title_li=&sort_column=menu_order&child_of=507" ); // display the sub pages of the current page only ?>
          </ul>
        </div>
        <div class="projectborder">
          <h2 class="entry-title"> Project Advisors </h2>
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
          <select class="sortbyOptions" style="float:right; margin-bottom:-15px">
            <option id="byAlpha1"  value="name" >View by name
            </li>
            <option id="byDept1"  value="data-department" >View by department
            </li>
          </select>
          <h2 class="entry-title">Graduate Students and Faculty</h2>
          <ul id = "peopleList1">
            <?php
$pages = get_pages( 'echo=0&depth=1&title_li=&sort_column=menu_order&child_of=515' );
foreach ( $pages as $i=>$page ) {
	
	$departmentTaxo = wp_get_object_terms( $page->ID, 'departments' );
	if ( !empty( $departmentTaxo ) ) {
		if ( !is_wp_error( $departmentTaxo ) ) {
			$myDept =  $departmentTaxo[0] ->name ;
		}
	}
	$option = '';
	if ( !isset( $myDept ) ) {
		$x =  get_post_meta( $page->ID, 'stdepartment', false );
		wp_set_post_terms(  $page->ID, $x[0] , 'departments' );
		$myDept = $x[0] ;
	}
	$dept = ( isset( $myDept ) ) ? $myDept : '';
	$option .= '<li  class="floatme" data-department = "' . $dept . '" data-rank= "' . $i . '">';
	$option .= '<a href="' . get_page_link( $page->ID ) . '">';
	$option .= $page->post_title;
	$option .= '</a></li>';
	unset( $dept );
	unset( $myDept );
	echo $option;
}
?>
          </ul>
        </div>
        <div class="projectborder">
          <h2 class="entry-title"> Visiting Researchers </h2>
          <ul class="people">
            <?php wp_list_pages( 'depth=1&title_li=&sort_column=menu_order&child_of=2000' ); // display the sub pages of the current page only ?>
          </ul>
        </div>
        <div class="projectborder">
          <select class="sortbyOptions2" style="float:right; margin-bottom:-15px">
            <option id="byAlpha2"  value="name" >View by name
            </li>
            <option id="byDept2"  value="data-department" >View by department
            </li>
          </select>
          <h2 class="entry-title"> Past Researchers </h2>
          <ul id = "peopleList2">
            <?php
		$pages = get_pages( 'echo=0&depth=1&title_li=&sort_column=menu_order&child_of=597' );
		foreach ( $pages as $i=>$page ) {
		$departmentTaxo = wp_get_object_terms( $page->ID, 'departments' );
		if ( !empty( $departmentTaxo ) ) {
			if ( !is_wp_error( $departmentTaxo ) ) {
				$myDept =  $departmentTaxo[0] ->name ;
			}
		}
		$option = '';
		if ( !isset( $myDept ) ) {
			$x =  get_post_meta( $page->ID, 'stdepartment', false );
			wp_set_post_terms(  $page->ID, $x[0] , 'departments' );
			$myDept = $x[0] ;
		}
		$dept = ( isset( $myDept ) ) ? $myDept : '';
		$option .= '<li  class="floatme" data-department = "' . $dept . '" data-rank= "' . $i . '">';
		$option .= '<a href="' . get_page_link( $page->ID ) . '">';
		$option .= $page->post_title;
		$option .= '</a></li>';
		unset( $dept );
		unset( $myDept );
		echo $option;
		}
?>
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
