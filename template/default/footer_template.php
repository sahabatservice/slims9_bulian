<footer class="s-footer">
  <?php
  // Promoted titles
  // Only show at the homepage
  if(  !( isset($_GET['search']) || isset($_GET['title']) || isset($_GET['keywords']) || isset($_GET['p']) ) ) :
    // query top book
    $topbook = $dbs->query('SELECT biblio_id, title, image FROM biblio WHERE
        promoted=1 ORDER BY last_update LIMIT 30');
    if ($num_rows = $topbook->num_rows) :
    ?>
    <!-- Featured
    ============================================= -->
    <div class="s-feature-content animated fadeInUp delay9">
    <div class="s-feature-list">
      <ul id="topbook" class="jcarousel-skin-tango">
        <?php
          while ($book = $topbook->fetch_assoc()) :
            $title = explode(" ", $book['title']);
            if (!empty($book['image'])) : ?>
            <li class="book">
              <a href="./index.php?p=show_detail&id=<?php echo $book['biblio_id'] ?>" title="<?php echo $book['title'] ?>">
                <img src="images/docs/<?php echo $book['image'] ?>" />
              </a>
            </li>
            <?php else: ?>
            <li class="book">
              <a href="./index.php?p=show_detail&id=<?php echo $book['biblio_id'] ?>" title="<?php echo $book['title'] ?>">
                <div class="s-feature-title"><?php echo $title[0].'<br/>'.$title[1] ?><br/>...</div>
                <img src="./template/default/img/book.png" />
              </a>
            </li>
            <?php 
            endif;
          endwhile;
        ?>
      </ul>
    </div>
    </script>
    </div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="s-footer-content container">  
    <div class="row">
      <div class="col-lg-6 col-sm-2 col-xs-12">
        <div class="s-footer-tagline">
          <a href="//slims.web.id" target="_blank"><?php echo SENAYAN_VERSION; ?></a>
        </div>
      </div>
      <nav class="col-lg-6 col-sm-10 col-xs-12">
        <ul class="s-footer-menu">
          <li><a href="index.php"><?php echo __('Home'); ?></a></li>
          <li><a target="_blank" rel="archives" href="//www.facebook.com/groups/senayan.slims">Facebook</a></li>
          <li><a target="_blank" rel="archives" href="//twitter.com/#!/slims_official">Twitter</a></li>
          <li><a target="_blank" rel="archives" href="//www.youtube.com/user/senayanslims">Youtube</a></li>
          <li><a target="_blank" rel="archives" href="//github.com/slims">Github</a></li>
          <li><a target="_blank" rel="archives" href="//slims.web.id/forum">Forum</a></li>
          <li><a target="_blank" rel="archives" href="index.php?rss=true" title="RSS" class="rss" >RSS</a></li>
        </ul>
      </nav>
    </div>
  </div>
</footer>
