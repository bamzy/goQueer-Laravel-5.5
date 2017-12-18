<?php
/**
 * Created by PhpStorm.
 * User: bamdad
 * Date: 11/19/2016
 * Time: 5:53 PM
 */

namespace App\Http\Controllers;


use App\Models\Set;
use App\Models\Hint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $sets = Set::orderBy('id','DESC')->paginate(5);
            return view('set.index',compact('sets'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
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
            $sets = Set::orderBy('id','DESC');
            return view('set.create',compact('sets'));
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
                'name' => 'required',
            ]);

            Set::create($request->all());
            return redirect()->route('set.index')
                ->with('success','Set added successfully');
        } else
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
            $set = Set::find($id);
            $hints = Hint::orderBy('id','DESC')->where('id',$id)->get();
            return view('set.show',compact('set','hints'))->with('email',Auth::user()->email);
        } else
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
            $set = Set::find($id);
            $sets = Set::lists('name', 'id');
            return view('set.edit',compact('set','sets'));
        } else
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


            ]);

            Set::find($id)->update($request->all());
            return redirect()->route('set.index')
                ->with('success','Set updated successfully');
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
            Set::find($id)->delete();
            return redirect()->route('set.index')
                ->with('success','Set deleted successfully');
        } else
            return view('errors.permission');
    }
}