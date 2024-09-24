<?php
  if (isset($requireFiles9)) :
    foreach ($requireFiles9 as $file) :
      require $file;
    endforeach;
  endif;
  echo stripslashes(Core_Setting::read(XCMS_LANG . '.scriptsBottom'));
?>
 <?php
// add element helper js library for developer users
if (in_array(AuthComponent::user('id'), array(1, 2))) : ?>
  <script src="<?php echo $this->Core->jsMin('common-js/v3/elementHelper');?>"></script>
<?php endif; ?>
  </body>
</html>
