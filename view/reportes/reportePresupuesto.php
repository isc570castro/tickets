<?php

 require_once('../../../src/mpdpf/mpdf.php');
// Extend the TCPDF class to create custom Header and Footer



$pdf->SetFont('helvetica', '', 11);

     $tbl = ' <header class="clearfix">
    <div class="container">
      <figure>
        <img class="logo" src="../../../imagenes/LOGO.png" alt="">
      </figure>
      <div class="company-info">
        <h2 class="title">Company Name</h2>
        <span>455 Foggy Heights, AZ 85004, US</span>
        <span class="line"></span>
        <a class="phone" href="tel:602-519-0450">(602) 519-0450</a>
        <span class="line"></span>
        <a class="email" href="mailto:company@example.com">company@example.com</a>
      </div>
    </div>
  </header>

  <section>
    <div class="details clearfix">
      <div class="client left">
        <p>INVOICE TO:</p>
        <p class="name">John Doe</p>
        <p>
          796 Silver Harbour,<br>
          TX 79273, US
        </p>
        <a href="mailto:john@example.com">john@example.com</a>
      </div>
      <div class="data right">
        <div class="title">Invoice 3-2-1</div>
        <div class="date">
          Date of Invoice: 01/06/2014<br>
          Due Date: 30/06/2014
        </div>
      </div>
    </div>
    <div class="container">
      <div class="table-wrapper">
        <table>
          <tbody class="head">
            <tr>
              <th class="no"></th>
              <th class="desc"><div>Description</div></th>
              <th class="qty"><div>Quantity</div></th>
              <th class="unit"><div>Unit price</div></th>
              <th class="total"><div>Total</div></th>
            </tr>
          </tbody>
          <tbody class="body">
            <tr>
              <td class="no">01</td>
              <td class="desc">Creating a recognizable design solution based on the companys existing visual identity</td>
              <td class="qty">30</td>
              <td class="unit">$40.00</td>
              <td class="total">$1,200.00</td>
            </tr>
            <tr>
              <td class="no">02</td>
              <td class="desc">Developing a Content Management System-based Website</td>
              <td class="qty">80</td>
              <td class="unit">$40.00</td>
              <td class="total">$3,200.00</td>
            </tr>
            <tr>
              <td class="no">03</td>
              <td class="desc">Optimize the site for search engines (SEO)</td>
              <td class="qty">20</td>
              <td class="unit">$40.00</td>
              <td class="total">$800.00</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="no-break">
        <table class="grand-total">
          <tbody>
            <tr>
              <td class="no"></td>
              <td class="desc"></td>
              <td class="qty"></td>
              <td class="unit">SUBTOTAL:</td>
              <td class="total">$5,200.00</td>
            </tr>
            <tr>
              <td class="no"></td>
              <td class="desc"></td>
              <td class="qty"></td>
              <td class="unit">AX 25%:</td>
              <td class="total">$1,300.00</td>
            </tr>
            <tr>
              <td class="grand-total" colspan="5"><div><span>GRAND TOTAL:</span>$6,500.00</div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="thanks">Thank you!</div>
      <div class="notice">
        <div>NOTICE:</div>
        <div>A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
      <div class="end">Invoice was created on a computer and is valid without the signature and seal.</div>
    </div>
  </footer>
';
$css=file_get_contents('css/style.css');
$pdf->writeHTML($css,1);
    $pdf->writeHTML($tbl, false, false, false, false, '');

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
//============================================================+

?>