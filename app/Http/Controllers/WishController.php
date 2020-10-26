<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Wish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

class WishController extends Controller
{
  public function addWish(){
      return view('addWishView');
  }
    public function createWish(Request $request){
        $wishid=DB::table('wishes')->where('email',Auth::user()->email)->where('no',$request->no)->first();
        if($wishid==null)
        {    $wish= new Wish();
       $wish->no = $request->no;
       $wish->wish=$request->wish;
        $wish->fulfilled=$request->fulfilled;
        $wish->email=Auth::user()->email;
        $wish->save();
            $msg= Lang::get('home.created');
        return back()->with('wish_created',$msg);}
        else{
            $msg= Lang::get('home.idExist');
            return back()->with('wish_created',$msg);}
    }
    public function getWish(){
      $currentuser=Auth::user()->email;
    //  $wishes =Wish::orderBy('no','ASC')->get();
      $wishes=DB::table('wishes')->where('email','=',$currentuser)->orderBy('no','ASC')->get();
        return view('wishes',compact('wishes'));
    }
  //
    public function getWishDetails($no){
      $wish=Wish::where('no',$no)->where('email',Auth::user()->email)->first();
return view('wish-details',compact('wish'));
    }
public function deleteWish($no){
      Wish::where('no',$no)->where('email',Auth::user()->email)->delete();
    $msg= Lang::get('home.deleted');
      return back()->with('wish_deleted',$msg);
}
public function updateWish($no){
      $wish=Wish::where('no',$no)->where('email',Auth::user()->email)->first();
      return view('update-wish',compact('wish'));
}
    public function updateWishData(Request $request){

       $wish=Wish::where('no',$request->no)->where('email',Auth::user()->email)->first();
       $wish->no=$request->no;
       $wish->wish=$request->wish;
        $wish->fulfilled=$request->fulfilled;
      $wish->email=Auth::user()->email;
       $wish=DB::table('wishes')->where('email',Auth::user()->email)->where('no',$request->no)->update(['fulfilled' => $request->fulfilled]);

      $msg= Lang::get('home.updated');
        return back()->with('wish_updated',$msg);
    }
}
