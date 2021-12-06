<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Http\Requests\UploadImageRequest;

class ImageController extends Controller
{
    //
    public function index(){

        //$owner_id=Auth::id();
        //$shops=Shop::where('owner_id',$owner_id)->get();
        ///phpinfo();

        $images=Image::all();

        return view('images.index',compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(UploadImageRequest $request){

        dd($request);
    }
}
