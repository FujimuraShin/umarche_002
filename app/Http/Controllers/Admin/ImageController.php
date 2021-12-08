<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Owner;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

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

        //dd($request);
        $imageFiles=$request->file('files');

        if(!is_null($imageFiles)){
            foreach($imageFiles as $imageFile){
                $fileNameToStore=ImageService::upload($imageFile,'products');

                //dd(Owner::is());

                Image::create([
                    'owner_id'=>2,
                    'filename'=>$fileNameToStore,
                ]);

            }
        }

        return redirect()
                ->route('images.index')
                ->with(['message'=>'商品画像を登録しました'
                ,'status'=>'info']);
    }

    public function edit(){
        $id=2;
        $image=Image::findOrFail($id);

        return view('images.edit',compact('image'));
    }

    public function update(Request $request,$id){

        $image=Image::findOrFail($id);
        $image->title=$request->title;

        $image->save();

        return redirect()->route('images.index',$image);
    }

    public function destroy($id)
    {
        
        $image=Image::findOrFail($id);

        $filePath='public/products/'.$image->filename;

        if(Storage::exists($filePath)){
            Storage::delete($filePath);
        }
        
        Image::findOrFail($id)->delete();//ソフトデリート

        return redirect()
        ->route('images.index')
        ->with(['message'=>'登録画像の削除しました',
                'status'=>'alert',
                 ]);
    }
}
