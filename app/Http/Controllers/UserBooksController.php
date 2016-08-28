<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Book;
use Redirect;
use Carbon\Carbon;
class UserBooksController extends Controller
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
        
        return view('users.books.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        if(!$book){
            return Redirect::route('books')->with('danger', 'Not Found');
        }

        return view('users.books.show', compact('user', 'book'));   
    }

    public function submit($id)
    {
        $user = Auth::user();

        $book = Book::find($id);

        if(!$book){
            return Redirect::route('books')->with('danger', 'Not Found');
        }

        $user->books()->detach($id);

        return Redirect::back()->with('success', 'Book returned back');
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
        $user = Auth::user();

        $book = Book::find($id);

        if(!$book){
            return Redirect::route('books')->with('danger', 'Not Found');
        }

        if($book->users()->count() >= $book->quantities)
        {
            return Redirect::back()->with('danger', 'No books available for borrowing');
        }
        
        $borrowed_books = $user->books()->lists('books.id')->toArray();
        
        //Display error if already borrowed
        if($borrowed_books && in_array($id, $borrowed_books)){
            return Redirect::back()->with('danger', 'Already borrowed');
        }


        if($user->hasRole('student') && $user->books()->count() > 5){
            return Redirect::back()->with('danger', 'Max limit of 6 book alreadt borrowed.');
        }

        if($user->hasRole('junior_student') && $user->books()->count() > 2){
            return Redirect::back()->with('danger', 'Max limit of 3 book alreadt borrowed.');
        }

        $user->books()->attach($id);
        
        return Redirect::back()->with('success', 'Book borrowed');
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
    }
}
