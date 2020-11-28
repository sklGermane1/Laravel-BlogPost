@extends("base")

@section("content")
<div class="container">
    <div>
        <x-post :post="$post" />
    </div>
</div>
@endsection