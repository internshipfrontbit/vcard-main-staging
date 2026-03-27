<?php

namespace App\Repositories;

use App\Models\WhatsappStore;
use App\Models\WpStoreTemplate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\BaseRepository;
use Database\Seeders\WhatsAppStoreTemplatesSeeder;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class WhatsappStoreRepository extends BaseRepository
{
    public $fieldSearchable = [
        'store_name',
    ];

    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }
    public function model()
    {
        return WhatsappStore::class;
    }

    public function store($input)
    {
        // $input['url_alias'] = str_replace(' ', '-', strtolower($input['store_name']));
        $input['template_id'] = WpStoreTemplate::first()->id;
        
        if (WhatsappStore::where('url_alias', $input['url_alias'])->exists()) {
            throw new UnprocessableEntityHttpException('The generated URL alias already exists. Please change the store name.');
        }
        
        $whatsappStore = WhatsappStore::create($input);

        if (isset($input['logo']) && !empty($input['logo'])) {
            $whatsappStore->addMedia($input['logo'])->toMediaCollection(
                WhatsappStore::LOGO,
                config('app.media_disc')
            );
        }
        if (isset($input['cover_img']) && !empty($input['cover_img'])) {
            $whatsappStore->addMedia($input['cover_img'])->toMediaCollection(WhatsappStore::COVER_IMAGE, config('app.media_disc'));
        }
        
        if (isset($input['cover_video']) && !empty($input['cover_video'])) {
            $whatsappStore->addMedia($input['cover_video'])->toMediaCollection(
                WhatsappStore::COVER_VIDEO,
                config('app.media_disc')
            );
        }

        return $whatsappStore;
    }

    public function update($whatsappStore, $input)
    {
        try {
            DB::beginTransaction();
            $whatsappStore->update($input);

            if (isset($input['logo']) && !empty($input['logo'])) {
                $whatsappStore->clearMediaCollection(WhatsappStore::LOGO);
                $whatsappStore->addMedia($input['logo'])->toMediaCollection(
                    WhatsappStore::LOGO,
                    config('app.media_disc')
                );
            }
            if (isset($input['cover_img']) && !empty($input['cover_img'])) {
                $whatsappStore->clearMediaCollection(WhatsappStore::COVER_IMAGE);
                $whatsappStore->addMedia($input['cover_img'])->toMediaCollection(WhatsappStore::COVER_IMAGE, config('app.media_disc'));
            }
            
            if (isset($input['cover_video']) && !empty($input['cover_video'])) {
                $whatsappStore->clearMediaCollection(WhatsappStore::COVER_VIDEO);
                $whatsappStore->addMedia($input['cover_video'])->toMediaCollection(
                    WhatsappStore::COVER_VIDEO,
                    config('app.media_disc')
                );
            }

            DB::commit();

            return $whatsappStore;
            
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
