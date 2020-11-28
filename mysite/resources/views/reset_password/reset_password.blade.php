@extends("base")

@section("content")
<div class="container">
    <h1 class="text-center mt-5">Reset Password</h1>
        <form action="{{ route('reset_password',$token) }}" method="POST">
        @csrf 
        <div class="form-group">
            <input 
            value="{{ old("password") }}" 
            placeholder="password" 
            class="form-control @error("password") is-invalid @enderror" 
            name="password" 
            id="password"
            type="password" />
            @error("password")
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            <input 
            value="{{ old("password_confirmation") }}" 
            placeholder="password confirmation " 
            class="form-control mt-2 @error("password_confirmation") is-invalid @enderror" 
            name="password_confirmation" 
            id="password_confirmation"
            type="password" />
            @error("password_confirmation")
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <button class="btn btn-outline-dark" type="submit">Reset Password</button>
        </div>
    </form>
</div>
@endsection