<?php
namespace Iantoo\LaravelExcuses;

class Excuse
{
    protected $excuses = [
        'Work' => [
            "Power went out in my neighborhood",
            "My computer crashed just as I was saving my work",
            "The traffic was horrible"

        ],
        'school' => [
            "The dog ate my homework",
            "I thought the assignment was due next week",
            "My alarm didn't go off."
        ],
        'Home' => [
            "The kids wouldn't go to bed.",
            "I had to fix a plumbing emergency",
            "I lost track of time while cooking dinner."
        ]
    ];


    public function getRandomExcuse( $category = 'Work') {
        if(!array_key_exists($category, $this->excuses)){
            $category = "work";
        }

        $excuses = $this->excuses[$category];

        return $excuses[array_rand($excuses)];
    }
}