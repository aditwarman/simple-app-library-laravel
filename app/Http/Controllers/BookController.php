<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Carbon\Carbon;

class BookController extends Controller
{
    protected $books;
    protected $paginate;

    function __construct(Book $book)
    {
        $this->books = $book;
        $this->paginate = $book->paginate(5);
    }

    public function index()
    {
        return view('list.book', ['books' => $this->paginate]);
    }

    public function formCreate()
    {
        return view('book.form');
    }

    public function postBook(Request $request)
    {
        $validate = [
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'published_date' => 'required'
        ];

        $this->validate($request, $validate);

        if ($this->updateOrCreateBook($request)) {
            flash('Successfully added the book')->important();

            return redirect('list/book')->with('book', $this->paginate);
        }

        return redirect()->back()
            ->withInput($request->all);
    }

    public function edit(Request $request)
    {
        $book = Book::findOrFail($request->id);

        return view('book.edit', ['book' => $book]);
    }

    public function postEdit(Request $request)
    {
        if ($this->updateOrCreateBook($request)) {
            flash('Data with <strong> ID '.$request->book_id.'</strong> was changed')->important();
            return redirect('list/book')->with('book', $this->paginate);
        }

        return redirect()->back()
            ->withInput($request->all);
    }

    public function delete(Request $request)
    {
        Book::findOrFail($request->id)->delete();
        return back();
    }

    public function restore(Request $request)
    {
        $book = Book::withTrashed()
                ->restore();

        flash("Restore data was Successfully")->important();
        return redirect('/list/book');
    }

    protected function updateOrCreateBook(Request $request)
    {
        return Book::updateOrCreate(
            [
                'id' => $request->book_id,
            ],
            [
                'id' => $request->book_id,
                'title' => $request->title,
                'description' => $request->description,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'published_date' => $request->published_date
            ]
        );
    }
}
