<?php
// -------------------------------------------------------------------------------------------
// ------------------------------- Render Category ID ----------------------------------------
// Instructions: 
// Move the Script as, f.e., render_cat_id.php into template/inc_script/frontend_render
// Extend conf.template_default.inc.php by the following line:
// $template_default['cat_id'] = '1'; //Set '1' to render Category ID in Source Code
// -------------------------------------------------------------------------------------------
// obligate check for phpwcms constants
  if (!defined('PHPWCMS_ROOT')) {die("You Cannot Access This Script Directly, Have a Nice Day.");}
// -------------------------------------------------------------------------------------------

if(!empty($template_default['cat_id'])) {
    $content['body_id'] = $content['cat_id'];
}
?>

