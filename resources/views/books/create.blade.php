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
                    </div><br/>
                @endif

                <h1>Create new book</h1>

                <form action='{{ action('BookController@store') }}' method='POST'>
                    @csrf
                    <div class='form-group'>
                        <label for='formGroupExampleInput'>Title</label>
                        <input type='text' class='form-control' id='formGroupExampleInput' placeholder='Title'
                               name='title'>
                    </div>

                    <div class='form-group'>
                        <label for='select_preferences'>Authors</label>
                        <select id='select_preferences' multiple='multiple' name='authors[]' style='width: 100%'>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}">{{$author->first_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type='submit' class='btn btn-dark btn-small' name='store'>Save</button>
                </form>
            </div>
            @endsection

            @section('script')
                <script>
                    $(document).ready(function () {
                        $('#select_preferences').select2();
                    });
                </script>
@endsection
