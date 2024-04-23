<?php

namespace Database\Seeders;

use Botble\Base\Facades\MetaBox;
use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Post;
use Botble\Ecommerce\Models\Product;
use Botble\Language\Models\LanguageMeta;
use Botble\Menu\Facades\Menu;
use Botble\Menu\Models\Menu as MenuModel;
use Botble\Menu\Models\MenuLocation;
use Botble\Menu\Models\MenuNode;
use Botble\Page\Models\Page;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class MenuSeeder extends BaseSeeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Main menu',
                'location' => 'main-menu',
                'items' => [
                    [
                        'title' => 'Home',
                        'url' => '/',
                        'children' => [
                            [
                                'title' => 'Wooden Home',
                                'reference_type' => Page::class,
                                'reference_id' => 1,
                            ],
                            [
                                'title' => 'Fashion Home',
                                'reference_type' => Page::class,
                                'reference_id' => 2,
                            ],
                            [
                                'title' => 'Furniture Home',
                                'reference_type' => Page::class,
                                'reference_id' => 3,
                            ],
                            [
                                'title' => 'Cosmetics Home',
                                'reference_type' => Page::class,
                                'reference_id' => 4,
                            ],
                            [
                                'title' => 'Food Grocery',
                                'reference_type' => Page::class,
                                'reference_id' => 5,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Shop',
                        'url' => '/',
                        'children' => [
                            [
                                'title' => 'Shop Grid',
                                'url' => '/products',
                            ],
                            [
                                'title' => 'Shop List',
                                'url' => '/products?layout=list',
                            ],
                            [
                                'title' => 'Shop Detail',
                                'url' => Product::query()->inRandomOrder()->first()->url,
                            ],
                            [
                                'title' => 'Shop Location',
                                'reference_type' => Page::class,
                                'reference_id' => 10,
                            ],
                            [
                                'title' => 'Cart',
                                'url' => '/cart',
                            ],
                            [
                                'title' => 'Wishlist',
                                'url' => '/wishlist',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Pages',
                        'url' => '/',
                        'children' => [
                            [
                                'title' => 'About',
                                'reference_type' => Page::class,
                                'reference_id' => 7,
                            ],
                            [
                                'title' => 'Sign up',
                                'url' => '/register',
                            ],
                            [
                                'title' => 'Login',
                                'url' => '/login',
                            ],
                            [
                                'title' => '404 / Error',
                                'url' => url('/404'),
                            ],
                            [
                                'title' => 'Coming soon',
                                'reference_type' => Page::class,
                                'reference_id' => 9,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Blog',
                        'url' => '/',
                        'children' => [
                            [
                                'title' => 'Blog',
                                'reference_type' => Page::class,
                                'reference_id' => 6,
                            ],
                            [
                                'title' => 'Blog Detail',
                                'url' => Post::query()->first()->url,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Contact',
                        'reference_type' => Page::class,
                        'reference_id' => 8,
                    ],
                ],
            ],
            [
                'name' => 'Information',
                'location' => 'information',
                'items' => [
                    [
                        'title' => 'Custom Service',
                        'reference_type' => Page::class,
                        'reference_id' => 1,
                    ],
                    [
                        'title' => 'FAQs',
                        'reference_type' => Page::class,
                        'reference_id' => 1,
                    ],
                    [
                        'title' => 'Ordering Tracking',
                        'reference_type' => Page::class,
                        'reference_id' => 1,
                    ],
                    [
                        'title' => 'Contacts',
                        'reference_type' => Page::class,
                        'reference_id' => 1,
                    ],
                    [
                        'title' => 'Events',
                        'reference_type' => Page::class,
                        'reference_id' => 1,
                    ],
                ],
            ],
            [
                'name' => 'My Account',
                'location' => 'my-account',
                'items' => [
                    [
                        'title' => 'Delivery Information',
                        'reference_type' => Page::class,
                        'reference_id' => 1,
                    ],
                    [
                        'title' => 'Privacy Policy',
                        'reference_type' => Page::class,
                        'reference_id' => 1,
                    ],
                    [
                        'title' => 'Discount',
                        'reference_type' => Page::class,
                        'reference_id' => 1,
                    ],
                    [
                        'title' => 'Custom Service',
                        'reference_type' => Page::class,
                        'reference_id' => 1,
                    ],
                    [
                        'title' => 'Terms & Condition',
                        'reference_type' => Page::class,
                        'reference_id' => 1,
                    ],
                ],
            ],
            [
                'name' => 'Social Network',
                'location' => 'social-network',
                'items' => [
                    [
                        'title' => 'Facebook',
                        'icon_font' => 'fab fa-facebook',
                        'url' => '#',
                    ],
                    [
                        'title' => 'Dribble',
                        'icon_font' => 'fab fa-dribbble',
                        'url' => '#',
                    ],
                    [
                        'title' => 'Twitter',
                        'icon_font' => 'fab fa-twitter',
                        'url' => '#',
                    ],
                    [
                        'title' => 'Behance',
                        'icon_font' => 'fab fa-behance',
                        'url' => '#',
                    ],
                    [
                        'title' => 'Youtube',
                        'icon_font' => 'fab fa-youtube',
                        'url' => '#',
                    ],
                ],
            ],
        ];

        MenuModel::query()->truncate();
        MenuLocation::query()->truncate();
        MenuNode::query()->truncate();

        foreach ($menus as $index => $item) {
            $item['slug'] = Str::slug($item['name']);
            $this->saveMenu($item, 'en_US', $index);
        }

        Menu::clearCacheMenuItems();
    }

    protected function saveMenu(array $item, string $locale, int $index): void
    {
        $menu = MenuModel::query()->create(Arr::except($item, ['items', 'location']));

        if (isset($item['location'])) {
            $menuLocation = MenuLocation::query()->create([
                'menu_id' => $menu->id,
                'location' => $item['location'],
            ]);

            $originValue = LanguageMeta::query()->where([
                'reference_id' => $locale == 'en_US' ? 1 : 2,
                'reference_type' => MenuLocation::class,
            ])->value('lang_meta_origin');

            LanguageMeta::saveMetaData($menuLocation, $locale, $originValue);
        }

        foreach ($item['items'] as $menuNode) {
            $this->createMenuNode($index, $menuNode, $locale, $menu->id);
        }

        $originValue = null;

        if ($locale !== 'en_US') {
            $originValue = LanguageMeta::query()->where([
                'reference_id' => $index * 2 + 1,
                'reference_type' => MenuModel::class,
            ])->value('lang_meta_origin');
        }

        LanguageMeta::saveMetaData($menu, $locale, $originValue);
    }

    protected function createMenuNode(int $index, array $menuNode, string $locale, int|string $menuId, int|string $parentId = 0): void
    {
        $menuNode['menu_id'] = $menuId;
        $menuNode['parent_id'] = $parentId;

        if (isset($menuNode['url'])) {
            $menuNode['url'] = str_replace(url(''), '', $menuNode['url']);
        }

        if (Arr::has($menuNode, 'children')) {
            $children = $menuNode['children'];
            $menuNode['has_child'] = true;

            unset($menuNode['children']);
        } else {
            $children = [];
            $menuNode['has_child'] = false;
        }

        $createdNode = MenuNode::query()->create(Arr::except($menuNode, 'child_style'));

        if (Arr::has($menuNode, 'child_style')) {
            MetaBox::saveMetaBoxData($createdNode, 'child_style', Arr::get($menuNode, 'child_style'));
        }

        if ($children) {
            foreach ($children as $child) {
                $this->createMenuNode($index, $child, $locale, $menuId, $createdNode->id);
            }
        }
    }
}
