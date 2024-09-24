
<?php if (isset($news['comments']) && $news['comments'] > 0) : ?>

  <!-- Comment list container -->
  <ul id="comment_list_ajax">
    <!-- Comment list items will be rendered here -->
  </ul>

  <!-- Load more button -->
  <button id="load_more_comment">مشاهده نظرات</button>

  <script>
    var news_id = <?php echo ($news['id']); ?>;
    var news_comment = <?php echo ($news['comments']); ?>;
  </script>

<?php endif; ?>