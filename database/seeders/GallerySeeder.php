<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Gallery\Models\Gallery;
use Botble\Gallery\Models\GalleryMeta;
use Botble\Slug\Facades\SlugHelper;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Str;

class GallerySeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('galleries');

        Gallery::query()->truncate();
        GalleryMeta::query()->truncate();

        $galleries = [
            'Perfect',
            'New Day',
            'Happy Day',
            'Nature',
            'Morning',
            'Photography',
        ];

        $images = [];

        $faker = $this->fake();

        foreach ($faker->randomElements(range(1, 6), rand(3, 6)) as $i) {
            $images[] = [
                'img' => "galleries/$i.jpg",
                'description' => $faker->realText(),
            ];
        }

        foreach ($galleries as $index => $item) {
            $gallery = Gallery::query()->create([
                'user_id' => 1,
                'name' => $item,
                'description' => $faker->realText(),
                'image' => 'galleries/' . ($index + 1) . '.jpg',
                'is_featured' => true,
            ]);

            Slug::query()->create([
                'reference_type' => Gallery::class,
                'reference_id' => $gallery->id,
                'key' => Str::slug($gallery->name),
                'prefix' => SlugHelper::getPrefix(Gallery::class),
            ]);

            GalleryMeta::query()->create([
                'images' => $images,
                'reference_id' => $gallery->id,
                'reference_type' => Gallery::class,
            ]);
        }
    }
}
