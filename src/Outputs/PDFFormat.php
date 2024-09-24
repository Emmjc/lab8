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
        

        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(0, 10, $profile->getTitle(), 0, 1, 'C');
        if (file_exists($profile->getImagePath())) {
            $this->pdf->Image($profile->getImagePath(), 10, 20, 40);  
            $this->pdf->Ln(60);
        } else {
            $this->pdf->Cell(0, 10, 'Image not found.', 0, 1);
        }

        // Set Font for the body content
        $this->pdf->SetFont('Arial', '', 12);

        // Display founder's name
        $this->pdf->Cell(0, 10, 'Founder: ' . $profile->getName(), 0, 1);

        // Add story
        $this->pdf->MultiCell(0, 10, $profile->getStory());

        $this->pdf->Ln();
        $this->pdf->Cell(0, 10, 'Image Path: ' . $profile->getImagePath(), 0, 1);
    }

    public function render()
    {
        return $this->pdf->Output();
    }
}
