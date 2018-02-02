<?php
/**
 * Created by PhpStorm.
 * User: bamdad
 * Date: 11/19/2016
 * Time: 5:53 PM
 */

namespace App\Http\Controllers;

use App\Models\Discovery;
use Illuminate\Support\Facades\DB;
use App\Models\Gallery;
use App\Models\Set;
use App\Models\Media;
use App\Models\Player;
use Illuminate\Http\Request;
class PlayerController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest');

    }
    public function getMyLocations(Request $request)
    {
        if ($request->device_id == null)
            return;

        $player = DB::table('player')->where('device_id', '=', $request->device_id)->first();
        if ($player == null) {
            $userId = \DB::table('user')->insert(
                [
                    'role_id' => '2',
                    'name' => 'Auto-generated Record',
                    'password' => 'no password',
                    'email' => $request->device_id,

                ]
            );
            $user = DB::table('user')->where('email', '=', $request->device_id)->first();

            $id = \DB::table('player')->insert(
                [

                    'user_id' => $user->id,
                    'device_id' => $request->device_id,

                ]
            );

        }

        $locations = $this->getMyDiscoveredLocationsAsList($request->device_id,$request->profile_name);

        return $locations;
    }
    public function getAllLocations(Request $request)
    {
        $locations = $this->getAllLocationsAsList($request->profile_name);
        return $locations;

    }
    public function getAllLocationsAsList($profile_name){
        $profile = DB::table('profile')->where('profile.name','=',$profile_name)->first();

        if ($profile != null)
        return DB::table('location')->where('profile_id','=',$profile->id)->get();
    }
    public function downloadMediaById(Request $request){
        $media = Media::find($request->media_id);
        if (sizeof($media) > 0 )
        {
            $file = public_path() . "/uploads/" . $media->fileName;

            $headers = array(
                'Content-Type: application/pdf',
            );

            return response()->download($file, $media->fileName, $headers);
        }
    }

    public function getMediaById(Request $request)
    {

        $myLocations = DB::table('player')->where('player.device_id','=',$request->device_id)
            ->join('discovery', 'discovery.player_id', '=', 'player.id')
            ->join('location', 'location.id', '=', 'discovery.location_id')
            ->join('gallery','location.gallery_id','=','gallery.id')
            ->join('gallery_media','gallery_media.gallery_id','=','gallery.id')
            ->join('gallery_media','gallery_media.media_id','=',$request->media_id)
            ->select('media.source,media.name,media.description,media.publish_date,media.display_date,media.type_id')
            ->get();
        return $myLocations;
    }


    public function getMediaByGalleryId(Request $request)
    {

        $myLocations = DB::table('gallery_media')->where('gallery_media.gallery_id','=',$request->gallery_id)
            ->join('media', 'gallery_media.media_id', '=', 'media.id')
            ->select('media.id','media.source','media.name','media.description','media.publish_date','media.display_date','media.type_id')
            ->orderby('gallery_media.order','desc')
            ->get();
        return $myLocations;
    }


    public function getSetStatusSummary(Request $request)
    {
        $player = DB::table('player')->where('device_id','=',$request->device_id)->first();
        $id = null;
        if ($player == null) {
            $userId = \DB::table('user')->insert(
                [
                    'role_id' => '2',
                    'password' => 'no password',
                    'email' => $request->device_id,

                ]
            );
            $user = DB::table('user')->where('email', '=', $request->device_id)->first();

            $id = \DB::table('player')->insert(
                [

                    'user_id' => $user->id,
                    'device_id' => $request->device_id,

                ]
            );

        }
        $player = DB::table('player')->where('device_id','=',$request->device_id)->first();
        $gallery = Gallery::find($request->gallery_id);
        $set = Set::find($gallery->set_id);
        $galleries =  DB::table('gallery')->where('gallery.set_id','=',$set->id)->get();

        $discoveredLocationCounter = 0;
        $allLocationCounter = 0;
        foreach ($galleries as $gallery) {
            $locations = DB::table('location')->where('location.gallery_id','=',$gallery->id)->get();
            $allLocationCounter = $allLocationCounter + sizeof($locations);
            foreach ($locations as $location) {
                $discoveredLocations = DB::table('discovery')->where('location_id', '=', $location->id)
                    ->where('player_id', '=', $player->id)->get();
                $discoveredLocationCounter = $discoveredLocationCounter + sizeof($discoveredLocations);
            }
        }
        return "This gallery is one of the " . sizeof($galleries) . " galleries in this set and you have discovered. " . $discoveredLocationCounter. " out of " . $allLocationCounter . " locations";

    }



    public function getGalleryById(Request $request)
    {

        $gallery = DB::table('gallery')->where('gallery.id','=',$request->gallery_id)->get();

            return $gallery;


    }
    public function updateDiscoveryStatus(Request $request)
    {
        $player = DB::table('player')->where('device_id','=',$request->device_id)->first();
        $user = DB::table('user')->where('email', '=', $request->device_id)->first();
        var_dump($request->device_id);
        var_dump($player);

        $data = new Player;
        if ($player == null ) {

            $data->user_id = $user->id;
            $data->device_id = $request->device_id;
            $data->created_at = new \DateTime('now');
            $data->updated_at = new \DateTime('now');
            $data->save();
        } else
            $data->id = $player->id;






        $discovery = DB::table('discovery')->where('discovery.player_id', '=', $data->id)
                ->where('discovery.location_id', '=',$request->location_id)
            ->get();
        if ($discovery == null) {
            \DB::table('discovery')->insert(
                [
                    'location_id' => $request->location_id,
                    'player_id' => $data->id,
                    'created_at' => new \DateTime('now'),
                    'updated_at' => new \DateTime('now')
                ]
            );
            return 'Successful';
        }
        return 'Failed';
    }

    public function getHint(Request $request)
    {
        $hints = [];
        $player = DB::table('player')->where('device_id', '=', $request->device_id)->first();
        if ($player == null) {
            $userId = \DB::table('user')->insert(
                [
                    'role_id' => '2',
                    'password' => 'no password',
                    'email' => $request->device_id,

                ]
            );
            $user = DB::table('user')->where('email', '=', $request->device_id)->first();

            $id = \DB::table('player')->insert(
                [

                    'user_id' => $user->id,
                    'device_id' => $request->device_id,

                ]
            );

        }

        $player = DB::table('player')->where('device_id', '=', $request->device_id)->first();


        $user = \DB::table('user')->where('id', '=', $player->user_id)->first();
        if ($user == null)
            return "There is no hint for not registered users";
        $myLocations = $this->getMyDiscoveredLocationsAsList($request->device_id,$request->profile_name);
        $allLocations = $this->getAllLocationsAsList($request->profile_name);

        $flag= false;

        foreach ($allLocations as $allLocation) {
            $flag = false;
            foreach ($myLocations as $myLocation) {
                if ($allLocation->id === $myLocation->id){
                    $flag = true;
                }
            }
            if (!$flag ){
                $temp = DB::table('hint')->where('location_id', '=', $allLocation->id)->get();

                $hints = array_merge($hints, $temp);
            }
        }
        if (sizeof($hints) > 0 ) {
            date_default_timezone_set("America/Edmonton");
            $start_date = new \DateTime($user->hint_request);
            $current_date = $date = date('Y-m-d h:i:s');
            $current_date = new \DateTime($current_date,new \DateTimeZone('America/Edmonton'));
            $since_start = $start_date->diff($current_date);
            $minutes = $since_start->days * 24 * 60;
            $minutes += $since_start->h * 60;
            $minutes += $since_start->i;
            if ($minutes > 300 ) {
                DB::table('user')->where('id', '=', $player->user_id)->update(['hint_request' =>new \DateTime('now',new \DateTimeZone('America/Edmonton'))]);
//                return $hints[rand(0, sizeof($hints) - 1)]->content .'|current='. $current_date->format('Y-m-d h:i:s') . '|minutes='. $minutes . '|day=' . $since_start->days . '|h='.  $since_start->h . '|m='.  $since_start->m .'|i='.$since_start->i  ;
                return $hints[rand(0, sizeof($hints) - 1)]->content  ;
            }
            else
                return "You have used all your hints for now, try again in ". (300 - $minutes) . " minutes" ;

        } else
            return "No more hints left";
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getMyDiscoveredLocationsAsList($device_id,$profile_name)
    {
        $profile = DB::table('profile')->where('profile.name','=',$profile_name)->first();
        //{!! Form::select('show', array('0'=>'No', '1'=>'Yes','2'=> 'Only show pins, not the galleries'), null, ['class' => 'form-control']) !!}
        if ($profile != null) {
//            if ($profile->show == 1 || $profile->show == 2)
//                return $this->getAllLocationsAsList($profile_name);
//            else if ($profile->show == 0) {
                $myLocations = DB::table('player')->where('player.device_id', '=', $device_id)
                    ->join('discovery', 'discovery.player_id', '=', 'player.id')
                    ->join('location', 'location.id', '=', 'discovery.location_id')
                    ->where('location.profile_id', '=', $profile->id)
                    ->select('location.*')
                    ->get();

    //        var_dump($myLocations);
                return $myLocations;
            }
//        }
//        else return null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */



}