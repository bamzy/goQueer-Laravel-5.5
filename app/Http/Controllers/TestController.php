<?php
/**
 * Created by PhpStorm.
 * User: bamdad
 * Date: 11/19/2016
 * Time: 5:53 PM
 */

namespace App\Http\Controllers;

use App\Models\CopyrightStatus;
use App\Models\Location;
use App\Models\Media;
use App\Models\MediaType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class TestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $medias = Media::orderBy('id', 'DESC')->where('progress_status_id','=','2')->paginate(5);
            return view('test.index', compact('medias'))
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
            $locations = Location::lists('name', 'id');
            $types = MediaType::lists('name', 'id');
            $statuses = CopyrightStatus::lists('status', 'id');
            return view('media.create', compact('id', 'types','statuses'))->with('email',Auth::user()->email);
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

                'source' => 'required',
                'type_id' => 'required',
                'description' => 'required',

            ]);

            $file = $request->file('file_name');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->getRealPath();
            $destinationPath = 'uploads';
            $file->move($destinationPath, $file->getClientOriginalName());

            DB::table('media')->insert(
                ['source' => $request->source,
                    'description' => $request->description,
                    'filePath' => $filePath,
                    'fileName' => $fileName,
                    'date' => $request->date,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                    'name' => $request->name,
                    'type_id' => $request->type_id,
                    'copyright_status_id' => $request->status_id,
                    'user_id' => Auth::id()]
            );
            return redirect()->route('media.index')
                ->with('success', 'Media added successfully')->with('email',Auth::user()->email);
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
            $media = Media::find($id);
            $comments = DB::table('message')
                ->join('user', 'user.id', '=', 'message.user_id')
                ->select('message.*', 'user.name')
                ->where('media_id' , '=', $id)
                ->get();
            return view('media.show', compact('media','comments'))->with('email',Auth::user()->email)->with('media_id',$id);
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
            $media = Media::find($id);
            $locations = Location::lists('name', 'id');
            $types = MediaType::lists('name', 'id');
            $statuses = CopyrightStatus::lists('status', 'id');
            return view('media.edit', compact('media','locations','types','statuses'))->with('email',Auth::user()->email);
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
    public function update( $id)
    {

        if (Auth::check()) {
            DB::table('media')
                ->where('id', $id)
                ->update(['progress_status_id' => 2]);

            return redirect()->route('draft.index')
                ->with('success', 'Media moved to test')->with('email',Auth::user()->email);
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
            Media::find($id)->delete();
            return redirect()->route('media.index')
                ->with('success', 'Media deleted successfully')->with('email',Auth::user()->email);
        } else
            return view('errors.permission');
    }
}