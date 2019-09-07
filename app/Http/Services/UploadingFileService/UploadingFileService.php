<?php


namespace App\Http\Services\UploadingFileService;

use Illuminate\Http\UploadedFile;

class UploadingFileService implements UploadingFileInterface
{

    /**
     * Upload file and move it to the public/uploads dir
     *
     * @param UploadedFile|null $file
     * @param string $folder
     * @return string|null
     */
    public function uploadFile(?UploadedFile $file, string $folder = '/uploads'): ?string
    {
        if ($file) {

            $newName = $this->generateNewFileName($file->getClientOriginalName(), $file->getClientOriginalExtension());
            $file->move(public_path().$folder, $newName);

            return $newName;
        }

        return null;
    }


    /**
     * Generate new file name
     *
     * @param string $originalName
     * @param string $extension
     * @return string
     */
    private function generateNewFileName(string $originalName, string $extension): string
    {
        return \uniqid(\md5($originalName.$extension)) . '.' . $extension;
    }
}
