@extends('layouts.main')

@section('content')
    <div class='container'>
        <div class='row  mt-3'>
            <div class='col-md-8'>
                <h1 class='ml-5'>Books!</h1>
            </div>
            <div class='col-md-3 mt-2 ml-5'>
                <form action='http://book-store.test/books/create' method='GET'>
                    <button type='submit' class='btn btn-dark float-md-right ml-5'>Add new book</button>
                </form>
            </div>
        </div>

        <div class='row' style='height: 75vh'>
            @foreach($books as $book)
                <div class='col-md-43 m-auto'>
                    <div class='card mt-3' style='width: 18rem;'>
                        <img class='card-img-top'
                             src='https://img.etimg.com/thumb/msid-67619899,width-640,resizemode-4,imgsize-134956/coincidence-or-what.jpg'
                             alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>
                                {{  $book->title }}
                            </h5>
                            <a href="/books/{{ $book->id }}" class='btn btn-dark btn-sm'>Show</a>
                            <a href="/books/{{ $book->id }}/edit" class='btn btn-dark btn-sm'>Update</a>
                            <a href="/books/{{ $book->id }}/destroy" class='btn btn-dark btn-sm'>Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class='row'>
        <div class='col-md-2 mt-5 m-auto text-center'>
            {{ $books->links() }}
        </div>
    </div>
@endsection
