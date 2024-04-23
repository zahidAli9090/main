<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;

class DatabaseSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->prepareRun();

        $this->call([
            LanguageSeeder::class,
            UserSeeder::class,
            CurrencySeeder::class,
            SettingSeeder::class,
            BlogSeeder::class,
            PageSeeder::class,
            ThemeOptionSeeder::class,
            SimpleSliderSeeder::class,
            WidgetSeeder::class,
            AdsSeeder::class,
            ShippingSeeder::class,
            BrandSeeder::class,
            ProductCategorySeeder::class,
            ProductAttributeSeeder::class,
            ProductTagSeeder::class,
            ProductCollectionSeeder::class,
            ProductLabelSeeder::class,
            ProductOptionSeeder::class,
            TaxSeeder::class,
            FaqSeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            ReviewSeeder::class,
            OrderEcommerceSeeder::class,
            FlashSaleSeeder::class,
            MenuSeeder::class,
            GallerySeeder::class,
            TeamSeeder::class,
            TestimonialSeeder::class,
        ]);

        $this->finished();
    }
}
