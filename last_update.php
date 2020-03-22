<?php
// -------------------------------------------------------------------------------------------
// ------------- Move this Script into template/inc_script/frontend_render -------------------
//----------------------------- f.e. as "last_update.php" ------------------------------------
// --------------- Use {DATE_UPDATE:d.m.Y H:i} as RT in your Template. -----------------------
// -------------------------------------------------------------------------------------------
// obligate check for phpwcms constants
  if (!defined('PHPWCMS_ROOT')) {die("You Cannot Access This Script Directly, Have a Nice Day.");}
// -------------------------------------------------------------------------------------------
if( ! (strpos($content["all"],'{DATE_UPDATE')===false)) {
 
$sql = 'SELECT UNIX_TIMESTAMP(latest_ts) AS latest_ts FROM((
	SELECT MAX(article_tstamp) AS latest_ts FROM '.DB_PREPEND.'phpwcms_article WHERE article_deleted=0 AND article_public=1 LIMIT 1)
	UNION
	(SELECT MAX(acat_tstamp) AS latest_ts FROM '.DB_PREPEND.'phpwcms_articlecat WHERE acat_trash=0 AND acat_aktiv=1 LIMIT 1)
	UNION
	(SELECT MAX(acontent_tstamp) AS latest_ts FROM '.DB_PREPEND.'phpwcms_articlecontent WHERE acontent_visible=1 AND acontent_trash=0 LIMIT 1)
) AS t1 LIMIT 1';
$result = _dbQuery($sql);
if(isset($result[0]['latest_ts'])) {
    $content["all"] = render_date($content["all"], $result[0]['latest_ts'], 'DATE_UPDATE');
} else {
    // Render Fallback date!
    $content["all"] = render_date($content["all"], now(), 'DATE_UPDATE');
  }
}
?>

