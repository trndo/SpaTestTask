<?php


namespace App\Http\Services\UploadingFileService;

use Illuminate\Http\UploadedFile;

interface UploadingFileInterface
{
    /**
     * Uploading file and moving it to the public/uploads dir
     *
     * @param UploadedFile|null $file
     * @param string $folder
     * @return string|null
     */
    public function uploadFile(?UploadedFile $file, string $folder = '/uploads'): ?string ;
}
