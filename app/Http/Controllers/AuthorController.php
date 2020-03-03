<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->paginate(3);

        return view('authors.index', ['authors' => $authors]);
    }

    public function show($id)
    {
        $author = Author::find($id);

        return view('authors.show', ['author' => $author]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $author = new Author($this->validateAuthor());
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->save();

        $author->books()->sync($request->books, false);

        return redirect()->action('AuthorController@index');
    }

    public function edit($id)
    {
        $author = Author::find($id);

        return view('authors.edit', ['author' => $author]);
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'first_name' => 'sometimes',
            'last_name' => 'sometimes'
        ]);

        $author->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);

        return redirect()->action('AuthorController@index');
    }

    public function destroy($id)
    {
        $author = Author::find($id);
        $author->books()->detach();
        $author->delete();

        return redirect()->action('AuthorController@index');
    }

    protected function validateAuthor()
    {
        return \request()->validate([
            'first_name' => 'required',
            'last_name' => 'required'
        ]);
    }
}


