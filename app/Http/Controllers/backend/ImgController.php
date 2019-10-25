<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Image;
use App\EventService\Events\ImageEvent;
use Auth;


class ImgController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('backend/img', [
            'images' => $images,
            'name' => Auth::user()->name
        ]);
    }

    public function create(Request $request)
    {
        // $image = new images;
        $path = public_path() . '\img\\';
        // $validator = Validator::make($request->all(), $rules, $messages);

        if (!file_exists('img')) {
            mkdir('img', 0755, true);
        }

        if ($request->hasFile('image_file')) {
            event(new ImageEvent($request));

            $file = $request->file('image_file');


            $path = public_path() . '\img\\';
            $fileName = $file->getClientOriginalName();
            $image = Image::where('image_path', $path . $fileName)->first();
            $images = Image::all();
            // return  $image;
            if (is_file($path . $fileName) || $image !== null) {
                return view('backend/img', [
                    'msgs' => '檔案已存在',
                    'images' => $images
                ]);
            } else {
                // $file->move($path, $fileName);
                $imSize = getimagesize($file);
                $imX = $imSize[0];
                $imY = $imSize[1];

                if ($imX > $imY) {
                    $imX = $imY;
                } else {
                    $imY = $imX;
                }
                // $newIm = imagecreatetruecolor($imX, $imY); //代表了一幅大小为 $imX和 $imY的黑色图像
                $newIm = imagecreatetruecolor(600, 600); //代表了一幅大小为 $imX和 $imY的黑色图像


                $source = imagecreatefromjpeg($file); //从给定的文件名取得的图像

                // ImageCopyResampled($newIm, $source, 0, 0, 0, 0, $imX, $imY, $imSize[0], $imSize[1]); //重采样拷贝部分图像并调整大小
                ImageCopyResampled($newIm, $source, 0, 0, 0, 0, 600, 600, $imSize[0], $imSize[1]); //重采样拷贝部分图像并调整大小

                imagejpeg($newIm, $path . $fileName);
                Image::create(['image_path' => $path . $fileName, 'publish' => $request->publish]);
                // return redirect()->route('admin.img');
                return back();
            }
        }
    }

    public function delete(Request $request, Image $image)
    {
        $image->delete();
        unlink($image->image_path);
        return redirect()->route('admin.img');
    }

    public function update(Request $request, Image $image)
    {
        $publish = $request->publish;
        $image->publish = $publish;
        $image->save();

        return $image;
    }
}
