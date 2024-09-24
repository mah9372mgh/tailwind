<?php
// selected menu class
$selectedMenu = 'active';
$active = true;

// get news list
$menu = new Manipulate_Menu_Menu();

if (isset($categoryId)) {
  $categoryData = new Manipulate_Category_Category();
  $categoryMasterId = $categoryData->getCategoryData($categoryId, array('fields' => array('Category.master_id')))[0]['Category']['master_id'];
} else {
  $categoryMasterId = '';
}

$data = $menu->makeMenu(array(
  'menu_location' => MENU_LOCATION_A1,
  'max_level' => 0,
  'category_master_id' => ((isset($categoryMasterId)) ? $categoryMasterId : null),
  'fields' => array(
    'Menu.options',
    'Menu.title',
    'Menu.object_master_id',
    'Menu.menu_data',
  )
));

if (!class_exists('NavToggleUsage')) {
  class NavToggleUsage
  {
    static public $isFirst = true;
  };
}
NavToggleUsage::$isFirst = true;


$useNavToggle = false;
if ($active) :
  //Make a list from an array
  $makeList = function ($array) use (&$makeList, $categoryMasterId, $masterId, $selectedMenu) {
    $idAttr = ' class="sub_menu group/edit hidden md:absolute md:top-6 md:right-0 bg-white dark:bg-gray-700 px-4 py-4 w-40 bg-opacity-95 md:group-hover/item:inline bg-slate-200"';
    if (NavToggleUsage::$isFirst === true) {
      $idAttr = ' class="nav_toggle hidden w-full absolute md:relative z-50 bg-slate-200 md:bg-white dark:bg-gray-900 top-20 md:top-0 right-0 left-0 px-4 py-1 md:flex gap-6"';
      NavToggleUsage::$isFirst = false;
    }
    //Base case: an empty array produces no list
    if (empty($array)) {
      return '';
    }
?>
    <ul<?php echo $idAttr; ?> itemscope="" itemtype="http://schema.org/SiteNavigationElement">
      <?php
      foreach ($array as $subArray) :
        if (isset($masterId) && ($subArray['object_master_id'] == $masterId)) {
          $subArray['htmlclass'] .= $selectedMenu;
        } elseif ($subArray['menu_data']['menu_type'] == MENU_TYPE_CATEGORY && isset($categoryMasterId) && $subArray['object_master_id'] == $categoryMasterId) {
          $subArray['htmlclass'] .= $selectedMenu;
        } elseif ($subArray['menu_data']['menu_type'] == MENU_TYPE_HOME_PAGE && $this->here == '/') {
          $subArray['htmlclass'] .= $selectedMenu;
        }
      ?>
        <li <?php echo ((isset($subArray['htmlclass'])) ? "class='{$subArray['htmlclass']}'" : 'class="group/item relative"'); ?>>
          <?php if (!empty($subArray['link'])) : ?>
            <a class="dark:text-white hover:text-orange-300 duration-300" href="<?php echo $subArray['link']; ?>" title="<?php echo $subArray['title']; ?>">
              <?php echo $subArray['title']; ?>
            </a>
          <?php else : ?>
            <span class="dark:text-white hover:text-orange-300 duration-300">
              <?php echo $subArray['title']; ?>
            </span>
          <?php endif; ?>
          <?php if (!empty($subArray['children'])) : ?>
            <svg class="menu_icon inline" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
              <path fill="#616162" d="M12 17a1.72 1.72 0 0 1-1.33-.64l-4.21-5.1a2.1 2.1 0 0 1-.26-2.21A1.76 1.76 0 0 1 7.79 8h8.42a1.76 1.76 0 0 1 1.59 1.05a2.1 2.1 0 0 1-.26 2.21l-4.21 5.1A1.72 1.72 0 0 1 12 17" />
            </svg>
          <?php endif; ?>
          <?php $makeList($subArray['children']); ?>
        </li>
      <?php endforeach; ?>

      </ul>
    <?php } ?>
    <?php $makeList($data); ?>
  <?php endif; ?>