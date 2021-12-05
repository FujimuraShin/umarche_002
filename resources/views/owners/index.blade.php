{{--
001_エロクアント
    @foreach($e_all as $e_owner)
        {{ $e_owner-> name }}               
        {{ $e_owner->created_at->diffForHumans() }}
    @endforeach
<br/>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>

 002_クエリビルダ
     @foreach($q_get as $q_owner)
        {{ $q_owner->name }}              
        {{ $q_owner->created_at }}
     @endforeach
--}}

    <x-guest-layout>
   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オーナ一覧
        </h2>
<a href="http://127.0.0.1:8000/shops/index">店舗情報</a>
<br/><br/>    

<a href="http://127.0.0.1:8000/shops/edit/2">店舗情報-編集</a>
<br/><br/>

<a href="{{route('expired-owners.index')}}">期限切れオーナ一覧</a>
  

<section class="text-gray-600 body-font">
<div class="container px-5　mx-auto">
  <x-flash-message status="session('status')"/>
<div class="flex justify-end mb-4" >
  <button onclick="location.href='{{route('owners.create')}}'" class=" text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded text-lg">新規登録する</button>
</div>    
    <div class="lg:w-2/3 0w-full mx-auto overflow-auto">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">制作日</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($owners as $owner)
          <tr>
            <td class="px-4 py-3">{{ $owner-> name }}  </td>
            <td class="px-4 py-3">{{ $owner-> email }}  </td>(
            <td class="px-4 py-3">{{ $owner-> created_at->diffForHumans() }}  </td>
            <td class="px-4 py-3">
              <button onclick="location.href='{{route('owners.edit',['owner'=>$owner->id])}}'" type="submit" class=" text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded">編集する</button>
            </td>
            <form id="delete_{{$owner->id}}" method="post" action="{{route('owners.destroy',['owner'=>$owner->id])}}">
              @csrf 
              @method('delete')
              <td class="px-4 py-3">
                <a href="#" data-id="{{$owner->id}}" onclick="deletePost(this)" type="submit" class=" text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded">削除する</a>
              </td>
            </form>
          </tr>
        @endforeach 
        </tbody>
      </table>

      {{ $owners->links() }}
    </div>
  </div>
</section>

<script>
  function deletePost(e){
    'use strict';
    if(confirm('本当に削除してもいいですか？')){
      document.getElementById('delete_'+e.dataset.id).submit();
    }
  }
</script>

</x-guest-layout>

  