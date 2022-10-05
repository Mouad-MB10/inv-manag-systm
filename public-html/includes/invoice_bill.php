<?php
include("../fpdf/fpdf.php");
if ($_GET["order_date"]) {
    $pdf= new FPDF();
    $pdf->AddPage();
    
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(190,10,'Invontory Management Systeme',1,1,'C');
    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->SetFont("Arial", null, 12);
    $pdf->Cell(50, 10,"Date",0,0);
    $pdf->Cell(50, 10, ": ".$_GET["order_date"], 0, 1);
    $pdf->Cell(50, 10, "Customer Name", 0, 0);
    $pdf->Cell(50, 10, ": " . $_GET["customer_order"], 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(30, 10, "#", 1,0);
    $pdf->Cell(40, 10, "Product Name", 1,0);
    $pdf->Cell(40, 10, "Quantity", 1,0); 
    $pdf->Cell(40, 10, "Price", 1,0);
    $pdf->Cell(40, 10, "Total", 1,1);
    for ($i=0; $i <count($_GET["pid"]) ; $i++) { 
        $pdf->Cell(30, 10, $i+1, 1,0);
        $pdf->Cell(40, 10, $_GET["pro_name"][$i], 1,0);
        $pdf->Cell(40, 10, $_GET["qnty"][$i], 1,0);
        $pdf->Cell(40, 10, $_GET["price"][$i], 1,0);
        $pdf->Cell(40, 10, $_GET["qnty"][$i]*$_GET["price"][$i], 1,1);

    }
    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "Sub Total ", 0, 0);
    $pdf->Cell(50, 10, ": " . $_GET["sub_total"], 0, 1);
    $pdf->Cell(50, 10, "Discount(%) ", 0, 0);
    $pdf->Cell(50, 10, ": " . $_GET["disc"]." %" , 0, 1);
    $pdf->Cell(50, 10, "Total ", 0, 0);
    $pdf->Cell(50, 10, ": " . $_GET["total"], 0, 1);
    $pdf->Cell(50, 10, "TVA ", 0, 0);
    $pdf->Cell(50, 10, ":  20%", 0, 1);
    $pdf->Cell(50, 10, "Net Total", 0, 0);
    $pdf->Cell(50, 10, ": " . $_GET["net_total"], 0, 1);
    $pdf->Cell(50, 10, "Paid", 0, 0);
    $pdf->Cell(50, 10, ": " . $_GET["paid"], 0, 1);
    $pdf->Cell(50, 10, "Due", 0, 0);
    $pdf->Cell(50, 10, ": " . $_GET["due"], 0, 1);
    $pdf->Cell(50, 10, "Payment Methode", 0, 0);
    $pdf->Cell(50, 10, ": " . $_GET["payment_type"], 0, 1);
    $pdf->Cell(190, 10, 'Signature', 0, 1, 'R');







    $pdf->Output("../pdf_file/PDF_INVOICE_".uniqid().".pdf","F");
$pdf->Output();


}
?>