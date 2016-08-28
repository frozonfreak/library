<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Purifier;
use Auth;
use Input;
use File;
use App\Book;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();

        $books = Book::paginate(15);

        return view('admin.books.index', compact('user', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        
        return view('admin.books.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        
        $data = $request->all();

        $data = array_map(function($input){
              return Purifier::clean($input);
            },$data);

        if(!$data['image_url'])
            return redirect()->route('books')->with('danger', 'Image file required');

        $book = Book::create($data);

        $file = Input::file('image_url');
        $tmpFilePath = '/images/books/';
        $tmpFileName = time() . '-' . $file->getClientOriginalName();
        $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
        $path = $tmpFilePath . $tmpFileName;
        $book->image_url = $path;
        $book->save();

        return redirect()->route('books')->with('success', 'Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Auth::user();

        $book = Book::find($id);

        return view('admin.books.create', compact('user', 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Auth::user();

        $book = Book::find($id);
        
        $data = Input::all();
        
        $data = array_map(function($input){
              return Purifier::clean($input);
            },$data);

        if(!@$data['image_url'])
            return redirect()->route('books')->with('danger', 'Image file required');

        $book->title = $data['title'];
        $book->description = $data['description'];
        $book->author = $data['author'];
        $book->isbn = $data['isbn'];
        $book->quantities = $data['quantities'];
        $book->location = $data['location'];

        $file = Input::file('image_url');
        $tmpFilePath = '/images/books/';
        $tmpFileName = time() . '-' . $file->getClientOriginalName();
        $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
        $path = $tmpFilePath . $tmpFileName;
        $book->image_url = $path;
        $book->save();

        return redirect()->route('books')->with('success', 'Book Updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Auth::user();   

        Book::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Book Deleted');
    }
}
