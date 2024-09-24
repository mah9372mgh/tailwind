<?php
// get current element name
$elementName = basename(__FILE__, '.ctp');
// get element data
require XCMS_PATH . '/core-common/app/View/Elements/includes/element_data.php';
?>
<?php if ($active) : ?>
  <?php if (!empty($data)) : ?>
    <section class="" data-element-name="<?php echo $elementName; ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
      <!-- HEADER -->
      <header class="">
        <span class="bg-slate-800 px-3 py-1 text-white">
          <?php echo h($element['title']); ?>
        </span>
      </header>
      <!-- END OF HEADER -->
      <form class="mt-8">
        <div class="flex gap-x-6 mb-8">
          <div class="w-full">
            <label for="commentName"></label>
            <input class="w-full bg-slate-200 px-3 py-1" dir="rtl" id="commentName" name="name" type="text" value="" placeholder="نام">
          </div>
          <div class="w-full">
            <label for="commentEmail"></label>
            <input class="w-full bg-slate-200 px-3 py-1" dir="rtl" id="commentEmail" name="email" type="email" value="" placeholder="ایمیل">
          </div>
        </div>
        <div class="w-full">
          <label for="commentMessage"></label>
          <textarea class="w-full bg-slate-200 px-3 py-1" rows="5" id="commentMessage" cols="60" name="message" placeholder="نظر خود را بنویسید" required></textarea>
        </div>
        <div class="text-left mt-8">
          <button class="bg-slate-600 text-white px-3 py-1 hover:text-slate-400 duration-300" type="submit" name="button" value="submit">
            ارسال
          </button>
        </div>
      </form>
    </section>
  <?php endif; ?>
<?php endif; ?>