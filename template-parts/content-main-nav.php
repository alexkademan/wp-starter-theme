
<nav id="site-nav" class="site-nav">
  <span>
  <ul class="mainNav">
    <hr />
    <?php
    foreach($GLOBALS['this_site']['navigation'] as $key1=>$item) {
      echo '<li><a href="' . $item['permalink'] . '">' . $item['title'] . '</a></li>';
    }
    ?>
  </ul>
  <ul class="subNav">
    <?php
    if(isset($GLOBALS['this_site']['sub_navigation'])) {
      foreach($GLOBALS['this_site']['sub_navigation'] as $key1=>$item) {
        echo '<li><a href="' . $item['permalink'] . '">' . $item['title'] . '</a></li>';
      }
    }
    ?>
  </ul>
  </span>
</nav>
