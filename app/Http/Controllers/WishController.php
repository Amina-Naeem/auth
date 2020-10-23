<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Wish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishController extends Controller
{
  public function addWish(){
      return view('addWishView');
  }
    public function createWish(Request $request){
       $wish= new Wish();
       $wish->no = $request->no;
       $wish->wish=$request->wish;
        $wish->fulfilled=$request->fulfilled;
        $wish->email=Auth::user()->email;
        $wish->save();
        return back()->with('wish_created','Wish has been created successfully!');
    }
    public function getWish(){
      $currentuser=Auth::user()->email;
    //  $wishes =Wish::orderBy('no','ASC')->get();
      $wishes=DB::table('wishes')->where('email','=',$currentuser)->orderBy('no','ASC')->get();
        return view('wishes',compact('wishes'));
    }
  //
}
