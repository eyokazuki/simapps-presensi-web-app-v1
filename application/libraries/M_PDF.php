<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/mpdf/mpdf.php');

class M_PDF
{
  function m_pdf()
  {
    $CI = &get_instance();
    log_message('Debug', 'mPDF class is loaded.');
  }

  function load($param = NULL)
  {
    if ($param == NULL) {
      $param = '"en-GB-x","A4","","",10,10,10,10,6,3';
    }

    return new mPDF($param);
    // return new mPDF();
  }
}
