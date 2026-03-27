<?php

namespace App\Repositories;

use App\Models\VcardService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Yajra\DataTables\Exceptions\Exception;

class VcardServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
    ];

    /**
     * Return searchable fields
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return VcardService::class;
    }

    /**
     * @return mixed
     */
    public function store($input)
    {
        try {
            $serviceCount = VcardService::where('vcard_id', $input['vcard_id'])->count();

            if ($serviceCount >= 20) {
                throw new UnprocessableEntityHttpException('You can add a maximum of 20 services for this vCard.');
            }


            DB::beginTransaction();

            $vcardService = VcardService::create($input);

            if (isset($input['service_icon']) && !empty($input['service_icon'])) {
                // Get the first image from the array or the direct input
                $firstImage = is_array($input['service_icon']) ? reset($input['service_icon']) : $input['service_icon'];
            
                $vcardService->newAddMedia($firstImage)->toMediaCollection(
                    VcardService::SERVICES_PATH,
                    config('app.media_disc')
                );
            }

            DB::commit();

            return $vcardService;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @return Builder|Builder[]|Collection|Model
     */
    public function update($input, $id)
    {
        try {
            DB::beginTransaction();

            $vcardService = VcardService::findOrFail($id);
            $vcardService->update($input);

            if (isset($input['service_icon']) && !empty($input['service_icon'])) {
            // Delete existing media
            $vcardService->clearMediaCollection(VcardService::SERVICES_PATH);

            // Get the first image from the array or the direct input
            $firstImage = is_array($input['service_icon']) ? reset($input['service_icon']) : $input['service_icon'];

            $vcardService->newAddMedia($firstImage)->toMediaCollection(
                VcardService::SERVICES_PATH,
                config('app.media_disc')
            );
        }   

            DB::commit();

            return $vcardService;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
