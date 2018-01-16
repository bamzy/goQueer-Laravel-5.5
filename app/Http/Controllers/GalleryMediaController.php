<?php
/**
 * Created by PhpStorm.
 * User: bamdad
 * Date: 11/19/2016
 * Time: 5:53 PM
 */

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryMedia;
use App\Models\Media;
use App\Models\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryMediaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $medias = GalleryMedia::orderBy('id','DESC')->paginate(5);
        return view('media.index',compact('medias'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($input)
    {

        $parameters = explode("&", $input);
        $gallery_id = $parameters[1];
        $media_id = $parameters[0];
        if (Auth::check()) {

            \DB::table('gallery_media')->insert(
                ['gallery_id' => $gallery_id,
                    'media_id' => $media_id,
                ]
            );

            $id = $gallery_id;
            $gallery = Gallery::find($id);
            $final_all_medias=array();
            $all_medias = Media::orderBy('id', 'DESC')->get();


            $assigned_medias =  \DB::table('media')
                ->join('gallery_media', 'media.id', '=', 'gallery_media.media_id')
                ->select('media.*','gallery_media.id AS finalId', 'gallery_media.order AS order')
                ->orderBy('gallery_media.order', 'asc')
                ->where('gallery_media.gallery_id' , '=', $id)
                ->get();
            foreach ( $all_medias as $media){
                $flag  = false;
                foreach ($assigned_medias as $assigned_media){
                    if ($assigned_media->id == $media->id){
                        $flag != true;
                    }
                }
                if (!$flag)
                    array_push($final_all_medias,$media);


            }
            return view('gallery.show', compact('gallery', 'final_all_medias','assigned_medias', 'id'))->with('email', Auth::user()->email);
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
                'gallery_id' => 'required',
                'media_id' => 'required',
            ]);
            $newOrder = DB::table('gallery_media')->where('id', DB::raw("(select max(`order`) from gallery_media)"))->get();


            \DB::table('gallery_media')->insert(
                ['gallery_id' => $request->gallery_id,
                    'media_id' => $request->media_id,
                    'order' => (int)$newOrder+1,
                    ]
            );
            return redirect()->route('gallery_media.show',[$request->location_id])
                ->with('success','Media Assigned successfully');
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
            $media = LocationMedia::find($id);
            return view('media.edit',compact('media'));
        } else
            return view('errors.permission');
    }

    public function increase($input)
    {
        if (Auth::check()) {
            $parameters = explode("&", $input);
            $gallery_id = $parameters[1];
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
    public function update($input)
    {

        $parameters = explode("&", $input);
        //dd($parameters);
        $gallery_id = $parameters[1];
        $media_id = $parameters[0];
        if (Auth::check()) {
            $ifExist =  \DB::table('gallery_media')

                ->select('gallery_media.*')
                ->where('gallery_media.gallery_id' , '=', $gallery_id)
                ->where('gallery_media.media_id' , '=', $media_id)
                ->get();
            if (sizeof($ifExist) == 0) {
                \DB::table('gallery_media')->insert(
                    ['gallery_id' => $gallery_id,
                        'media_id' => $media_id,
                        'order' => 0
                    ]
                );
            }

            $id = $gallery_id;
            $gallery = Gallery::find($id);
            $all_medias = Media::orderBy('id', 'DESC')->get();
            $final_all_medias=array();

            $assigned_medias =  \DB::table('media')
                ->join('gallery_media', 'media.id', '=', 'gallery_media.media_id')
                ->select('media.*','gallery_media.id AS finalId', 'gallery_media.order AS order')
                ->orderBy('gallery_media.order', 'desc')
                ->where('gallery_media.gallery_id' , '=', $id)
                ->get();
            $set = Set::find($gallery->set_id);
            $set_name = $set->name;
            foreach ( $all_medias as $media){
                $flag  = false;
                foreach ($assigned_medias as $assigned_media){
                    if ($assigned_media->id == $media->id){
                        $flag = true;
                    }
                }
                if (!$flag)
                    array_push($final_all_medias,$media);


            }

            if (sizeof($ifExist) != 0)
                return view('gallery.show', compact('gallery', 'final_all_medias','assigned_medias', 'id','set_name'))->with('email', Auth::user()->email)
                    ->with('success','Already assigned');
            else
                return view('gallery.show', compact('gallery', 'final_all_medias','assigned_medias', 'id','set_name'))->with('email', Auth::user()->email)
                    ->with('success','Association created successfully');
        } else
            return view('errors.permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($galleryMediaID,$galleryID)
    {
//        dd($galleryMediaID.'|'.$galleryID);
        if (Auth::check()) {

            GalleryMedia::find($galleryMediaID)->delete();
            return redirect()->route('gallery.show',$galleryID)
                ->with('success','Association deleted successfully');
        } else
            return view('errors.permission');
    }
}