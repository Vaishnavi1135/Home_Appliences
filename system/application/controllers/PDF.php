<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PDF extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the Pdf library
        $this->load->library('pdf');
    }

    public function generate_pdf() {
        // Create new PDF instance
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Sample PDF');
        $pdf->SetSubject('TCPDF in CodeIgniter 3');
        $pdf->SetKeywords('TCPDF, PDF, CodeIgniter');

        // Set default header data
        $pdf->SetHeaderData('', 0, 'Sample PDF', "Generated using TCPDF");

        // Set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // Set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // Set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        // Add a page
        $pdf->AddPage();

        // Add content
        $html = '<h1>Hello, this is a sample PDF</h1>';
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF
        $pdf->Output('sample.pdf', 'I'); // 'I' for inline view, 'D' for download
    }
}
?>
