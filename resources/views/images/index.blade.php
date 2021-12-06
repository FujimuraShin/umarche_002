

    <x-guest-layout>
   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Image画像情報
        </h2>

<section class="text-gray-600 body-font">
<div class="container px-5　mx-auto">
  
    <div class="lg:w-2/3 0w-full mx-auto overflow-auto">
    <div class="flex justify-end mb-4" >
      <button onclick="location.href='{{route('images.create')}}'" class=" text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded text-lg">画像新規登録する</button>
    </div>  
    @foreach($images as $image)
                  <div class="w-1/4 p-4">
                    <a href="{{route('images.edit',['image'=>$image->id])}}">
                      <div class="border rounded-md p-4">
                        
                          <br/>
                          <div class="text-xl">{{ $image->title }}</div>

                          <!--サムネイル-->
                          <x-thumbnail :filename="$shop->filename" :type="products"/>
                    </a>
                </div>
                  @endforeach

      
    </div>
  </div>
</section>


</x-guest-layout>

  