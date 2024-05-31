@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Movies</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('movies.create') }}"> Create New Movie</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Company</th>
            <th>Tahun Rilis</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($movies as $movie)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $movie->judul }}</td>
            <td>{{ $movie->genre }}</td>
            <td>{{ $movie->company }}</td>
            <td>{{ $movie->tahun_rilis }}</td>
            <td>
                <form action="{{ route('movies.destroy',$movie->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('movies.show',$movie->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('movies.edit',$movie->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $movies->links() !!}
</div>
@endsection