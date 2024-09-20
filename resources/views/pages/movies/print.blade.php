<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Movies</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>TITLE</th>
                <th>CATEGORY</th>
                <th>DESCRIPTION</th>
                <th>RATING</th>
                <th>PUBLISHED</th>
                <th>DIRECTOR</th>
                <th>IMAGE</th>
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
                    <td>
                        @if ($movie->image)
                            <img src="{{ public_path('uploads/' . $movie->image) }}" alt="" width="100">
                        @endif      
                    </td>
                </tr>
            @empty
                <tr></tr>
            @endforelse
        </tbody>
    </table>
</body>

<script>
</script>
</html>