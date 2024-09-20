@extends('layouts.app')

@section('content')
    <x-page-header pagetitle="Books">
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Create Book
         </a>
    </x-page-header>

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>COUNTRY ID</th>
                        <th>STOCKS</th>
                        <th>AMOUNT</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->description }}</td>
                            <td>{{ $book->country_id }}</td>
                            <td>{{ $book->stocks }}</td>
                            <td>{{ $book->amount }}</td>
                            <td class="d-flex">
                                <div class="px-2">
                                    <a href="{{ route('books.show', [ 'book' => $book ]) }}" class="btn btn-primary" data-toggle="tooltip" title="View Book">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr></tr>
                    @endforelse
                </tbody>
            </table>
            
            {!! $books->links() !!}
        </div>
    </div>
@endsection