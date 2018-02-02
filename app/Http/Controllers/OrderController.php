<?php
/**
 * Created by PhpStorm.
 * User: bamdad
 * Date: 11/19/2016
 * Time: 5:53 PM
 */

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Media;
use App\Models\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function increase($input)
    {
           $parameters = explode("&", $input);
            $id = $parameters[1];
            $gallery_media_id = $parameters[0];

            if (Auth::check()) {

                $association =  \DB::table('gallery_media')

                    ->select('gallery_media.order as order')
                    ->where('gallery_media.id' , '=', $gallery_media_id)
                    ->get('order');
                $order = (int)$association[0]->order+ 1;

                \DB::table('gallery_media')
                    ->where('gallery_media.id', $gallery_media_id)
                    ->update(['order' => $order]);

                $gallery = Gallery::find($id);
                $set = Set::find($gallery->set_id);
                $set_name = $set->name;



                $all_medias = Media::orderBy('id', 'DESC')->get();
                $final_all_medias=array();
                $set = Set::find($gallery->set_id);
                $set_name = $set->name;
                //dd ($set_name);
                $assigned_medias =  \DB::table('media')
                    ->join('gallery_media', 'media.id', '=', 'gallery_media.media_id')
                    ->select('media.*','gallery_media.id AS finalId', 'gallery_media.order AS order')
                    ->orderBy('gallery_media.order', 'desc')
                    ->where('gallery_media.gallery_id' , '=', $id)
                    ->get();
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
                return view('gallery.show', compact('gallery', 'final_all_medias','assigned_medias', 'id','set_name'))->with('email', Auth::user()->email)
                    ->with('success','Update Successful');
            } else
                return view('errors.permission');
    }
    public function decrease($input)
    {
        $parameters = explode("&", $input);
        $id = $parameters[1];
        $gallery_media_id = $parameters[0];
        if (Auth::check()) {

            $association =  \DB::table('gallery_media')

                ->select('gallery_media.order as order')
                ->where('gallery_media.id' , '=', $gallery_media_id)
                ->get('order');
            $order = (int)$association[0]->order- 1;
            \DB::table('gallery_media')
                ->where('gallery_media.id', $gallery_media_id)
                ->update(['order' => $order]);
            $gallery = Gallery::find($id);
            $set = Set::find($gallery->set_id);
            $set_name = $set->name;

            $all_medias = Media::orderBy('id', 'DESC')->get();
            $final_all_medias=array();
            $set = Set::find($gallery->set_id);
            $set_name = $set->name;
            //dd ($set_name);
            $assigned_medias =  \DB::table('media')
                ->join('gallery_media', 'media.id', '=', 'gallery_media.media_id')
                ->select('media.*','gallery_media.id AS finalId', 'gallery_media.order AS order')
                ->orderBy('gallery_media.order', 'desc')
                ->where('gallery_media.gallery_id' , '=', $id)
                ->get();
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



            return view('gallery.show', compact('gallery', 'final_all_medias','assigned_medias', 'id','set_name'))->with('email', Auth::user()->email)
                ->with('success','Update Successful');

        } else
            return view('errors.permission');

    }
    /*
    public function update($input)
    {
        $parameters = explode("&", $input);
        $id = $parameters[1];
        $gallery_media_id = $parameters[0];

        if (Auth::check()) {

            $association =  \DB::table('gallery_media')

                ->select('gallery_media.order as order')
                ->where('gallery_media.id' , '=', $gallery_media_id)
                ->get('order');
            $order = (int)$association[0]->order+ 1;

            \DB::table('gallery_media')
                ->where('gallery_media.id', $gallery_media_id)
                ->update(['order' => $order]);

            $gallery = Gallery::find($id);
            $set = Set::find($gallery->set_id);
            $set_name = $set->name;



            $all_medias = Media::orderBy('id', 'DESC')->get();
            $final_all_medias=array();
            $set = Set::find($gallery->set_id);
            $set_name = $set->name;
            //dd ($set_name);
            $assigned_medias =  \DB::table('media')
                ->join('gallery_media', 'media.id', '=', 'gallery_media.media_id')
                ->select('media.*','gallery_media.id AS finalId', 'gallery_media.order AS order')
                ->orderBy('gallery_media.order', 'desc')
                ->where('gallery_media.gallery_id' , '=', $id)
                ->get();
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



                return view('gallery.show', compact('gallery', 'final_all_medias','assigned_medias', 'id','set_name'))->with('email', Auth::user()->email)
                    ->with('success','Update Successful');

        } else
            return view('errors.permission');
    }



    public function destroy($input)
    {
        $parameters = explode("&", $input);
        $id = $parameters[1];
        $gallery_media_id = $parameters[0];
        if (Auth::check()) {

            $association =  \DB::table('gallery_media')

                ->select('gallery_media.order as order')
                ->where('gallery_media.id' , '=', $gallery_media_id)
                ->get('order');
            $order = (int)$association[0]->order- 1;
            \DB::table('gallery_media')
                ->where('gallery_media.id', $gallery_media_id)
                ->update(['order' => $order]);
            $gallery = Gallery::find($id);
            $set = Set::find($gallery->set_id);
            $set_name = $set->name;

            $all_medias = Media::orderBy('id', 'DESC')->get();
            $final_all_medias=array();
            $set = Set::find($gallery->set_id);
            $set_name = $set->name;
            //dd ($set_name);
            $assigned_medias =  \DB::table('media')
                ->join('gallery_media', 'media.id', '=', 'gallery_media.media_id')
                ->select('media.*','gallery_media.id AS finalId', 'gallery_media.order AS order')
                ->orderBy('gallery_media.order', 'desc')
                ->where('gallery_media.gallery_id' , '=', $id)
                ->get();
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



            return view('gallery.show', compact('gallery', 'final_all_medias','assigned_medias', 'id','set_name'))->with('email', Auth::user()->email)
                ->with('success','Update Successful');

        } else
            return view('errors.permission');
    }
    */
}
