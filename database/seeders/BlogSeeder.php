<?php

namespace Database\Seeders;

use Botble\ACL\Models\User;
use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Slug\Facades\SlugHelper;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('blog');

        Post::query()->truncate();
        Category::query()->truncate();
        Tag::query()->truncate();

        $categories = [
            [
                'name' => 'Ecommerce',
            ],
            [
                'name' => 'Fashion',
            ],
            [
                'name' => 'Electronic',
            ],
            [
                'name' => 'Commercial',
            ],
        ];

        foreach ($categories as $index => $item) {
            $category = $this->createCategory(Arr::except($item, 'children'), 0, $index != 0);

            if (Arr::has($item, 'children')) {
                foreach (Arr::get($item, 'children', []) as $child) {
                    $this->createCategory($child, $category->id);
                }
            }
        }

        $tags = [
            [
                'name' => 'General',
            ],
            [
                'name' => 'Design',
            ],
            [
                'name' => 'Fashion',
            ],
            [
                'name' => 'Branding',
            ],
            [
                'name' => 'Modern',
            ],
        ];

        foreach ($tags as $item) {
            $item['author_id'] = 1;
            $item['author_type'] = User::class;
            $tag = Tag::query()->create($item);

            Slug::query()->create([
                'reference_type' => Tag::class,
                'reference_id' => $tag->id,
                'key' => Str::slug($tag->name),
                'prefix' => SlugHelper::getPrefix(Tag::class),
            ]);
        }

        $posts = [
            [
                'name' => '4 Expert Tips On How To Choose The Right Men’s Wallet',
            ],
            [
                'name' => 'Sexy Clutches: How to Buy & Wear a Designer Clutch Bag',
            ],
            [
                'name' => 'The Top 2020 Handbag Trends to Know',
            ],
            [
                'name' => 'How to Match the Color of Your Handbag With an Outfit',
            ],
            [
                'name' => 'How to Care for Leather Bags',
            ],
            [
                'name' => "We're Crushing Hard on Summer's 10 Biggest Bag Trends",
            ],
            [
                'name' => 'Essential Qualities of Highly Successful Music',
            ],
            [
                'name' => '9 Things I Love About Shaving My Head',
            ],
            [
                'name' => 'Why Teamwork Really Makes The Dream Work',
            ],
            [
                'name' => 'The World Caters to Average People',
            ],
            [
                'name' => 'The litigants on the screen are not actors',
            ],
        ];

        $faker = $this->fake();

        foreach ($posts as $index => $item) {
            $post = Post::query()->create(array_merge($item, [
                'author_id' => 1,
                'author_type' => User::class,
                'views' => $faker->numberBetween(100, 2500),
                'is_featured' => $faker->boolean(),
                'image' => 'blog/' . ($index + 1) . '.jpg',
                'description' => $faker->realText(),
                'content' => str_replace(url(''), '', File::get(database_path('seeders/contents/post.html'))),
            ]));

            $post->categories()->sync([
                $faker->numberBetween(1, 2),
                $faker->numberBetween(3, 4),
            ]);

            $post->tags()->sync([1, 2, 3, 4, 5]);

            Slug::query()->create([
                'reference_type' => Post::class,
                'reference_id' => $post->id,
                'key' => Str::slug($post->name),
                'prefix' => SlugHelper::getPrefix(Post::class),
            ]);
        }
    }

    protected function createCategory(array $item, int $parentId = 0, bool $isFeatured = false): Category
    {
        $category = Category::query()->create(array_merge($item, [
            'description' => $this->fake()->text(),
            'author_id' => 1,
            'parent_id' => $parentId,
            'is_featured' => $isFeatured,
        ]));

        Slug::query()->create([
            'reference_type' => Category::class,
            'reference_id' => $category->id,
            'key' => Str::slug($category->name),
            'prefix' => SlugHelper::getPrefix(Category::class),
        ]);

        return $category;
    }
}
