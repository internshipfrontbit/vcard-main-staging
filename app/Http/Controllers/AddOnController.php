<?php

namespace App\Http\Controllers;

use App\Models\AddOn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Facades\File;
use App\Support\UploadSecurity;

class AddOnController extends AppBaseController
{
    public function index()
    {
        \Artisan::call('migrate', ['--force' => true]);

        return view('add-on.index');
    }

    public function extractZip(Request $request)
    {
        if (! config('upload-security.allow_addon_zip_uploads')) {
            return $this->sendError('Add-on ZIP uploads are disabled.');
        }

        $request->validate([
            'file' => 'required|file|mimes:zip|max:' . config('upload-security.max_size_kb.archive', 25600)
        ]);

        $file = $request->file('file');
        if ($message = UploadSecurity::validateZipArchive($file->getRealPath())) {
            return $this->sendError($message);
        }

        $filePathInfo = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        if (! preg_match('/^[A-Za-z0-9_-]+$/', $filePathInfo)) {
            return $this->sendError('The module folder name is invalid.');
        }

        $extractionPath = base_path('Modules/');
        $moduleFolder = $extractionPath . $filePathInfo;

        if (is_dir($moduleFolder)) {
            return $this->sendError(__('messages.addon.module_folder_already_exists'));
        }

        $isExistFiles = [
            $filePathInfo . '/' . 'composer.json',
            $filePathInfo . '/' . 'Providers/RouteServiceProvider.php'
        ];
        $zip = new ZipArchive;

        if ($zip->open($file) === TRUE) {
            $fileNames = [];
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $fileNames[] = $zip->getNameIndex($i);
            }

            $checkFiles = [];
            foreach ($isExistFiles as $isExistFile) {
                if (!in_array($isExistFile, $fileNames)) {
                    $checkFiles[] = $isExistFile;
                }
            }

            $zip->close();

            if (!empty($checkFiles)) {
                return $this->sendError(__('messages.addon.zip_required_file'));
            }

            if ($zip->open($file) === TRUE) {
                $zip->extractTo($extractionPath);
                $zip->close();

                $addOn = AddOn::updateOrCreate([
                    'name' => $filePathInfo,
                ]);

                $content = file_get_contents(base_path("modules_statuses.json"));
                $content = json_decode($content, true);
                $content[$filePathInfo] = true;
                file_put_contents(base_path("modules_statuses.json"), json_encode($content));

            } else {
                return $this->sendError(__('messages.addon.failed_to_extraction'));
            }

            sleep(2);

            return $this->sendSuccess(__('messages.addon.addon_uploaded_successfully'));
        } else {
            return $this->sendError(__('messages.addon.failed_to_open'));
        }
    }

    public function update($id)
    {
        $addOnModule = AddOn::find($id);

        if (!$addOnModule) {
            return $this->sendError(__('messages.addon.module_not_found'));
        }

        $addOnModule->status = !$addOnModule->status;

        $addOnModule->save();

        return $this->sendSuccess(__('messages.addon.module_status_updated_success'));
    }

    public function destroy($id)
    {
        $addOnModule = AddOn::find($id);
        if ($addOnModule) {
            return $this->sendError(__('messages.placeholder.default_module_can_not_be_delete'));
        }

        $modulePath = base_path('Modules/' . $addOnModule->name);

        if (File::exists($modulePath)) {
            File::deleteDirectory($modulePath);
        }

        $addOnModule->delete();

        return response()->json(['success' => __('messages.common.deleted_successfully')]);
    }
}