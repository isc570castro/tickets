<?php
$idPresupuesto=$_GET['idPresupuesto'];
include "../../../../model/conexion.php";
$objConex = new Conexion();
$link = $objConex->conectarse();
  $presupuesto = mysql_query("SELECT presupuesto.descripcion, clientes.nombreCliente, presupuesto.montoTotalMadera, presupuesto.montoTotalProductos, presupuesto.montoTotal  FROM presupuesto, clientes WHERE presupuesto.idCliente=clientes.idCliente and idPresupuesto='$idPresupuesto'", $link) or die(mysql_error());
   if(mysql_num_rows($presupuesto)<=0){
  echo "<script> 
            alert('No se encontraron registros!!') 
            setTimeout('self.close();',100)
            </script>";
  }else{
 $row=mysql_fetch_array($presupuesto);
  $nombreCliente=$row['nombreCliente'];
  $descripcion=$row['descripcion'];
  $montoTotalMadera=$row['montoTotalMadera'];
  $montoTotalProductos=$row['montoTotalProductos'];
  $montoTotal=$row['montoTotal'];
  $madera = mysql_query("SELECT * FROM materiaPrima WHERE idPresupuesto='$idPresupuesto'", $link) or die(mysql_error()); 
  $materiales = mysql_query("SELECT materiales.cantidad, materiales.montoTotal, productos.descripcion, productos.precio, productos.marca  FROM materiales, productos WHERE productos.idProducto=materiales.idProducto and materiales.idPresupuesto='$idPresupuesto'", $link) or die(mysql_error());
 require_once('../../../src/tcpdf/tcpdf.php');
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		/*$image_file ='../../src/img/logoitz.png';
		$this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font*/
		$this->SetFont('', 'B', 10);
        $tbl = '
     <table border="0" cellpadding="2" cellspacing="0">
     <tr style="">
     <td width="25%"></td>
      <td width="50%" rowspan="6" align="center"><img src="../../../imagenes/LOGO.png"></td>
      <td width="25%"></td>
     </tr>
     </table>';
		// Title
		$this->writeHTML($tbl, false, false, false, false, '');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', '', 9);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, '', 0, false, 'L', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, '', 0, false, 'R', 0, '', 0, false, 'T', 'M');
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
// add a page
$pdf->AddPage('L', 'A4');
//$pdf->Ln(5);

$dia=date('d');
$mes=date('m');
$ano=date('o');
$pdf->SetFont('helvetica', '', 11);

     $tbl = '
     <table border="0">
     <tr>
      <td width="100%" align="center"><b><br></b></td>
     </tr>
     <tr>
      <td width="70%"><b>REPORTE DE PRESUPUESTO</b></td>
      <td width="30%"><b>Fecha de impresion: </b> '.$dia." del ".$mes." del ".$ano.'</td>
     </tr>
     <tr>
    <td width="525"><b>Nombre del cliente: </b> '.$nombreCliente.'</td>
     </tr>
     <tr>
      <td width="250"><b>Descripción: </b>'.$descripcion.'</td>
     </tr>
     <tr>
      <td width="525"><b>Total en madera: </b> $ '.$montoTotalMadera.'</td>
     </tr>
       <tr>
      <td width="525"><b>Total en productos: </b> $ '.$montoTotalProductos.'</td>
     </tr>
     <tr>
      <td width="525"><b>Total de presupuesto: </b> $ '.$montoTotal.'</td>
     </tr>
     </table> ' ;
    // Title
      $pdf->writeHTML($tbl, false, false, false, false, '');
      $tbl = '
     <table border="0">
     <tr>
      <td width="100%" align="center"><b>COSTO EN MADERA</b></td>
     </tr>
    </table>';
    $pdf->writeHTML($tbl, false, false, false, false, '');
      $tbl = '
     <table border="1">
     <tr>
     <td align="center"><b>Cantidad</b></td>
     <td align="center"><b>Descripción</b></td>
     <td align="center"><b>Grueso</b></td>
     <td align="center"><b>Ancho</b></td>
     <td align="center"><b>Largo</b></td>
     <td align="center"><b>Total de pies</b></td>
     <td align="center"><b>Precio pie</b></td>
     <td align="center"><b>Precio unitario</b></td>
     <td align="center"><b>Monto total</b></td>
     </tr>
     </table>';
    $pdf->writeHTML($tbl, false, false, false, false, '');
      while ($rows = mysql_fetch_array($madera)){
      $cantidad= $rows['cantidad'];
      $descripcion= $rows['descripcion'];
      $grueso= $rows['grueso'];
      $ancho= $rows['ancho'];
      $largo= $rows['largo'];
      $totalPies=$rows['total'];
      $precioPie= $rows['presioPie'];
      $precioUnitario= $rows['presioUnitario'];
      $montoTotal= $rows['montoTotal']; 
     $tbl = '
     <table border="1">
     <tr>
     <td align="center">'.$cantidad.'</td>
     <td align="center">'.$descripcion.'</td>
     <td align="center">'.$grueso.'</td>
     <td align="center">'.$ancho.'</td>
     <td align="center">'.$largo.'</td>
     <td align="center">'.$totalPies.'</td>
     <td align="center">$'.$precioPie.'</td>
     <td align="center">$'.$precioUnitario.'</td>
     <td align="center">$'.$montoTotal.'</td>
     </tr>
     </table>';
  $pdf->writeHTML($tbl, false, false, false, false, '');

      }
      $tbl = '
     <table border="0">
     <tr>
      <td width="100%" align="center"><b><br></b></td>
     </tr>
     <tr>
      <td width="100%" align="center"><b>COSTO EN PRODUCTOS</b></td>
     </tr>
    </table>';
    $pdf->writeHTML($tbl, false, false, false, false, '');
      $tbl = '
     <table border="1">
     <tr>
     <td align="center"><b>Cantidad</b></td>
     <td align="center"><b>Producto</b></td>
     <td align="center"><b>Marca</b></td>
     <td align="center"><b>Precio</b></td>
     <td align="center"><b>Monto Total</b></td>
     </tr>
     </table>';
    $pdf->writeHTML($tbl, false, false, false, false, '');
      while ($rows = mysql_fetch_array($materiales)){
      $cantidad= $rows['cantidad'];
      $descripcion= $rows['descripcion'];
      $precio= $rows['precio'];
      $marca= $rows['marca'];
      $montoTotal= $rows['montoTotal']; 
     $tbl = '
     <table border="1">
     <tr>
     <td align="center">'.$cantidad.'</td>
     <td align="center">'.$descripcion.'</td>
     <td align="center">'.$grueso.'</td>
     <td align="center">'.$ancho.'</td>
     <td align="center">'.$largo.'</td>
     </tr>
     </table>';
  $pdf->writeHTML($tbl, false, false, false, false, '');
}
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
//============================================================+
}
