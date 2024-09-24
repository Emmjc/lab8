<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;
use Fpdf\Fpdf;

class PDFFormat implements ProfileFormatter
{
    private $pdf;

    public function setData($profile)
    {
        $this->pdf = new Fpdf();
        $this->pdf->AddPage();
        
        // Set Title
        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(0, 10, $profile->getTitle(), 0, 1, 'C');

        // Add image (ensure the image path is valid)
        if (file_exists($profile->getImagePath())) {
            // Adjust size and position: x = 10, y = 20, width = 50
            $this->pdf->Image($profile->getImagePath(), 10, 20, 40);  
            $this->pdf->Ln(60);  // Move the cursor below the image to prevent overlap
        } else {
            $this->pdf->Cell(0, 10, 'Image not found.', 0, 1);
        }

        // Set Font for the body content
        $this->pdf->SetFont('Arial', '', 12);

        // Display founder's name
        $this->pdf->Cell(0, 10, 'Founder: ' . $profile->getName(), 0, 1);

        // Add story
        $this->pdf->MultiCell(0, 10, $profile->getStory());

        // Optionally add other details, such as image path
        $this->pdf->Ln();
        $this->pdf->Cell(0, 10, 'Image Path: ' . $profile->getImagePath(), 0, 1);
    }

    public function render()
    {
        // Output PDF to string (to save to file)
        return $this->pdf->Output();
    }
}
