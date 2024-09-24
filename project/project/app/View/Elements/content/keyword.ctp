<?php if (!empty($keywordsLink)) : ?>
  <div class="article_tag noprint">
    <ul class="tag_list">
      <?php
      foreach ($keywordsLink as $keyWord) :
        if (!empty($keyWord['url'])) {
          $url = $keyWord['url'];
        } else {
          $url = sprintf('/tags/%s', urlencode2($keyWord['tag']));
        }
      ?>
        <li class="tag_item">
          <a href="<?php echo $url ?>" title="<?php echo h($tag); ?>">
            <?php echo h($keyWord['tag']); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php elseif (!empty($keywords)) : ?>
  <div class="article_tag noprint">
    <ul class="tag_list">
      <?php
      $tags = array_map('trim', explode(",", $keywords));
      foreach ($tags as $tag) :
      ?>
        <li class="tag_item">
          <a href="<?php echo sprintf('/tags/%s', urlencode2($tag)); ?>" title="<?php echo h($tag); ?>">
            <?php echo h($tag); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
