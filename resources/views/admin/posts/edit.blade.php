@extends('layouts.admin')

@section('title', 'edit post')

@section('content')
    <div class="container">
        <form action="{{ route('admin.posts.update', $post->slug) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                {{-- __('Title') è traducibile  --}}
                <label for="title" class="form-label">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" placeholder="Post Title">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="slug" class="form-label">{{ __('Slug') }}</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
            </div>
            <input type="button" value="Generate slug" id="btn-slugger">
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <select class="form-select mt-3" aria-label="Default select example" name="category_id" id="category">
                <option value="" selected>Select your category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id == old('category_id', $post->category->id) }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <fieldset>
                <legend>tags</legend>
                @foreach ($tags as $tag)
                    <input type="checkbox" name="tag[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                    @if (in_array($tag->id, old('tags', $post->tags->pluck('id')->all()))) checked @endif>
                    <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                @endforeach

                @error('tags[]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </fieldset>

            <div class="mb-3">
                <label for="content" class="form-label">{{ __('Content') }}</label>
                <textarea class="form-control" id="content" rows="10" name="content" placeholder="Post Description">{{ old('content', $post->content) }}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button>Save changes</button>
        </form>
    </div>

@endsection
