<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(3);

        return view('books.index', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show', ['book' => $book]);
    }

    public function create()
    {
        $authors = Author::all();

        return view('books.create', ['authors' => $authors]);
    }

    public function store(Request $request)
    {
        $book = new Book($this->validateBook());
        $book->title = $request->title;
        $book->save();

        $book->authors()->sync($request->authors, false);

        return redirect()->action('BookController@index');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $authors = Author::all();

        return view('books.edit', ['book' => $book, 'authors' => $authors]);
    }

    public function update(Request $request, Book $book, Author $author)
    {
        $request->validate([
            'title' => 'sometimes',
            'first_name' => 'sometimes',
            'last_name' => 'sometimes'
        ]);

        $book->update([
            'title' =>  $request->title
        ]);

        $book->authors()->detach();

        $author->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);

        $book->authors()->sync($request->authors, false);

        return redirect()->action('BookController@index');
    }


    public function destroy($id)
    {
        $book = Book::find($id);
        $book->authors()->detach();
        $book->delete();

        return redirect()->action('BookController@index');
    }


    protected function validateBook()
    {
        return \request()->validate([
            'title' => 'required'
        ]);
    }
}
