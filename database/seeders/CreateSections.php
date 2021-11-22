<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;
use Illuminate\Support\Str;

class CreateSections extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
  
    {
        $sections = [
            [
                'title' => 'This is the first section',
                'image' => '',
                'featured_title' => 'headline',
                'label' => 'click here',
                'link' => '#',
                'description' => 1,
                'status' =>1,
                'bg_color' => '#ffff',
                'position' => 1,
            ],
            [
                'title' => 'This is the first section',
                'image' => '',
                'featured_title' => 'headline',
                'label' => 'click here',
                'link' => '#',
                'description' => 1,
                'status' =>1,
                'bg_color' => '#ffff',
                'position' => 2,
            ],
            [
                'title' => 'This is the first section',
                'image' => '',
                'featured_title' => 'headline',
                'label' => 'click here',
                'link' => '#',
                'description' => 1,
                'status' =>1,
                'bg_color' => '#ffff',
                'position' => 3,
            ],
            [
                'title' => 'This is the first section',
                'image' => '',
                'featured_title' => 'headline',
                'label' => 'click here',
                'link' => '#',
                'description' => 1,
                'status' =>1,
                'bg_color' => '#ffff',
                'position' => 4,
            ],
        ];
        Section::insert($sections);
    }

}