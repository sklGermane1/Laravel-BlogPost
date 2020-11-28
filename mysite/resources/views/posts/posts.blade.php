@extends("base")
@section("content")
<div class="container">
   
   {{-- <h1 class="text-center mt-3">Post by {{ $post->user->username }} {{}} times and received {{}} likes</h1> --}}
    @foreach($posts as $post)
 
    <hr />
    <x-post :post="$post" />
    <small>{{ $posts->links() }}</small>
    @endforeach
</div>
@endsection()