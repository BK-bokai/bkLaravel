<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\backend\Image;


class ImgController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('backend/img', [
            'images' => $images
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


            $file = $request->file('image_file');
            $path = public_path() . '\img\\';
            $fileName = $file->getClientOriginalName();
            $image = Image::where('image_path', $path . $fileName)->orderBy('id', 'desc')->take(1)->get();
            $images = Image::all();
            if (is_file($path . $fileName) || array_key_exists("image_path", $image)) {
                return view('backend/img', [
                    'msgs' => '檔案已存在',
                    'images' => $images
                ]);
            } else {
                $file->move($path, $fileName);
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
        $publish=$request->publish;
        $image->publish=$publish;
        $image->save();

        return $image;
    }
}
