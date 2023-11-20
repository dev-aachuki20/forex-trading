<?php
  namespace App\Traits;
  use Illuminate\Support\Str;

    trait Sluggable
    {
        public function generateSlug($string)
        {
            return strtolower(preg_replace(
                ['/([^\w\s])+/', '/\s+/u'],
                ['', '-'],
                $string
            ));

            // return Str::slug($string);

        }
    }