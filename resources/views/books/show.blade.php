@extends('layouts.main')

@section('content')
    <div class='container'>
        <div class='row mt-5'>
            <div class='col-md-5 m-auto'>
                <div class='card text-center' style='width: 18rem;'>
                    <img class='card-img-top'
                         src='https://img.etimg.com/thumb/msid-67619899,width-640,resizemode-4,imgsize-134956/coincidence-or-what.jpg'
                         alt='Card image cap'>
                    <div class='card-body'>
                        <h5 class='card-title'>{{ $book->title }}</h5>
                        <p class='card-text'>With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>

                <div class='w-50 ml-5 pt-3'>
                    <a href='/books' class='btn btn-dark btn-sm'>Back</a>
                    <a href="/books/{{ $book->id }}/edit" class='btn btn-dark btn-sm'>Update</a>
                    <a href="/books/{{ $book->id }}/destroy" class='btn btn-dark btn-sm'>Delete</a>
                </div>
            </div>

            <div class='col-md-5'>
                <h1>Authors</h1>
                <table class='table'>
                    <thead class='thead-light'>
                    <tr>
                        <th scope='col'>Author's name</th>
                        <th scope='col'>Author's lastname</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($book->authors as $author)
                        <tr>
                            <td>{{$author->first_name}}</td>
                            <td>{{$author->last_name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
