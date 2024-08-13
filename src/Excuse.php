<?php
namespace Iantoo\LaravelExcuses;

class Excuse
{
    protected $fdefaultCategory;
    protected $excuses;

    public function __construct(){
        $this->excuses = config('excuses.excuses');
        $this->defaultCategory = config('excuses.default_category', 'Work');
    }

    public function getRandomExcuse( $category = null) {
        
        $category = $category ?? $this->defaultCategory;

        if(!array_key_exists($category, $this->excuses)){
            $category = $this->defaultCategory;
        }

        $excuses = $this->excuses[$category];

        return $excuses[array_rand($excuses)];
    }
}