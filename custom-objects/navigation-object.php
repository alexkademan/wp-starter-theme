<?php

class get_main_navigation {

  function __construct( ) {
    $this->full = $this->get_full_navigation(); // find all the root pages

  }


  private function get_full_navigation( $subs = FALSE ) {
    // find all the root pages:
    $full = $this->get_pages_info();
    return $full;
    // print_r($full);
  }

  private function get_pages_info( $parent_id = 0 ) {
    // put together an array about all child pages of a specific id:
    if($parent_id == 0) {
  		$pages = get_pages('parent=0');
  	} else {
  		$pages = get_pages('child_of=' . $parent_id);
  	}


    if( count($pages) > 0 ) { // there ARE some pages so:
      for($i = 0; $i < count($pages); ++$i) { // loop thru 'em:

        if($pages[$i]->post_name != 'home'){
          $list[$i] = $this->gather_page_info($pages[$i]);
        }
      }

      if(is_array($list)) {
        ksort($list);
      }
      return $list;
    }
  }

  private function gather_page_info( $page ) {

    $this_page['ID'] = $page->ID;
    $this_page['menu_order'] = $page->menu_order;
    $this_page['title'] = $page->post_title;
    $this_page['excerpt'] = $page->post_excerpt;
    $this_page['content'] = $page->post_content;
    $this_page['permalink'] = get_permalink( $page->ID );

    // $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'medium');
    // $this_page['thumb'] = $thumb[0];

    return $this_page;
  }
}
