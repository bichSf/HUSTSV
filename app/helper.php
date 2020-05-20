<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

if (!function_exists('saveImageInFolder')) {

    /**
     * Save image
     *
     * @param UploadedFile $image
     * @param $folderName
     * @param bool $update
     * @param null $imageName
     * @return array|null
     */
    function saveImageInFolder(UploadedFile $image, $folderName, $update = false, $imageName = null)
    {
        try {
            $imageName = $update ? $imageName : $image->hashName();
            Storage::disk('public')->put('/'.$folderName.'/', $image);
            $imageResize = resizeImage(getimagesize($image));
            Image::make($image->path())->resize($imageResize[FLAG_ZERO], $imageResize[FLAG_ONE])
                ->save(storage_path('/app/public/' . $folderName . '/' . THUMBNAIL_IMAGE_FIRST_NAME . $imageName));
            return [
                'avatar' => $imageName,
                'avatar_thumbnail' => THUMBNAIL_IMAGE_FIRST_NAME . $imageName
            ];
        } catch (\Exception $exception) {
            report($exception);
            return null;
        }
    }
}

if (!function_exists('resizeImage')) {

    /**
     * Resize avatar
     *
     * @param array $imageSize
     * @return array
     */
    function resizeImage(array $imageSize)
    {
        do {
            $imageSize[FLAG_ZERO] = $imageSize[FLAG_ZERO] * COEFFICIENT_RESIZE;
            $imageSize[FLAG_ONE] = $imageSize[FLAG_ONE] * COEFFICIENT_RESIZE;
        } while ($imageSize[FLAG_ZERO] > 1000 || $imageSize[FLAG_ONE] > 1000);

        return $imageSize;
    }
}

if (!function_exists('removeImagesInFolder')) {

    /**
     * @param $path
     * @param $filename
     */
    function removeImagesInFolder($path, $filename)
    {
        if ($path && $filename) {
            Storage::delete($path . '/' . $filename);
            Storage::delete($path . '/' . THUMBNAIL_IMAGE_FIRST_NAME . $filename);
        }
    }
}

if (!function_exists('convertStringToNumber')) {

    /**
     * get decade
     *
     * @param date-time $date
     * @return false|int|string
     */
    function convertStringToNumber($string)
    {
        if(!$string || $string == "") {
            return 0;
        }
        return str_replace(',', '', $string);
    }
}

if (!function_exists('dateYear')) {

    /**
     * date year to 1950 from date year current
     *
     * @return array
     */
    function dateYear()
    {
        return range(DATE_YEAR_MIN, date('Y'));
    }
}
