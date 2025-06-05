<?php
include("connection.php");
require_once 'fpdf/fpdf.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION["userLogin"])) {
    die("User not logged in");
}

$user = $_SESSION["userLogin"];

// Get request details using prepared statement
$stmt = $conn->prepare("SELECT * FROM requestbonafide WHERE Email = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "
    <script type='text/javascript'>
        alert('Request not found');
        window.location.href='home.php';
    </script>
    ";
}   

if($row["Request"] !== "Approved")
{
    echo "
    <script type='text/javascript'>
        alert('Bonafide certificate is not Approved yet!');
        window.location.href='home.php';
    </script>
    ";
}

// Create PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Date and Ref
$ref = 'Ref : CSCOE/Bonafide/2024';
$date = isset($row['approval_date']) ? date('d/m/Y', strtotime($row['approval_date'])) : date('d/m/Y');
$pdf->Cell(0, 5, $ref, 0, 0, 'L');
$pdf->Cell(0, 5, 'Date : ' . $date, 0, 1, 'R');
$pdf->Ln(5);

// College Header
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 7, 'CSMSS', 0, 1, 'C');
$pdf->Cell(0, 7, 'CHHATRAPATI SHAHU MAHARAJ SHIKSHAN SANSTHA\'s', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'CHH. SHAHU COLLEGE OF ENGINEERING', 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, 'Approved by AICTE New Delhi, DTE (Govt. of Maharashtra) and affiliated to Dr. B.A.T. University, Lonere', 0, 1, 'C');
$pdf->Cell(0, 6, 'Kanchanwadi, Paithan Road, Chhatrapati Sambhajinagar 431 002 (M.S)', 0, 1, 'C');
$pdf->Cell(0, 6, 'Ph. No. : (0240) 2379248, 2646463 Fax : (0240) 2379015', 0, 1, 'C');
$pdf->Cell(0, 6, 'Email : shahuengg@gmail.com, principal@csmssengg.org   Website : www.csmssengg.org', 0, 1, 'C');
$pdf->Ln(10);

// Title
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'BONAFIDE CERTIFICATE', 0, 1, 'C');
$pdf->Ln(5);

// Content
$pdf->SetFont('Arial', '', 12);
$content = "This is to certify that ";
$content .= $pdf->SetFont('Arial', 'B', 12);
$content .= $row["Name"];
$content .= $pdf->SetFont('Arial', '', 12);
$content .= " is a bonafide student of this college studying in B.Tech Third Year (Artificial Intelligence & Data Science) during the academic year 2024-2025. His/Her date of birth as per college register is " . $row["DOB"] . ".";
$pdf->MultiCell(0, 8, $content, 0, 'L');
$pdf->Ln(5);

$pdf->MultiCell(0, 8, 'His/Her conduct and progress is satisfactory to the best of my knowledge. He/She bears a good moral character. This certificate is issued for the purpose of ' . $row["Reason"] .'.', 0, 'L');
$pdf->Ln(20);

// Principal Signature
$pdf->Cell(0, 10, 'Principal', 0, 1, 'R');
$pdf->Ln(5);
$pdf->Cell(0, 10, '_________________________', 0, 1, 'R');

// Output PDF
$pdf->Output('D', 'Bonafide_Certificate_' . $row["Name"] . '.pdf');


// Close database connection
$stmt->close();
$conn->close();
?>