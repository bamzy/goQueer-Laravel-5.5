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
class MediaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private  $pageSize = 15;
    public function test(){

                $users = Media::all();
                return Datatables::of($users)->make();

    }
    public function index(Request $request)
    {
        if (Auth::check()) {
            $medias = Media::orderBy('id', 'DESC')->paginate($this->pageSize);
            return view('media.index', compact('medias'))
                ->with('i', ($request->input('page', 1) - 1) * $this->pageSize)->with('email',Auth::user()->email);
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
                'file_name' => 'required',
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
                    'publish_date' => $request->publish_date,
                    'display_date' => $request->display_date,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                    'name' => $request->name,
                    'type_id' => $request->type_id,
                    'progress_status_id' => '1',
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
            $user = DB::table('user')->where('id', '=', $media->user_id)->first();
            //$user = \User::find($media->user_id);
            $user_name = $user->name;
            $comments = DB::table('message')
                ->join('user', 'user.id', '=', 'message.user_id')
                ->select('message.*', 'user.name')
                ->where('media_id' , '=', $id)
                ->get();
            return view('media.show', compact('media','comments','user_name'))->with('email',Auth::user()->email)->with('media_id',$id);
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
            $user = DB::table('user')->where('id', '=', $media->user_id)->first();
            //$user = User::find($media->user_id);
            $user_name = $user->name;
            $statuses = CopyrightStatus::lists('status', 'id');
            return view('media.edit', compact('media','types','statuses','user_name'))->with('email',Auth::user()->email);
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
                'source' => 'required',
                'type_id' => 'required',
//                'file_name' => 'required',
                'description' => 'required',
            ]);

//            $file = $request->file('file_name');
//            $fileName = $file->getClientOriginalName();
//            $filePath = $file->getRealPath();
//            $destinationPath = 'uploads';
//            $file->move($destinationPath, $file->getClientOriginalName());
            DB::table('media')
                ->where('id',$id)
                ->update(
                ['source' => $request->source,
                    'description' => $request->description,
//                    'filePath' => $filePath,
//                    'fileName' => $fileName,
                    'publish_date' => $request->publish_date,
                    'display_date' => $request->display_date,
                    'updated_at' => new \DateTime(),
                    'name' => $request->name,
                    'type_id' => $request->type_id,
                    'progress_status_id' => '1',
                    'copyright_status_id' => $request->copyright_status_id,
                    'user_id' => Auth::id()]
            );


           // Media::find($id)->update($request->all());
            return redirect()->route('media.index')
                ->with('success', 'Media updated successfully')->with('email',Auth::user()->email);
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