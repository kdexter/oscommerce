<?php
/*
  osCommerce Online Merchant $osCommerce-SIG$
  Copyright (c) 2010 osCommerce (http://www.oscommerce.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/

  use osCommerce\OM\ObjectInfo;
  use osCommerce\OM\Site\Admin\Application\Administrators\Administrators;
  use osCommerce\OM\OSCOM;

  $OSCOM_ObjectInfo = new ObjectInfo(Administrators::get($_GET['id']));
?>

<h1><?php echo $OSCOM_Template->getIcon(32) . osc_link_object(OSCOM::getLink(), $OSCOM_Template->getPageTitle()); ?></h1>

<?php
  if ( $OSCOM_MessageStack->exists() ) {
    echo $OSCOM_MessageStack->get();
  }
?>

<div class="infoBox">
  <h3><?php echo osc_icon('trash.png') . ' ' . $OSCOM_ObjectInfo->getProtected('user_name'); ?></h3>

  <form name="aDelete" class="dataForm" action="<?php echo OSCOM::getLink(null, null, 'id=' . $OSCOM_ObjectInfo->getInt('id') . '&action=Delete'); ?>" method="post">

  <p><?php echo OSCOM::getDef('introduction_delete_administrator'); ?></p>

  <p><?php echo '<b>' . $OSCOM_ObjectInfo->get('user_name') . '</b>'; ?></p>

  <p><?php echo osc_draw_hidden_field('subaction', 'confirm') . osc_draw_button(array('priority' => 'primary', 'icon' => 'trash', 'title' => OSCOM::getDef('button_delete'))) . ' ' . osc_draw_button(array('href' => OSCOM::getLink(), 'priority' => 'secondary', 'icon' => 'close', 'title' => OSCOM::getDef('button_cancel'))); ?></p>

  </form>
</div>
