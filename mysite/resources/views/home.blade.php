@extends("base")
@section("content")
<div class="container">
    @if(session()->has("message"))
    <div class="alert alert-success mt-3">
        {{session()->get("message")}}
        {{session()->forget("message")}}
    </div>
    @endif
    <h1 class="text-center mt-3">Posts</h1>
    <hr />
    @if ($posts->count())
    @foreach ($posts as $post)
    <x-post :post="$post" />
    @endforeach
    <small>{{ $posts->links() }}</small>
    
    @else 
    <div class="card shadow-lg bg-white rounded mt-5 mb-5">
        <div class="card-body">
        <p class="card-text">There are no posts</p>
        </div>
    </div>
    @endif
</div>
@endsection()