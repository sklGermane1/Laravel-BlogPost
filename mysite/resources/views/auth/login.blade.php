@extends("base")

@section("content")
<div class="container">

    <div class="d-flex">
        <div class="mx-auto card bg-white rounded mt-3 mb-5 p-5">
            <div>
            <form action="{{ route('login') }}" method="POST">    
                <legend class="text-center">Login</legend>
                <hr />
                @csrf 
                <div class="form-group">
                    <input 
                    type="text"
                    class="form-control" 
                    placeholder="username" 
                    name="username" />

                    <input 
                    type="password" 
                    class="form-control mt-3 mb-3" 
                    placeholder="password" 
                    name="password" />


                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark" type="submit">login</button>
                </div>
                <div>
                <a href="{{ route('register') }}">Don´t have an Account?</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection