<?php

namespace Botble\Gallery;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Gallery\Models\GalleryMeta;
use Botble\Language\Facades\Language;
use Botble\LanguageAdvanced\Supports\LanguageAdvancedManager;
use Botble\Page\Models\Page;
use Botble\Theme\Facades\Theme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GallerySupport
{
    public function registerModule(string|array $model): self
    {
        if (! is_array($model)) {
            $model = [$model];
        }

        config([
            'plugins.gallery.general.supported' => array_merge($this->getSupportedModules(), $model),
        ]);

        return $this;
    }

    public function getSupportedModules(): array
    {
        return config('plugins.gallery.general.supported', []);
    }

    public function removeModule(string|array $model): self
    {
        $models = $this->getSupportedModules();

        foreach ($this->getSupportedModules() as $key => $item) {
            if ($item == $model) {
                Arr::forget($models, $key);

                break;
            }
        }

        config(['plugins.gallery.general.supported' => $models]);

        return $this;
    }

    public function saveGallery(Request $request, ?Model $data): void
    {
        if ($data && in_array(get_class($data), $this->getSupportedModules()) && $request->has('gallery')) {
            $meta = GalleryMeta::query()
                ->where([
                    'reference_id' => $data->getKey(),
                    'reference_type' => get_class($data),
                ])
                ->first();

            $gallery = (string)$request->input('gallery');

            if (
                defined('LANGUAGE_MODULE_SCREEN_NAME') &&
                ($currentLanguage = Language::getRefLang()) &&
                $currentLanguage != Language::getDefaultLocaleCode()
            ) {
                $formRequest = new Request();
                $formRequest->replace([
                    'language' => $request->input('language'),
                    Language::refLangKey() => $currentLanguage,
                    'images' => $gallery,
                ]);

                if (! $meta) {
                    $meta = new GalleryMeta();
                    $meta->reference_id = $data->getKey();
                    $meta->reference_type = get_class($data);
                    $meta->images = json_decode($gallery, true);
                    $meta->save();
                }

                LanguageAdvancedManager::save($meta, $formRequest);
            } else {
                if (empty($meta->images)) {
                    $this->deleteGallery($data);
                }

                if (! $meta) {
                    $meta = new GalleryMeta();
                    $meta->reference_id = $data->getKey();
                    $meta->reference_type = get_class($data);
                }

                $meta->images = json_decode($gallery, true);
                $meta->save();
            }
        }
    }

    public function deleteGallery(?Model $data): bool
    {
        if (in_array(get_class($data), $this->getSupportedModules())) {
            GalleryMeta::query()
                ->where([
                    'reference_id' => $data->getKey(),
                    'reference_type' => get_class($data),
                ])
                ->delete();
        }

        return true;
    }

    public function registerAssets(): self
    {
        Theme::asset()
            ->usePath(false)
            ->add('lightgallery-css', asset('vendor/core/plugins/gallery/libraries/lightgallery/css/lightgallery.min.css'), [], [], '1.0.0')
            ->add('gallery-css', asset('vendor/core/plugins/gallery/css/gallery.css'), [], [], '1.0.0');

        Theme::asset()
            ->container('footer')
            ->usePath(false)
            ->add(
                'lightgallery-js',
                asset('vendor/core/plugins/gallery/libraries/lightgallery/js/lightgallery.min.js'),
                ['jquery'],
                [],
                '1.0.0'
            )
            ->add(
                'imagesloaded',
                asset('vendor/core/plugins/gallery/js/imagesloaded.pkgd.min.js'),
                ['jquery'],
                [],
                '1.0.0'
            )
            ->add('masonry', asset('vendor/core/plugins/gallery/js/masonry.pkgd.min.js'), ['jquery'], [], '1.0.0')
            ->add('gallery-js', asset('vendor/core/plugins/gallery/js/gallery.js'), ['jquery'], [], '1.0.0');

        return $this;
    }

    public function getGalleriesPageUrl(): string|null
    {
        $pageId = theme_option('galleries_page_id');

        if (! $pageId) {
            return route('public.galleries');
        }

        $page = $this->getPage($pageId);

        return $page ? $page->url : route('public.galleries');
    }

    protected function getPage(int|string|null $pageId): ?Page
    {
        if (! $pageId) {
            return null;
        }

        return Page::where([
                'id' => $pageId,
                'status' => BaseStatusEnum::PUBLISHED,
            ])
            ->select(['id', 'name'])
            ->with(['slugable'])
            ->first();
    }
}
