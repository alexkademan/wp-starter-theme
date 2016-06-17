
<nav id="site-nav" class="site-nav">
  <ul id="mainNav" class="mainNav">
  <?php foreach($GLOBALS['this_site']['navigation']->full as $key1=>$item) { ?>
  	<li><a href="<?php echo $item['permalink'] ?>"><?php echo $item['title'] ?></a>
      <?php
        // if(isset($item['children'])) { get_template_part( 'template-parts/content', 'main-nav-children' ); }
      ?>
  	</li>

  <?php } ?>

  </ul>
</nav>
