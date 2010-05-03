<?php
/*
  osCommerce Online Merchant $osCommerce-SIG$
  Copyright (c) 2010 osCommerce (http://www.oscommerce.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/

  namespace osCommerce\OM\Site\Admin\Application\ErrorLog;

  use osCommerce\OM\ErrorHandler;
  use osCommerce\OM\DateTime;

  class ErrorLog {
    public static function getAll($pageset = 1) {
      if ( !is_numeric($pageset) || (floor($pageset) != $pageset) ) {
        $pageset = 1;
      }

      $result = array('entries' => array(),
                      'total' => ErrorHandler::getTotalEntries());

      foreach ( ErrorHandler::getAll(MAX_DISPLAY_SEARCH_RESULTS, $pageset) as $row ) {
        $result['entries'][] = array('date' => DateTime::getShort(DateTime::fromUnixTimestamp($row['timestamp']), true),
                                     'message' => $row['message']);
      }

      return $result;
    }

    public static function find($search, $pageset = 1) {
      if ( !is_numeric($pageset) || (floor($pageset) != $pageset) ) {
        $pageset = 1;
      }

      $result = array('entries' => array(),
                      'total' => ErrorHandler::getTotalFindEntries($search));

      foreach ( ErrorHandler::find($search, MAX_DISPLAY_SEARCH_RESULTS, $pageset) as $row ) {
        $result['entries'][] = array('date' => DateTime::getShort(DateTime::fromUnixTimestamp($row['timestamp']), true),
                                     'message' => $row['message']);
      }

      return $result;
    }

    public static function delete() {
      ErrorHandler::clear();

      return true;
    }
  }
?>
