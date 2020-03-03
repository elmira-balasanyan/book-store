@extends('layouts.main')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-8 m-auto pt-5'>
                <h1 class='text-center'>{{ $author->first_name }} {{ $author->last_name }}</h1>
                <table class='table'>
                    <thead class='thead-light'>
                    <tr>
                        <th scope='col' colspan='2'>
                            <img class='w-25' src='https://cdn.cnn.com/cnnnext/dam/assets/191120112535-underscoredcreativelead-large-169.jpg' alt=''>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($author->books) == 0)
                        <tr>
                            <td>No books</td>
                        </tr>
                    @else
                        @foreach($author->books as $book)
                            <tr>
                                <td colspan='2'>{{ $book->title }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class='row'>
            <div class='col-md-3 m-auto '>
                <div class='w-75 pt-3 ml-5'>
                    <a href='/authors' class='btn btn-dark btn-sm'>Back</a>
                    <a href='/authors/{{ $author->id }}/edit' class='btn btn-dark btn-sm'>Update</a>
                    <a href='/authors/{{ $author->id }}/destroy' class='btn btn-dark btn-sm'>Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection
