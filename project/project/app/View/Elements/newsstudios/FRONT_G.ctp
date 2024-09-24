<nav class="">
  <!-- HEADER -->
  <header class="">
    <span class="bg-slate-800 px-3 py-1 text-white">
      TAGS
    </span>
  </header>
  <!-- END OF HEADER -->
  <ul class="md:grid md:grid-cols-2 lg:grid-cols-3 gap-4 mt-8">
    <?php
    $trend = new Manipulate_Newsstudio_Front_View();
    $tags = $trend->getTrends(6, 30);
    ?>
    <?php foreach ($tags as $tag) : ?>
      <li class="sm: bg-yellow-200 text-center px-3 py-3 border border-teal-600 hover:text-teal-600 duration-300">
        <a class="" href="<?php echo sprintf('/tags/%s', urlencode2(trim($tag))); ?>" target="_blank" title="<?php echo $tag ?>">
          <?php echo h(Core_Text::persianFixNumber($tag)); ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>