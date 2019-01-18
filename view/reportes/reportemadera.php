<?php
$idPresupuesto=$_REQUEST['idPresupuesto'];
$tipoMadera=$_GET['tipoMadera'];
require_once('../../../src/tcpdf/tcpdf.php');
include "../../../../model/conexion.php";
$objConex = new Conexion();
$link = $objConex->conectarse();
 $madera= mysql_query("SELECT *  FROM materiaprima WHERE idPresupuesto='$idPresupuesto' AND tipoMadera='$tipoMadera'", $link) or die(mysql_error());
 $presupuesto = mysql_query("SELECT *  FROM presupuesto, clientes WHERE presupuesto.idCliente=clientes.idCliente and idPresupuesto='$idPresupuesto'", $link) or die(mysql_error());
 $row=mysql_fetch_array($presupuesto);
 $descripcion=$row['descripcion'];
 $totalPies=$row['totalPies'];
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
  //Page header
  public function Header() {
    // Logo
    /*$image_file ='../../src/img/logoitz.png';
    $this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    // Set font*/
    $this->SetFont('', '', 9);
    $dia=date('d');
    $mes=date('m');
    $ano=date('o');
     $html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
<style>
  label.princ{
    color:black;
  }
   label.sec{
    color:#696969;
  }
  td.td{

  }
</style>
</style>
<table border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="50%" align="center"><img src="../../../imagenes/LOGO.png"></td>
    <td width="50%" align="rigth">
      <label class="principal">Domicilio: </label><label class="sec">Calle colón #7 Colonia la viña</label><br>
      <label class="principal">Teléfono: </label><label class="sec">936-18-67</label><br>
      <label class="principal">Correo electónico: </label><label class="sec">castro_3852@hotmail.com</label>
      <label class="sec"><br>Valparaiso Zacatecas  $dia/$mes/$ano</label>
    </td>
  </tr>
   <tr style="">
    <td width="100%" colspan=2><hr></td>
  </tr>
</table>
EOF;
    // Title
    $this->writeHTML($html, false, false, false, false, '');
  }

  // Page footer
  public function Footer() {
    // Position at 15 mm from bottom
    $this->SetY(-15);
    // Set font
    $this->SetFont('helvetica', '', 8);
    // Page number
    //$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
 
  }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
/*$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');*/

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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

$pdf->SetFont('helvetica', '', 11);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style
$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
  label.princ{
    color:black;
  }
   label.sec{
    color:#696969;
  }
</style>
<table border=0>
  <tr>
      <td>
      <br><br><br>
      <label class="principal">DESCRIPCIÓN: </label><label class="sec">$descripcion</label>     
      </td>
  </tr>
   <tr>
      <td>
      <label class="principal">TIPO DE MADERA: </label><label class="sec">$tipoMadera</label>      
      </td>
  </tr>
</table>
EOF;
$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTML($html, true, false, true, false, '');
while($rows=mysql_fetch_array($madera)){
  $cantidad=$rows['cantidad'];
  $grueso=$rows['grueso'];
  $ancho=$rows['ancho'];
  $largo=$rows['largo'];
  $cantPies=$rows['cantPies'];
$html = <<<EOF
<table id="tabla">
  <tr>
      <td width="25%">
          <label style="color:#1a1a1a">$cantidad - $grueso x $ancho x $largo = $cantPies</label>
      </td>
  </tr>
</table>
EOF;
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
}
$tbl = '
     <table border="0">
     <tr>
     <td><label class="principal">Total = </label><label class="sec">'.$totalPies.'</label> pies</td>
     </tr>
     </table>';
  $pdf->writeHTML($tbl, false, false, false, false, '');

  /*c

// ---------------------------------------------------------
// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
TCPDF Example 003

Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
// ---------------------------------------------------------
*/
//Close and output PDF document
$pdf->Output('ReporteSesiones.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================