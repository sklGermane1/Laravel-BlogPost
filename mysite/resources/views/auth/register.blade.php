@extends("base")

@section("content")
<div class="container">
   
    <div class="d-flex">
        <div class="mx-auto card bg-white rounded mt-3 mb-5 p-5">
            <div>
            <form action="{{ route('register') }}" method="POST"> 
                <legend class="text-center">Register</legend>
                <hr />
                @csrf 
                <div class="form-group">
                    <input 
                    value="{{ old('username')}}"
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
                    value="{{ old('email')}}"
                    type="text"
                    class="form-control mt-3 mb-3  @error("email") is-invalid @enderror" 
                    placeholder="email" 
                    name="email" />
                    @error("email") 
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror 

                    <input 
                    type="password" 
                    class="form-control @error("password") is-invalid @enderror" 
                    placeholder="password"  
                    name="password" />
                    @error("password") 
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror 

                    <input 
                    type="password" 
                    class="form-control mt-3 mb-3 @error("password_confirmation") is-invalid @enderror" 
                    placeholder="password_confirmation" 
                    name="password_confirmation" />
                    @error("password_confirmation") 
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror 
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark" type="submit">Sign up</button>
                </div>
                <div>
                <a href="{{ route('login') }}">Already have an Account?</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection