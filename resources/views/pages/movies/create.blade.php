@extends('layouts.app')

@section('content')
    <x-page-header pagetitle="Create Movie">
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">
            <i class="fa fa-long-arrow-left"></i> Back
         </a>
    </x-page-header>

    <div class="wrapper wrapper-content">
        <div class="middle-box animated fadeInRightBig">
            <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="d-grid">
                            <div class="mb-4">
                                <div class="font-bold">
                                    Category
                                </div>
                                <div>
                                    <select name="movie_category_id" class="form-control" required>
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-danger">
                                    @error('movie_category_id')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="font-bold">
                                    Title
                                </div>
                                <div>
                                    <input 
                                        type="text" 
                                        class="form-control"
                                        name="title" 
                                    />
                                </div>
                                <div class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="font-bold">
                                    Description
                                </div>
                                <div>
                                    <textarea name="description" class="form-control" cols="100" required></textarea>
                                </div>
                                <div class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="font-bold">
                                    Rating (1-5)
                                </div>
                                <div>
                                    <input 
                                        type="number" 
                                        class="form-control"
                                        name="rating" 
                                        min="1"
                                        required
                                    />
                                </div>
                                <div class="text-danger">
                                    @error('rating')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="font-bold">
                                    Director
                                </div>
                                <div>
                                    <input 
                                        type="text" 
                                        class="form-control"
                                        name="director" 
                                        required
                                    />
                                </div>
                                <div class="text-danger">
                                    @error('director')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="font-bold">
                                    Published
                                </div>
                                <div>
                                    <input 
                                        type="date" 
                                        class="form-control"
                                        name="published_at" 
                                        required
                                    />
                                </div>
                                <div class="text-danger">
                                    @error('published_at')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="font-bold">
                                    Image
                                </div>
                                <div>
                                    <input 
                                        type="file" 
                                        class="form-control"
                                        name="image"
                                    />
                                </div>
                                <div class="text-danger">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div clas="d-flex flex-row" align="right">
                            <div class="d-inline-flex">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection