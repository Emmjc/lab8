<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class TextFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        // Building the output based on the FounderProfile class methods
        $output = "Title: " . $profile->getTitle() . PHP_EOL;
        $output .= "Full Name: " . $profile->getName() . PHP_EOL;
        $output .= "Story: " . PHP_EOL . $profile->getStory() . PHP_EOL;

        // Optionally include an image path (even though in text format we might not display it)
        $output .= "Image Path (for reference): " . $profile->getImagePath() . PHP_EOL;

        // Store the response for rendering later
        $this->response = $output;
    }

    public function render()
    {
        header('Content-Type: text');
        return $this->response;
    }
}