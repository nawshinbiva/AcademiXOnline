<?php session_start(); ?>
<?php
require('../controller/fpdf.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Certificate details
    $studentName = $_POST['student_name'];
    $percentage = $_POST['percentage'];
    $signature = $_POST['signature'];

    // Create a new PDF document
    $pdf = new FPDF();
    $pdf->AddPage();

    // Certificate content
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Certificate of Achievement', 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'This is to certify that', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, $studentName, 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "has successfully completed the course with a percentage of $percentage%", 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->Cell(0, 10, "Signature: $signature", 0, 1, 'C');

    // Save the PDF to the 'uploads' directory
    $pdfFilePath = '../uploads/Certificate_' . $studentName . '.pdf';
    $pdf->Output($pdfFilePath, 'F');

    // Redirect to the generated PDF
    header('Location: ' . $pdfFilePath);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>AcademiXOnline</title>
    <link rel="stylesheet" href="css/certificate.css">
  <script src="js/certificate.js"> </script>
</head>
<body>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
  <h1>Generate Certificate</h1>
    <fieldset style="width:20%">
        
        <form action="" method="POST" novalidate>
            <label for="student_name">Student Name:</label>
            <input type="text" name="student_name" value="<?php echo isset($_GET['studentName']) ? $_GET['studentName'] : ''; ?>" readonly><br><br>

            <label for="percentage">Percentage:</label>
            <input type="text" name="percentage" value="<?php echo isset($_GET['percentage']) ? $_GET['percentage'] : ''; ?>" readonly><br><br>

            <label for="signature">Your Signature:</label>
            <input type="text" name="signature" ><br><br>

            <input type="submit" value="Generate Certificate">
        </form>
    </fieldset><br>
    <button class="backButton" onclick="redirectToTrack();return false;">Back</button>
    
  </center>
  <?php include 'footer.php'; ?>
   
</body>
</html>
