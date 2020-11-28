@extends("base")

@section("content")
<div class="container">
    @if(session()->has("message"))
    <div class="alert alert-success mt-3">
        {{session()->get("message")}}
        {{session()->forget("message")}}
    </div>
    @endif

    <div class="d-flex">
        <div class="mx-auto card bg-white rounded mt-3 mb-5 p-5">
            <div>
            <form action="{{ route('login') }}" method="POST">    
                <legend class="text-center">Login</legend>
                <hr />
                @csrf 
                <div class="form-group">
                    <input 
                    value="{{ old("username") }}"
                    type="text"
                    class="form-control @error("username") is-invalid @enderror" 
                    placeholder="username" 
                    name="username" />
                    @error("username") 
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror 

                    <input 
                    type="password" 
                    class="form-control mt-3 mb-3 @error("password") is-invalid @enderror" 
                    placeholder="password " 
                    name="password" />
                    @error("password")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror


                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark" type="submit">login</button>
                </div>
                <div>
                <a href="{{ route('register') }}">Don´t have an Account?</a><br/>
                <a href="{{ route('reset_password_email') }}">Forgot Password?</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection