@extends("base")
@section("content")
<div class="container">
    <h1 class="text-center mt-3">Posts</h1>
    <hr />
    @if ($posts->count())
    @foreach ($posts as $post)
    <div class="card shadow-lg bg-white rounded mt-5 mb-5">
        <div class="card-body">
        <h5 class="card-title d-flex">{{ $post->title }} <span class="ml-3">by {{ $post->user->username}}</span> <span class="ml-auto text-muted">{{ $post->created_at->diffForHumans() }}</span></h5>
        <p class="card-text">{{ $post->content }}</p>
        <div class="d-flex">
                <form class="ml-auto" action="{{ route('delete-post',$post) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="form-group">
                        <button class="btn btn-outline-danger">Delete</button>
                    </div>
                </form>
              
             
                    <a href="{{route('edit-post',$post )}}" class="btn btn-outline-info ml-2">Edit</a>
            
        </div>
        </div>

    </div>
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