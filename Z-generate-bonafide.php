<?php
include("connection.php");
require_once 'fpdf/fpdf.php';

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$user = $_SESSION["userLogin"];

// Get request details
$stmt = $pdo->prepare("SELECT * FROM requestbonafide WHERE Name = '".$user."'");

$stmt->execute([$requestId]);
$request = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$request) {
    die("Request not found");
}

// Check if approved
if ($request['status'] !== 'approved') {
    die("This bonafide certificate has not been approved");
}

// Create PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// College Header
$pdf->Cell(0, 10, 'CSMSS Chh Shahu College of Engineering', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Affiliated to Dr. Babasaheb Ambedkar Technological University', 0, 1, 'C');
$pdf->Cell(0, 10, 'Lonere, Raigad, Maharashtra 402103', 0, 1, 'C');
$pdf->Ln(10);

// Title
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'BONAFIDE CERTIFICATE', 0, 1, 'C');
$pdf->Ln(10);

// Content
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 8, 'This is to certify that Mr./Ms. ' . $row["Name"] . 'is a bonafide student of this college studying B.Tech ' . $row["Class"] . ' (Artificial Intelligence and Data Science) during the academic year 2024-2025. His/Her date of birth as per college register is' . $row["DOB"]. , 0, 'L');
$pdf->Ln(8);
$pdf->MultiCell(0, 8, 'This certificate is issued for the purpose of ' . $row["Reason"] . '.', 0, 'L');
$pdf->Ln(20);

// Signatures
$pdf->Cell(95, 10, 'Principal', 0, 0, 'C');
$pdf->Cell(95, 10, 'Faculty In-Charge', 0, 1, 'C');
$pdf->Ln(10);
$pdf->Cell(95, 10, '___________________', 0, 0, 'C');
$pdf->Cell(95, 10, '___________________', 0, 1, 'C');
$pdf->Cell(95, 5, '(Seal)', 0, 0, 'C');
$pdf->Cell(95, 5, '(' . $request['faculty_name'] . ')', 0, 1, 'C');

// Date
$pdf->Ln(15);
$pdf->Cell(0, 10, 'Date: ' . date('d-m-Y', strtotime($request['approval_date'])), 0, 1, 'R');

// Output PDF
$pdf->Output('D', 'Bonafide_Certificate_' . $row["Name"] . '.pdf');
?>