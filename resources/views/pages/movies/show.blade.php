@extends('layouts.app')

@section('content')
    <x-page-header pagetitle="Movie">
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">
            <i class="fa fa-long-arrow-left"></i> Back
         </a>
    </x-page-header>

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header bg-primary">
                    <h3>{{ $movie->title }}</h3>
                </div>

                <div class="card-body">
                    <div class="d-grid">
                        <div class="mb-2">
                            <div class="font-bold">
                                Category
                            </div>
                            <div>
                                {{ $movie->category->name }}
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="font-bold">
                                Description
                            </div>
                            <div>
                                {{ $movie->description }}
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="font-bold">
                                Rating
                            </div>
                            <div>
                                {{ $movie->rating }}
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="font-bold">
                                Director
                            </div>
                            <div>
                                {{ $movie->director }}
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="font-bold">
                                Published
                            </div>
                            <div>
                                {{ $movie->published_at->format('M j, Y') }}
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="font-bold">
                                Image
                            </div>
                            <div>
                                <img src="{{ asset('uploads/' . $movie->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div clas="d-flex flex-row" align="right">
                        <div class="d-inline-flex">
                            <a href="{{ route('movies.edit', [ 'movie' => $movie ]) }}" class="btn btn-secondary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </div>

                        <div class="d-inline-flex">
                            <form action="{{ route('movies.destroy', [ 'movie' => $movie ]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection