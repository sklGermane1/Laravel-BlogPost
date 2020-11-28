@extends("base")

@section("content")
<div class="container">
    <h1 class="text-center mt-5">Reset Password</h1>
        <form action="{{ route('reset_password_email') }}" method="POST">
        @csrf 
        <div class="form-group">
            <input 
            value="{{ old("email") }}" 
            placeholder="email" 
            class="form-control @error("email") is-invalid @enderror" 
            name="email" 
            id="email"
            type="email" />
            @error("email")
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <button class="btn btn-outline-dark" type="submit">send Email</button>
        </div>
    </form>
</div>
@endsection