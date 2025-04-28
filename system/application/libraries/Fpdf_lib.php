<?php
class Fpdf_lib
{
    public function __construct() 
    {
       // $this->var = $var;
        log_message('Debug', 'FPdf class is loaded.');

    }
    public function load1(){
        // Include PHPMailer library files
        //return 1;
        
        require_once 'fpdf.php';
        $pdf = new FPDF();
        return $pdf;
    }

    public function load_html_pdf_content(){

        require_once 'pdf.php';
        $pdf=new PDF();
        return $pdf;
    }
}

?>
