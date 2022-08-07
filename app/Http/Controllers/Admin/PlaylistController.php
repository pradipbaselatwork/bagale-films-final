<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Image;
use App\Playlist;

class PlaylistController extends Controller
{
    public function Playlist()
    {
        $playlist = Playlist::get();
        Session::flash('page', 'playlist');
        return view('admin.playlist.view_playlist', compact('playlist'));
    }

    public function addEditPlaylist(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Playlist";
            $button ="Submit";
            $playlist = new Playlist;
            $playlistdata = array();
            $message = "Playlist has been added sucessfully!";
        }else{
            $title = "Edit Playlist";
            $button ="Update";
            $playlist = Playlist::where('id',$id)->first();
            $playlistdata= json_decode(json_encode($playlist),true);
            $playlist = Playlist::find($id);
            $message = "Playlist has been updated sucessfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            if(empty($data['playlist']))
            {
                $data['playlist'] = "";
            }

            if(!empty($data['image'])){
                $image_tmp = $data['image'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/playlist_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $playlist->image =$imagePath;
    
                }
            }

            $playlist->playlist = $data['playlist'];
            $playlist->save();
            Session::flash('success_message', $message);
            return redirect('admin/playlist');
        }

        Session::flash('page', 'playlist');
        return view('admin.playlist.add_edit_playlist', compact('title','button','playlistdata'));
    }

    public function deletePlaylist($id)
    {
      $id =Playlist::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Playlist has been deleted successfully!');

    }
}

