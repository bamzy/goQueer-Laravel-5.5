<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Models\Set;
use App\Models\Media;
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

        $query = Media::select('id', 'name', 'source','publish_date','description');
        return datatables($query)->make(true);
    }
    public function getProfiles()
    {

        $query = Profile::select('id', 'name','description');
        return datatables($query)->make(true);
    }
     public function getLocations()
    {
        $query = \DB::table('location')
            ->join('profile', 'location.profile_id', '=', 'profile.id')
            ->select('location.*', 'profile.name as profileName')->get();
        return datatables($query)->make(true);
    }

}
