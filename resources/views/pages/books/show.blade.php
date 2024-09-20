@extends('layouts.app')

@section('content')
    <x-page-header pagetitle="Book">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">
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
                    <h3>{{ $book->title }}</h3>
                </div>

                <div class="card-body">
                    <div class="d-grid">
                        <div class="mb-2">
                            <div class="font-bold">
                                Description
                            </div>
                            <div>
                                {{ $book->description }}
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="font-bold">
                                Country ID
                            </div>
                            <div>
                                {{ $book->country_id }}
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="font-bold">
                                Stocks
                            </div>
                            <div>
                                {{ $book->stocks }}
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="font-bold">
                                Amount
                            </div>
                            <div>
                                {{ $book->amount }}
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="font-bold">
                                Photo
                            </div>
                            <div>
                                <img src="{{ $book->photo }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div clas="d-flex flex-row" align="right">
                        <div class="d-inline-flex">
                            <a href="{{ route('books.edit', [ 'book' => $book ]) }}" class="btn btn-secondary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </div>

                        <div class="d-inline-flex">
                            <form action="{{ route('books.destroy', [ 'book' => $book ]) }}" method="POST">
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