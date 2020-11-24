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
                    type="text"
                    class="form-control" 
                    placeholder="username" 
                    name="username" />

                    <input 
                    type="text" 
                    class="form-control mt-3 mb-3 " 
                    placeholder="email" 
                    name="email" />

                    <input 
                    type="password" 
                    class="form-control" 
                    placeholder="password" 
                    name="password" />

                    <input 
                    type="password" 
                    class="form-control mt-3 mb-3" 
                    placeholder="password_confirmation" 
                    name="password_confirmation" />
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark">Sign up</button>
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