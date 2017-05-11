<?php

require_once __DIR__."/../Config/Constantes.php";                     //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php";                              //Inclusión de archivo para Autoload de las clases

\APP\Autoload::run();

$_GET   = filter_input_array(INPUT_GET, FILTER_UNSAFE_RAW);                                        //Limpia entrada
$_POST  = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

file_put_contents('php://stderr', print_r($_POST, TRUE));

$action = $_POST["action"];
unset($_POST["action"]);

if ($action == "viaje"){

    $_POST['viaje'] = json_decode($_POST['viaje'],true);

    // Include the main TCPDF library (search for installation path).
        require_once( __DIR__."/../Views/Reports/TCPDF-master/tcpdf.php");

    class MYPDF extends TCPDF {
        public function Header() {
            $headerData = $this->getHeaderData();
            $this->SetFont('helvetica', 'B', 10);
            $this->writeHTML($headerData['string']);
        }
    }



    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // create new PDF document
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor(APPNAME);
        $pdf->SetTitle('Reporte de Viaje, ID: '.$_POST['viaje']['idViaje']);
        $pdf->SetSubject('Reporte');
        $pdf->SetKeywords(APPNAME.', PDF, reporte, viaje');

    // set default header data
    $pdf->setHeaderData($ln='', $lw=0, $ht='', $hs='
                   <div>
                    <table cellspacing="0" cellpadding="1" style="border-bottom:1pt solid black;">
                        <tr>
                            <td width="100"><img src="../Views/Reports/TCPDF-master/examples/images/my_bus.jpg"/></td>
                            <td width=""><h3 style="text-align:right;">'.APPNAME.'</h3><span style="text-align:right;">Trabajo Terminal <br> ERP Para la gestión de operaciones de renta de transporte turistico.</span></td>
                        </tr>
                    </table>             
                  </div>', $tc=array(0,0,0), $lc=array(0,0,0));
    //$pdf->setHeaderData(PDF_HEADER_LOGO, 25, $ht='', $hs='<h2 style="text-align:right;">'.APPNAME.'</h2> Trabajo Terminal: ERP Para la gestión de operaciones de renta de transporte turistico. \n\n Reporte de Viaje, ID: ".$_POST[\'viaje\']["idViaje"]', $tc=array(0,0,0), $lc=array(0,0,0));
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, 25, APPNAME, "Trabajo Terminal: ERP Para la gestión de operaciones de renta de transporte turistico. \n\n Reporte de Viaje, ID: ".$_POST['viaje']["idViaje"], array(0,0,0), array(0,0,0));
        $pdf->setFooterData(array(0,0,0), array(0,0,0));

    // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 28, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

    // ---------------------------------------------------------

    // set default font subsetting mode
        $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
        $pdf->SetFont('helvetica', '', 12, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

    // set text shadow effect
        //$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

    // Set some content to print
        $html = '
    <font size="8" style="text-align:right;">['.date("F j, Y").']</font>
    <h3>Cliente</h3>
    '.print_r($_POST['viaje'], TRUE).'
';

    // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
        $pdf->Output('example_001.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+
    }




else{

    $salida["success"] = false;
    $salida["error"] = "Controlador desconocido.";

    echo json_encode($salida);
}


