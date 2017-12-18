<?php
/**
 * Created by PhpStorm.
 * User: bamdad
 * Date: 11/19/2016
 * Time: 5:53 PM
 */

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {

        $locations = Location::orderBy('id','DESC')->where('user_id',Auth::id())->paginate(5);
        return view('location.index',compact('locations'))
            ->with('i', ($request->input('page', 1) - 1) * 5)->with('email',Auth::user()->email);
        } else
            return view('errors.permission');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('location.create')->with('email',Auth::user()->email);
        } else
            return view('errors.permission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'message' => 'required',
                'media_id' => 'required',
            ]);

            \DB::table('message')->insert(
                [
                    'content' => $request->message,
                    'created_at' => new \DateTime('now'),
                    'media_id' => $request->media_id,
                    'user_id' => Auth::id()
                ]
            );
            return redirect()->route('media.show',[$request->media_id])
                ->with('success', 'comment posted successfully')->with('email',Auth::user()->email);
        }else
            return view('errors.permission');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {

            $location = Location::find($id);
            return view('location.show', compact(['location'=> $location,'comments'=> $comments]))->with('email',Auth::user()->email);
        }
        else
            return view('errors.permission');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $location = Location::find($id);
            return view('location.edit', compact('location'))->with('email',Auth::user()->email);
        }else
            return view('errors.permission');
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
        if (Auth::check()) {
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'x' => 'required',
                'y' => 'required',
            ]);

            Location::find($id)->update($request->all());
            return redirect()->route('location.index')
                ->with('success', 'location updated successfully')->with('email',Auth::user()->email);
        } else
            return view('errors.permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            Location::find($id)->delete();
            return redirect()->route('location.index')
                ->with('success', 'Location deleted successfully')->with('email',Auth::user()->email);
        } else
            return view('errors.permission');
    }
}