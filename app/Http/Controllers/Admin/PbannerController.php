<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Pbanner;
use Image;

class PbannerController extends Controller
{
    public function Pbanner()
    {
        $pbanner = Pbanner::get();
        Session::flash('page', 'pbanner');
        return view('admin.pbanner.view_pbanner', compact('pbanner'));
    }

    public function addEditpbanner(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Playlist Banner";
            $button ="Submit";
            $pbanner = new Pbanner;
            $pbannerdata = array();
            $message = "Playlist Banner has been added sucessfully!";
        }else{
            $title = "Edit Playlist Banner";
            $button ="Update";
            $pbanner = Pbanner::where('id',$id)->first();
            $pbannerdata= json_decode(json_encode($pbanner),true);
            $pbanner = Pbanner::find($id);
            $message = "Playlist Banner has been updated sucessfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            if(empty($data['title'])){
                return redirect()->back()->with('error_message', 'Title is required !');
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
                    $imagePath = 'images/pbanner_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $pbanner->image =$imagePath;
    
                }
            }
            $pbanner->title = $data['title'];
            $pbanner->save();
            Session::flash('success_message', $message);
            return redirect()->route('admin.pbanner');
        }

        Session::flash('page', 'pbanner');
        return view('admin.pbanner.add_edit_pbanner', compact('title','button','pbannerdata'));
    }

    public function deletePbanner($id)
    {
      $id =Pbanner::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Playlist Banner has been deleted successfully!');

    }
}
