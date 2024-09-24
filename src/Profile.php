<?php

namespace App;

class Profile
{
    private $title;
    private $name;
    private $story;
    private $image;

    public function __construct($data = null)
    {
        // Map the data to the class properties
        if (isset($data)) {
            $this->title = $data['title'];
            $this->name = $data['name'];
            $this->story = $data['story'];
            $this->image = $data['image'];
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStory()
    {
        return $this->story;
    }

    public function getImagePath()
    {
        return $this->image;
    }

    public function displayProfile()
    {
        return [
            'title' => $this->getTitle(),
            'name' => $this->getName(),
            'story' => $this->getStory(),
            'image' => $this->getImagePath()
        ];
    }
}
