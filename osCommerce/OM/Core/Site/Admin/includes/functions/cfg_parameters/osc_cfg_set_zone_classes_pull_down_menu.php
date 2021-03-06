<?php
/*
  osCommerce Online Merchant $osCommerce-SIG$
  Copyright (c) 2010 osCommerce (http://www.oscommerce.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/

  use osCommerce\OM\Core\Registry;
  use osCommerce\OM\Core\OSCOM;

  function osc_cfg_set_zone_classes_pull_down_menu($default, $key = null) {
    $OSCOM_Database = Registry::get('Database');

    $name = (empty($key)) ? 'configuration_value' : 'configuration[' . $key . ']';

    $zone_class_array = array(array('id' => '0',
                                    'text' => OSCOM::getDef('parameter_none')));

    $Qzones = $OSCOM_Database->query('select geo_zone_id, geo_zone_name from :table_geo_zones order by geo_zone_name');
    $Qzones->execute();

    while ( $Qzones->next() ) {
      $zone_class_array[] = array('id' => $Qzones->valueInt('geo_zone_id'),
                                  'text' => $Qzones->value('geo_zone_name'));
    }

    return osc_draw_pull_down_menu($name, $zone_class_array, $default);
  }
?>
