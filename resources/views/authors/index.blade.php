@extends('layouts.main')

@section('content')
    <div class='container'>
        <div class='row mt-3'>
            <div class='col-md-8'>
                <h1 class=ml-5>Here are our authers!</h1>
            </div>
            <div class='col-md-3  mt-2 ml-5'>
                <form action="{{ action('AuthorController@create') }}" method="GET">
                    <button type='submit' class='btn btn-dark float-right'>Add author</button>
                </form>
            </div>
        </div>

        @if(session()->get('success'))
            <div class='alert alert-success'>
                {{ session()->get('success') }}
            </div>
            <br/>
        @endif

        <div class='row' style='height: 75vh'>
            @foreach($authors as $author)
                <div class='m-auto'>
                    <div class='card' style='width: 18rem'>
                        <img class='card-img-top'
                             src='https://cdn.cnn.com/cnnnext/dam/assets/191120112535-underscoredcreativelead-large-169.jpg'
                             alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>
                                {{ $author->first_name  }}
                            </h5>
                            <a href="/authors/{{ $author->id }}" class="btn btn-dark btn-sm">Show</a>
                            <a href="/authors/{{ $author->id }}/edit" class="btn btn-dark btn-sm">Update</a>
                            <a href="/authors/{{ $author->id }}/destroy" class="btn btn-dark btn-sm">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class='row'>
            <div class='col-md-2 m-auto text-center'>
                {{ $authors->links() }}
            </div>
        </div>
    </div>
@endsection
