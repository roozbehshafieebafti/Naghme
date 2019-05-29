<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function getSlides(Slider $Slide){
        $Slides = $Slide->all();
        return view('Admin.Slider.Slider',compact('Slides'));
    }

    public function updateSlides(Request $request){
        $Slid = new Slider();
        $index = 0;
        $updatedRecored = $Slid->find($request->id);        
        if($request->picture){
            Storage::delete($updatedRecored->picture);
            $Picture = $request->file('picture')->store('picture/slider');
            $updatedRecored->picture = $Picture;
            $index++;
        }

        if($request->title){
            $updatedRecored->title = $request->title;
            $index++;
        }

        if($request->link){
            $updatedRecored->link = $request->link;
            $index++;
        }

        if($index > 0){
            $updatedRecored->save();

            return back()->with('success','تغییرات با موفقیت اعمال شد');
        }
        return back()->with('error','شما تغییراتی ایجاد نکردید');
    }
}
