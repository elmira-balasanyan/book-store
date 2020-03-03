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

                <h1>Make some changes</h1>

                <form method='POST' action="{{ action('BookController@update', $book) }}" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')

                    <div class='form-group'>
                        <label for='formGroupExampleInput'>First Name</label>
                        <input type='text' class='form-control' id='formGroupExampleInput' name='title'
                               value='{{$book->title}}'>
                    </div>

                    <div class='form-group'>
                        <label for='select_preferences'>Authors</label>
                        <select id='select_preferences' multiple='multiple' name='authors[]'
                                style='width: 100%'>
                            @foreach ($authors as $author)
                                <option value="{{$author->id}}"
                                @foreach($book->authors as $selected_authors)
                                    {{ in_array($author->id,[$selected_authors->id])?'selected':''}}
                                    @endforeach>
                                    {{$author->first_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type='submit' class='btn btn-dark btn-small' name='update'>Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $('#select_preferences').select2();
        });
        $.fn.select2.defaults.set('theme', 'classic');
    </script>
@endsection
