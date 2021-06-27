<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tales = Tale::with('user')->cursorPaginate(15);
        return view('tale.index',compact('tales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tale::create([
          'title'=> $request ->title,
          'contents'=>$request ->contents,
          'user_id'=>Auth::id(),
          'background_color'=>$request->background_color,
            'font_color'=>$request->font_color
        ]);
        return redirect()->back()->with(['success' => 'The tale is added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tale = Tale::with('comments')->with('user')->find($id);
        return view('Tale.show',compact('tale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tale = Tale::find($id);
        return view('Tale.update',compact('tale'));
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
        $tale = Tale::find($id);
        $tale -> update([
            'title'=> $request ->title,
            'contents'=>$request ->contents,
            'background_color'=>$request->background_color,
            'font_color'=>$request->font_color
        ]);

        return redirect()-> route('Tales.edit',[$id])->with(['success' => 'The tale is updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tale::destroy($id);
        return redirect()->back()->with(['msg' => 'The tale is deleted']);
    }

    public function showAll(){
        $tales = Tale::where('user_id',Auth::id())->simplePaginate(5);
        return view('Tale.Mange',compact('tales'));
    }

    public function addComment(Request $request,$id){
        Comment::create([
            'comment' => $request -> comment,
            'user_id' => Auth::id(),
            'tale_id' => $id
        ]);
        return redirect()->back();
    }

    public function deleteComment($id){
        Comment::destroy($id);
        return redirect()->back();
    }
}
