<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Models\Set;
use App\Models\Media;
use App\Models\Gallery;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

    public function getCustomers()
    {
        $query = Customer::select('first_name', 'last_name', 'email');
        return datatables($query)->make(true);
    }
    public function getSets()
    {
        $query = Set::select('id', 'name', 'description','created_at');
        return datatables($query)->make(true);
    }
     public function getMedias()
    {
//        return null;
        $query = DB::table('media')
            ->leftjoin('gallery_media', 'media.id','=','gallery_media.media_id')
//            ->join('gallery','gallery_media.gallery_id','=','gallery.id')
            ->select('media.id','media.name','media.source','media.publish_date','media.description','gallery.name as gallery_name')
            ->leftjoin('gallery','gallery_media.gallery_id','=','gallery.id')->get();

//         $galleries = Gallery::all();
//         foreach ($query as $user) {
//             foreach ($galleries as $gallery) {
//                 if ($gallery->id == $user->gallery_name)
//                     $user->gallery_name = $gallery->name;
//             }
//
//         }
//         dd($query);
//        return;
//        $query = Media::select('id', 'name', 'source','publish_date','description');
        return datatables($query)->make(true);
    }
    public function getProfiles()
    {

        $query = Profile::select('id', 'name','description','show','visibleToPlayer','passwordProtected');
        return datatables($query)->make(true);
    }

    public function getGalleries()
    {
        $query =  DB::table('gallery')
            ->join('sets', 'gallery.set_id', '=', 'sets.id')
            ->select('gallery.*','sets.name AS set_name')
            ->orderBy('gallery.id', 'desc')
            ->get();

//        $query = Profile::select('id', 'name','description');
        return datatables($query)->make(true);
    }
     public function getLocations()
    {
        $query = \DB::table('location')
            ->leftjoin('profile', 'location.profile_id', '=', 'profile.id')
            ->select('location.*', 'profile.name as profileName')->get();
        return datatables($query)->make(true);
    }

}
