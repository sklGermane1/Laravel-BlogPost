@extends("base")

@section("content")
<div class="container">
    <h1 class="text-center">Profile from {{ $user->username }}</h1>
    <hr />
    <form action="{{ route('profile',['user'=>$user]) }}" method="POST">
        @csrf
        <div class="form-group">
            <input class="form-control mt-3 mb-3" value={{ $user->username }} placeholder="username" type="text" name="username" id="username" />
            <input class="form-control mt-3 mb-3" value={{ $user->email }} placeholder="email" type="text" name="email" id="email" />
            <textarea class="form-control mt-3 mb-3"placeholder="bio" type="text" name="bio" id="bio"> @if($user->bio){{ $user->bio }}@endif </textarea>
            <input class="form-control mt-3 mb-3" @if($user->website)value={{ $user->website }}@endif placeholder="website" type="text" name="website" id="website" />
          

        </div>
        <div>
            <button class="btn btn-outline-dark" type="submit">Update Profile</button>
        </div>
    </form>
</div>
@endsection