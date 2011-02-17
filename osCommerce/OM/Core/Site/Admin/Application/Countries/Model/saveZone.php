<?php
/*
  osCommerce Online Merchant $osCommerce-SIG$
  Copyright (c) 2010 osCommerce (http://www.oscommerce.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/

  namespace osCommerce\OM\Core\Site\Admin\Application\Countries\Model;

  use osCommerce\OM\Core\OSCOM;

  class saveZone {
    public static function execute($id = null, $data) {
      if ( is_numeric($id) ) {
        $data['id'] = $id;
      }

      return OSCOM::callDB('Admin\Countries\ZoneSave', $data);
    }
  }
?>
