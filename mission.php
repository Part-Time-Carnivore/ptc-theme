<?php
?>


<div id="meatmenu" class="footer-widgets">
<div class="wrap">
  <div class="meat mission">
    <ul>
        <?php if ( ! dynamic_sidebar( 'Mission 1' ) ) : ?>
        <?php endif; // end sidebar widget area ?>
    </ul>
  </div><div class="meat mission">
    <ul>
        <?php if ( ! dynamic_sidebar( 'Mission 2' ) ) : ?>
        <?php endif; // end sidebar widget area ?>
    </ul>
  </div><div class="meat mission">
    <ul>
        <?php if ( ! dynamic_sidebar( 'Mission 3' ) ) : ?>
        <?php endif; // end sidebar widget area ?>
    </ul>
</div><!--end div .wrap-->
</div><!--end div #meatmenu-->
</div><!--end div .site-inner-->