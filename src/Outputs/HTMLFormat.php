<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        // Assuming your CSS is in the "public" directory of your web app
        $output = '<!DOCTYPE html>';
        $output .= '<html lang="en">';
        $output .= '<head>';
        $output .= '<meta charset="UTF-8">';
        $output .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        $output .= '<title>' . $profile->getTitle() . '</title>';
        
        // Link to your external CSS file (adjust the path based on where you placed the CSS)
        $output .= '<link rel="stylesheet" href="../src/styles.css">'; 
        
        $output .= '</head>';
        $output .= '<body>';

        // Main content section
        $output .= '<section class="profile-section">';
        $output .= '<h1>About the Founder: ' . $profile->getName() . '</h1>';
        
        // Profile Image
        $output .= '<div class="profile-image">';
        $output .= '<img src="../assets/founder.jpg" alt="Image of ' . $profile->getName() . '">';
        $output .= '</div>';

        // Founder Story
        $output .= '<div class="founder-story">';
        $output .= '<h2>Story</h2>';
        $output .= '<p>' . $profile->getStory() . '</p>';
        $output .= '</div>';

        $output .= '</section>';
        $output .= '</body>';
        $output .= '</html>';

        $this->response = $output;
    }

    public function render()
    {
        return $this->response;
    }
}