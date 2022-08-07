<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Uploadvideo;
use App\Playlist;
use Image;

class UploadvideoController extends Controller
{
    public function Uploadvideo()
    {
        $uploadvideo = Uploadvideo::get();
        Session::flash('page', 'uploadvideo');
        return view('admin.uploadvideo.view_uploadvideo', compact('uploadvideo'));
    }

    public function addEditUploadvideo(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Upload Video";
            $button ="Submit";
            $uploadvideo = new Uploadvideo;
            $uploadvideodata = array();
            $message = "Upload Video has been added sucessfully!";
        }else{
            $title = "Edit Upload Video";
            $button ="Update";
            $uploadvideo = Uploadvideo::where('id',$id)->first();
            $uploadvideodata= json_decode(json_encode($uploadvideo),true);
            $uploadvideo = Uploadvideo::find($id);
            $message = "Upload Video has been updated sucessfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            if(empty($data['title'])){
                return redirect()->back()->with('error_message', 'Title is required !');
            }
    
            if(empty($data['description']))
            {
                $data['description'] = "";
            }

            if(empty($data['utube_url']))
            {
                $data['utube_url'] = "";
            }
            if(empty($data['channel_name']))
            {
                $data['channel_name'] = "";
            }
            if(empty($data['playlist_id']))
            {
                $data['playlist_id'] = "";
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
                    $imagePath = 'images/uploadvideo_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $uploadvideo->image =$imagePath;
    
                }
            }
            $uploadvideo->title = $data['title'];
            $uploadvideo->description = $data['description'];
            $uploadvideo->utube_url = $data['utube_url'];
            $uploadvideo->channel_name = $data['channel_name'];
            $uploadvideo->playlist_id = $data['playlist_id'];
            $uploadvideo->save();
            Session::flash('success_message', $message);
            return redirect()->route('admin.uploadvideo');
        }
        $playlist = Playlist::get();
        Session::flash('page', 'uploadvideo');
        return view('admin.uploadvideo.add_edit_uploadvideo', compact('title','button','uploadvideodata','playlist'));
    }

    public function Deletevideo($id)
    {
      $uploadvideoimage = Uploadvideo::select('image')->where('id',$id)->first();
      $imagePath = 'images/uploadvideo_images/';
      //delete uploadvideo image from folder if exists
      if(file_exists($imagePath.$uploadvideoimage->image)){
          unlink($imagePath.$uploadvideoimage->image);
      }
      //Delete uploadvideo image from uploadvideos table
      Uploadvideo::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Video has been deleted successfully!');

    }


    public function deleteUploadvideo($id)
    {
      $id =Uploadvideo::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'uploadvideo Slider has been deleted successfully!');

    }
}
