@extends("base");

@section("content")
<div class="container mt-3">
<form @if($create && !$edit) action="{{ route('create-post')}}"@else action="{{ route('edit-post', $post) }}"  @endif method="POST">
        @csrf 
        <legend class="text-center">{{ $label }}</legend>
        <div class="form-group mt-3">
            <input 
            @if($edit && !$create)
            value="{{ $post->title }}" 
            @else
            value="{{ old('title')}}"
            @endif
            
            type="text"
            class="form-control @error("title") is-invalid @enderror" 
            placeholder="title" 
            name="title" />
            @error("title") 
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror 

            <textarea
        
            
            type="text"
            class="form-control mt-3 mb-3  @error("content") is-invalid @enderror" 
            placeholder="content" 
            value="{{ old('content')}}"
            name="content">@if($edit && !$create){{ $post->content }}@endif</textarea>
            @error("content") 
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror 
        </div>
     
        <div class="form-group">
        <button class="btn btn-outline-dark" type="submit">{{ $label }}</button>
        </div>
    </form>
</div>
@endsection