<?php

// get current element name
$elementName = basename(__FILE__, '.ctp');

// get element data
require XCMS_PATH . '/core-common/app/View/Elements/includes/element_data.php';
?>
<?php if ($active) : ?>
  <div class="primary_multi_tab" data-element-name="<?php echo $elementName; ?>">
    <!-- tab title -->
    <ul id="tabs_title" class="flex gap-3">
      <?php echo $this->element('newsstudios/FRONT_D1', array('tab' => true)); ?>
      <?php echo $this->element('newsstudios/FRONT_D2', array('tab' => true)); ?>
    </ul>
    <!-- tab content -->
    <div id="tab_content_cnt">
      <?php echo $this->element('newsstudios/FRONT_D1', array('tab' => false)); ?>
      <?php echo $this->element('newsstudios/FRONT_D2', array('tab' => false)); ?>
    </div>
  </div>

<?php endif; ?>