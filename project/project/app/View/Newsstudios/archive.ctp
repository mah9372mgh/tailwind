<?php
$base = array(
  'fields' => "id,title,upTitle,lead,publish_time,primaryFile",
  'primaryFile' => array(
    'w' => 192,
    'h' => 120,
  ),
  'limit' => 10,
  'leadChars' => 120,
  'dateFormat' => 'dd MMMM YYYY',
  'order' => 'order_time',
);

$request = array_merge($base, $params);
$list = new Manipulate_Newsstudio_Front_List();
$data = $list->newsList($request);
?>

<!-- PRIMARY ARCHIVE CELL -->
<section class="archive_section">
  <header class="section_header">
    <span class="box_header">
      <?php echo tra('searchResult'); ?>
      <?php echo ': ' . $this->request->query['query']; ?>
    </span>
  </header>
  <ul class="last_news_list">
    <?php foreach ($data as $news) : ?>
      <li class="list_item">
        <!-- RIGHT SERVICE -->
        <a class="res" title="<?php echo h($news['title']); ?>" href="<?php echo $news['url'] ?>" itemprop="url">
          <?php if (isset($news['primaryFile']['picture'])) : ?>
            <img loading="lazy" src="<?php echo $news['primaryFile']['picture'] ?>" height="150" width="200" alt="<?php echo h($news['title']) ?>" itemprop="image"/>
          <?php else : ?>
            <img loading="lazy" src="<?php echo '/images/default.webp'; ?>" height="150" width="200" alt="<?php echo h($news['title']) ?>" itemprop="image" />
          <?php endif; ?>
        </a>
        <!-- END OF RIGHT SERVICE -->
        <!-- LEFT SERVICE -->
        <div class="content">
          <!-- UPTITLE -->
          <?php if (!empty($news['upTitle'])) : ?>
            <div class="up_title" itemprop="headLine">
              <?php echo h(Core_Text::persianFixNumber($news['upTitle'])); ?>
            </div>
          <?php endif; ?>
          <!-- END OF UPTITLE -->
          <!-- TITLE -->
          <div class="title" itemprop="alternativeHeadline">
            <a href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']); ?>" itemprop="url">
              <?php echo h(Core_Text::persianFixNumber($news['title'])); ?>
            </a>
          </div>
          <!-- END OF TITLE -->
          <!-- LEAD -->
          <?php if (!empty($news['lead'])) : ?>
            <p class="lead">
              <?php echo h($news['lead']); ?>
            </p>
          <?php endif; ?>
          <!-- END OF LEAD -->
        </div>
        <!-- END OF LEFT SERVICE -->
      </li>
    <?php endforeach; ?>
  </ul>
  <?php if (($list->hasPrevious()) || ($list->hasNext())) : ?>
    <footer class="archive_next_page">
      <?php if ($list->hasPrevious()) : ?>
        <a href="<?php echo $list->getPreviousLink(); ?>&queryType=lk" title="قبلی">
          قبلی
        </a>
      <?php endif; ?>
      <?php if ($list->hasNext()) : ?>
        <a href="<?php echo $list->getNextLink(); ?>&queryType=lk" title="بعدی">
          بعدی
        </a>
      <?php endif; ?>
    </footer>
  <?php endif; ?>
</section>
<!-- END OF PRIMARY ARCHIVE CELL -->
<!-- SECONDARY ARCHICE CELL -->
<section class="search_archive">
  <header class="section_header">
    <span class="box_header">
      جستجوی پیشرفته
    </span>
  </header>
  <form id="archive-search" action="/newsstudios/archive/" method="get">
    <label>
      کلمات کلیدی:
    </label>
    <input dir="rtl" name="query" value="<?php echo isset($this->request->query['query']) ? h($this->request->query['query']) : '' ?>" type="text">
    <!-- START DATE -->
    <div class="start-date">
      <label>
        تاریخ آغاز :
      </label>
      <div>
        <select name="dateRange[start][day]">
          <?php
          for ($i = 1; $i <= 31; $i++) {
            if (isset($this->request->query['dateRange']['start']['day'])) {
              $selected = ($i == $this->request->query['dateRange']['start']['day'] ? 'selected="selected"' : '');
            } else {
              $selected = ($i == 1 ? 'selected="selected"' : '');
            }
            echo vsprintf("<option %s value='%s'>%s</option>", array(
              $selected,
              str_pad($i, 2, "0", STR_PAD_LEFT),
              $i
            ));
          }
          ?>
        </select>
      </div>
      <div>
        <select name="dateRange[start][month]">
          <?php
          for ($i = 1; $i <= 12; $i++) {
            if (isset($this->request->query['dateRange']['start']['month'])) {
              $selected = ($i == $this->request->query['dateRange']['start']['month'] ? 'selected="selected"' : '');
            } else {
              $selected = ($i == 1 ? 'selected="selected"' : '');
            }
            echo vsprintf("<option %s value='%s'>%s</option>", array(
              $selected,
              str_pad($i, 2, "0", STR_PAD_LEFT),
              $i
            ));
          }
          ?>
        </select>
      </div>
      <div>
        <select name="dateRange[start][year]">
          <?php
          for ($i = $currentYear - 3; $i <= $currentYear; $i++) {
            if (isset($this->request->query['dateRange']['start']['year'])) {
              $selected = ($i == $this->request->query['dateRange']['start']['year'] ? 'selected="selected"' : '');
            } else {
              $selected = ($i == 1391 ? 'selected="selected"' : '');
            }
            echo vsprintf("<option %s value='%s'>%s</option>", array(
              $selected,
              $i,
              $i
            ));
          }
          ?>
        </select>
      </div>
    </div>
    <!-- END OF START DATE -->
    <!-- END DATE -->
    <div class="end-date">
      <label>
        تاریخ پایان:
      </label>
      <div>
        <select class="browser-default" name="dateRange[end][day]">
          <?php
          for ($i = 1; $i <= 31; $i++) {
            if (isset($this->request->query['dateRange']['end']['day'])) {
              $selected = ($i == $this->request->query['dateRange']['end']['day'] ? 'selected="selected"' : '');
            } else {
              $selected = ($i == $currentDay ? 'selected="selected"' : '');
            }
            echo vsprintf("<option %s value='%s'>%s</option>", array(
              $selected,
              str_pad($i, 2, "0", STR_PAD_LEFT),
              $i
            ));
          }
          ?>
        </select>
      </div>
      <div>
        <select class="browser-default" name="dateRange[end][month]">
          <?php
          for ($i = 1; $i <= 12; $i++) {
            if (isset($this->request->query['dateRange']['end']['month'])) {
              $selected = ($i == $this->request->query['dateRange']['end']['month'] ? 'selected="selected"' : '');
            } else {
              $selected = ($i == $currentMonth ? 'selected="selected"' : '');
            }
            echo vsprintf("<option %s value='%s'>%s</option>", array(
              $selected,
              str_pad($i, 2, "0", STR_PAD_LEFT),
              $i
            ));
          }
          ?>
        </select>
      </div>
      <div>
        <select class="browser-default" name="dateRange[end][year]">
          <?php
          for ($i = $currentYear - 3; $i <= $currentYear; $i++) {
            if (isset($this->request->query['dateRange']['end']['year'])) {
              $selected = ($i == $this->request->query['dateRange']['end']['year'] ? 'selected="selected"' : '');
            } else {
              $selected = ($i == $currentYear ? 'selected="selected"' : '');
            }
            echo vsprintf("<option %s value='%s'>%s</option>", array(
              $selected,
              $i,
              $i
            ));
          }
          ?>
        </select>
      </div>
    </div>
    <!-- END OF END DATE -->
    <div class="accordin">
      <label>
        نمایش بر حسب:
      </label>
      <div>
        <select name="order">
          <option value="publish_time" <?php echo (isset($this->request->query['order']) && $this->request->query['order'] == 'publish_time' ? 'selected="selected"' : '') ?>>
            جدیدترین
          </option>
          <option value="hits" <?php echo (isset($this->request->query['order']) && $this->request->query['order'] == 'hits' ? 'selected="selected"' : '') ?>>
            پربازدیدترین
          </option>
          <option value="comments" <?php echo (isset($this->request->query['order']) && $this->request->query['order'] == 'comments' ? 'selected="selected"' : '') ?>>
            پربحث ترین
          </option>
        </select>
      </div>
    </div>
    <input type="text" name="queryType" value="lk" hidden="hidden">
    <!-- SECOND CHECK BOXES -->
    <div class="archive_news_type">
      <label>
        نوع خبر:
      </label>
      <a href="javascript:void(0)" class="flip">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="img" width="0.5em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 512">
          <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z" fill="#000" />
        </svg>
      </a>
      <div class="panel">
        <input type="checkbox" name="chk[]" checked>
        <label>
          همه
        </label>
        <?php foreach ($newsTypes as $typeId => $type) : ?>
          <input type="checkbox" name="types[]" value="<?php echo $typeId; ?>" <?php echo (isset($this->request->query['types']) && in_array($typeId, $this->request->query['types'])) || !isset($this->request->query['types']) ? "checked='checked'" : ''; ?> id="searchType<?php echo $typeId; ?>" />
          <label for="searchType<?php echo $typeId; ?>"><?php echo $type; ?></label>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="archive_service">
      <label>
        سرویس:
      </label>
      <svg aria-hidden="true" class="flip" xmlns="http://www.w3.org/2000/svg" role="img" width="15" height="15" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 512">
        <path d="m31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z" />
      </svg>
      <div class="panel">
        <input type="checkbox" id="archiveCheckAll" checked>
        <label>
          همه
        </label>
        <?php foreach ($cats as $catId => $cat) : ?>
          <div class="parent_items">
            <input type="checkbox" name="categories" checked value="<?php echo $catId; ?>" <?php echo (isset($this->request->query['categories']) && in_array($catId, $this->request->query['categories'])) ? "checked='checked'" : ''; ?> id="searchCate<?php echo $catId; ?>" />
            <label for="searchCate<?php echo $catId; ?>"><?php echo $cat; ?></label>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <button type="submit" name="button" value="submit">
      جستجو
    </button>
  </form>
</section>
<!-- END OF SECONDARY ARCHIVE CELL -->