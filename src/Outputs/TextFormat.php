<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class TextFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        
        $output = "Title: " . $profile->getTitle() . PHP_EOL;
        $output .= "Full Name: " . $profile->getName() . PHP_EOL;
        $output .= "Story: " . PHP_EOL . $profile->getStory() . PHP_EOL;
        $output .= "Image Path (for reference): " . $profile->getImagePath() . PHP_EOL;
        $this->response = $output;

    }

    public function render()
    {
        header('Content-Type: text');
        return $this->response;
    }
}