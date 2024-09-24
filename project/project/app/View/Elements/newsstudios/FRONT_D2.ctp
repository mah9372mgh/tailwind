<?php
// get current element name
$elementName = basename(__FILE__, '.ctp');
// get element data
require XCMS_PATH . '/core-common/app/View/Elements/includes/element_data.php';
?>
<?php if ($active) : ?>
  <?php if (!empty($data)) : ?>
    <?php if ($tab) : ?>
      <li class="px-2 py-0.5 dark:text-white">
        <button name="button" type="button">
          <?php echo h($element['title']); ?>
        </button>
      </li>
    <?php else : ?>
      <ul class="tab_content hidden p-3.5 border border-cyan-600">
        <?php foreach ($data as $key => $news) : ?>
          <li class="mb-2">
            <span class="text-teal-950 dark:text-white">
              <?php echo ($key + 1); ?>.
            </span>
            <a class="text-teal-950 dark:text-white" href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']) ?>">
              <?php echo h($news['title']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>