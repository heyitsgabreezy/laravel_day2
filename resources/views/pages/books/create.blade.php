@extends('layouts.app')

@section('content')
    <x-page-header pagetitle="Create Book">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">
            <i class="fa fa-long-arrow-left"></i> Back
         </a>
    </x-page-header>

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="d-grid">
                            <div class="mb-4">
                                <div class="font-bold">
                                    Title
                                </div>
                                <div>
                                    <input 
                                        type="text" 
                                        class="form-control"
                                        name="title" 
                                        required
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
                                    Country ID
                                </div>
                                <div>
                                    <input 
                                        type="number" 
                                        class="form-control"
                                        name="country_id" 
                                        min="1"
                                        required
                                    />
                                </div>
                                <div class="text-danger">
                                    @error('country_id')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="font-bold">
                                    Stocks
                                </div>
                                <div>
                                    <input 
                                        type="number" 
                                        class="form-control"
                                        name="stocks" 
                                        min="0"
                                        required
                                    />
                                </div>
                                <div class="text-danger">
                                    @error('stocks')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">  
                                <div class="font-bold">
                                    Amount
                                </div>
                                <div>
                                    <input 
                                        type="number" 
                                        class="form-control"
                                        name="amount" 
                                        min="1"
                                        step="any"
                                        required
                                    />
                                </div>
                                <div class="text-danger">
                                    @error('amount')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="font-bold">
                                    Photo URL
                                </div>
                                <div>
                                    <input 
                                        type="text" 
                                        class="form-control"
                                        name="photo" 
                                        required
                                    />
                                </div>
                                <div class="text-danger">
                                    @error('photo')
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