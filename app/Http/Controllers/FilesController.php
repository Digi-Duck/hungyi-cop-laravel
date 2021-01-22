<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FilesController extends Controller
{
    //上傳檔案
    public static function fileUpload($file, $dir)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }
        //取得檔案的副檔名
        $data = collect();
        $data->name = $file->getClientOriginalName();

        //檔案名稱會被重新命名
        $data->path = '/upload/' . $dir . '/' .  $data->name;
        //移動到指定路徑
        move_uploaded_file($file, public_path() . $data->path);
        //回傳 資料庫儲存用的路徑格式

        return $data;
    }

    //上傳圖片
    public static function imgUpload($file, $dir)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
        //移動到指定路徑
        $path = '/upload/' . $dir . '/' . $filename;
        move_uploaded_file($file, public_path() . $path);
        //回傳 資料庫儲存用的路徑格式
        return $path;
    }

    // 上傳裁剪圖片
    public static function imgCropper($base64, $path)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $path)) {
            mkdir('upload/' . $path);
        }

        $image_parts = explode(";base64,", $base64);
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = '/upload/' . $path . '/' . $imageName;

        file_put_contents(public_path() . $imageFullPath, $image_base64);

        return $imageFullPath;
    }

    // 壓縮上傳圖片，檔案/資料夾/寬/高/是否存原檔，返回path
    public static function imgZipUpload($file, $dir, $width, $height, $origin = True)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
        //檔案名稱會被重新命名
        $path = '/upload/' . $dir . '/small-' .  $filename;

        $new_img = Image::make($file->getRealPath())
            ->orientate()
            ->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        // save file with medium quality
        $new_img->save(public_path() . $path, 80);

        //移動到指定路徑
        if ($origin)
            move_uploaded_file($file, public_path() . '/upload/' . $dir . '/origin-' .  $filename);

        //回傳 資料庫儲存用的路徑格式
        return $path;
    }
    // 壓縮上傳圖片，檔案/資料夾/寬/高/是否存原檔，返回名稱跟path
    public static function specialUpload($file, $dir, $width, $height, $origin = True)
    {
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }
        //取得檔案的副檔名
        $data = collect();

        $extension = $file->getClientOriginalExtension();
        $data->name = explode('.' . $extension, $file->getClientOriginalName())[0];
        //檔案名稱會被重新命名
        $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
        //檔案名稱會被重新命名
        $data->path = '/upload/' . $dir . '/small-' .  $filename;

        $new_img = Image::make($file->getRealPath())
            ->orientate()
            ->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        // save file with medium quality
        $new_img->save(public_path() . $data->path, 80);

        //移動到指定路徑
        if ($origin)
            move_uploaded_file($file, public_path() . '/upload/' . $dir . '/origin-' .  $filename);

        //回傳 資料庫儲存用的路徑格式
        return $data;
    }

    // 刪除檔案
    public static function deleteUpload($url)
    {
        if (file_exists(public_path() . $url)) {
            File::delete(public_path() . $url);
        }
        return True;
    }
}
