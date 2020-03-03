@extends('layouts.main')

@section('content')
    <div class='container'>
        <div class='row pt-5'>
            <div class='col-md-5 m-auto'>

                @if ($errors->any())
                    <div class='alert alert-danger'>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br/>
                @endif

                <h1>Add new author</h1>

                <form method='POST' action="{{ action('AuthorController@store') }}">
                    @csrf

                    <div class='form-group'>
                        <label for='formGroupExampleInput'>First Name</label>
                        <input type='text' class='form-control' id='formGroupExampleInput' name='first_name'
                               placeholder='First Name'>
                    </div>

                    <div class='form-group'>
                        <label for='formGroupExampleInput2'>Last Name</label>
                        <input type='text' class='form-control' id='formGroupExampleInput2' name='last_name'
                               placeholder='Last Name'>
                    </div>

                    <button type='submit' class='btn btn-dark btn-small' name='store'>Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
