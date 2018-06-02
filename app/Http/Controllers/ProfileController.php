<?php
/**
 * Created by PhpStorm.
 * User: bamdad
 * Date: 11/19/2016
 * Time: 5:53 PM
 */

namespace App\Http\Controllers;


use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {

        return $profiles = Profile::orderBy('id','DESC')->get();

    }

    public function getAllVisibleProfiles(Request $request)
    {

        return $profiles = \DB::table('profile')->where('visibleToPlayer', '=', true)->get();

    }

    public function index(Request $request)
    {
        if (Auth::check()) {
        $profiles = Profile::orderBy('id','DESC')->paginate(5);
            return view('profile.index',compact('profiles'))
                ->with('i', ($request->input('page', 1) - 1) * 500);
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
            return view('profile.create');
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
                'show' => 'required',
                'description' => 'required',
                'visibleToPlayer' => 'required',
                'lat' => 'required',
                'lng' => 'required',
                'zoom' => 'required',
                'tilt' => 'required',
                'bearing' => 'required',
            ]);

            Profile::create($request->all());
            return redirect()->route('profile.index')
                ->with('success','Profile added successfully');
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
        $profile = Profile::find($id);
        return view('profile.edit',compact('profile'));
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
        $this->validate($request, [
            'name' => 'required',
            'show' => 'required',


        ]);

        Profile::find($id)->update($request->all());
        return redirect()->route('profile.index')
            ->with('success','Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profile::find($id)->delete();
        return redirect()->route('profile.index')
            ->with('success','Profile deleted successfully');
    }
}