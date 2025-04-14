<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Pdf
{
    function createPDF($html, $filename = '', $download = TRUE, $paper = 'A4', $orientation = 'portrait')
    {
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if ($download)
            $dompdf->stream($filename . '.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    function createPDF2($html)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('1sample.pdf');
        // return $dompdf->output();
    }

    function instance()
    {
        return new Dompdf();
        // $options = new Dompdf\Options();
        // $options->set('isHtml5ParserEnabled', true);
        // $pdf = new Dompdf($options);

        // return $pdf;
    }
}
