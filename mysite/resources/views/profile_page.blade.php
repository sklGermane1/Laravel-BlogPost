@extends("base")

@section("content")
<div class="container">
    <h1 class="text-center">Profile from {{ $user->username }}</h1>
    <hr />
    <form action="{{ route('profile',['user'=>$user]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input class="form-control mt-3 mb-3 @error("username") is-invalid @enderror" value={{ $user->username }} placeholder="username" type="text" name="username" id="username" />
            @error("username") 
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror 
            <input class="form-control mt-3 mb-3 @error("email") is-invalid @enderror" value={{ $user->email }} placeholder="email" type="text" name="email" id="email" />
            @error("email") 
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror 
            <textarea class="form-control mt-3 mb-3  @error("bio") is-invalid @enderror" placeholder="bio" type="text" name="bio" id="bio"> @if($user->bio){{ $user->bio }}@endif </textarea>
            @error("bio") 
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror 
            <input class="form-control mt-3 mb-3"  @error("website") is-invalid @enderror @if($user->website)value={{ $user->website }}@endif placeholder="website" type="text" name="website" id="website" />
            @error("website") 
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror 
            <div class="custom-file">
                <label class="custom-file-label" for="customFile">Choose file</label> 
                <input type="file" class="custom-file-input  @error("image") is-invalid @enderror"name="image" id="customFile">
            </div>
            @error("image") 
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror 
        </div>
        <div>
            <button class="btn btn-outline-dark" type="submit">Update Profile</button>
        </div>
       
    </form>
</div>
@endsection