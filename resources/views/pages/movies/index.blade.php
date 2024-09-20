@extends('layouts.app')

@section('content')
    <x-page-header pagetitle="Movies">
        <a href="{{ route('movies.create') }}" class="btn btn-primary">
           <i class="fa fa-plus"></i> Create Movie
        </a>
    </x-page-header>

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            <div class="row mb-4">
                <div class="col-lg-4 col-md-4 col-sm-12">     
                    <div class="card">
                        <div class="card-header">
                            Chart
                        </div>
                        <div class="card-body">
                            <img src="https://quickchart.io/chart?cht=p3&chs=350x200&chd=t:{{ $chart[0]->total }},{{ $chart[1]->total }},{{ $chart[2]->total }}&chl={{ $chart[0]->category->name }}|{{ $chart[1]->category->name }}|{{ $chart[2]->category->name }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="col-lg-12 col-md-12 col-sm-12 no-padding text-right mb-4">
                <a href="{{ route('movies.print') }}" target="_blank" class="btn btn-primary">
                    <i class="fa fa-print"></i> Print
                </a>

                <a href="{{ route('movies.generate-pdf') }}" target="_blank" class="btn btn-secondary">
                    <i class="fa fa-file-pdf-o"></i> Generate PDF
                </a>
            </div>
            
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>CATEGORY</th>
                        <th>DESCRIPTION</th>
                        <th>RATING</th>
                        <th>PUBLISHED</th>
                        <th>DIRECTOR</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $movie)
                        <tr>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->category->name }}</td>
                            <td>{{ $movie->description }}</td>
                            <td>{{ $movie->rating }}</td>
                            <td>{{ $movie->published_at->format('M j, Y') }}</td>
                            <td>{{ $movie->director }}</td>
                            <td class="d-flex">
                                <div class="px-2">
                                    <a href="{{ route('movies.show', [ 'movie' => $movie ]) }}" class="btn btn-primary" data-toggle="tooltip" title="View Movie">
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
            
            {!! $movies->links() !!}
        </div>
    </div>
@endsection