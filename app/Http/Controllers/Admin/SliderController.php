<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function getSlides(Slider $Slide){
        $Slides = $Slide->orderBy('created_at','desc')->limit(3)->get();
        return view('Admin.Slider.Slider',compact('Slides'));
    }

    public function updateSlides(Request $request){
        $Slid = new Slider();
        $index = 0;
        $updatedRecored = $Slid->find($request->id);        
        if($request->desktop_picture){
            Storage::delete($updatedRecored->picture);
            $Picture = $request->file('desktop_picture')->store('picture/slider');
            $updatedRecored->picture = $Picture;
            $index++;
        }

        if($request->mobile_picture){
            Storage::delete($updatedRecored->mobile_picture	);
            $Picture = $request->file('mobile_picture')->store('picture/slider');
            $updatedRecored->mobile_picture = $Picture;
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

    public function createSlide(Request $request,Slider $Slide){
        $this->validate($request ,
        [
            'desktop_picture' => 'required',
            'mobile_picture' => 'required',
            'title' => 'required',
            'link' => 'required'
        ],
        [
            'desktop_picture.required' => 'مقادیر کامل نیستند',
            'mobile_picture.required' => 'مقادیر کامل نیستند',
            'title.required' => 'مقادیر کامل نیستند',
            'link.required' => 'مقادیر کامل نیستند',
        ]);

        $Picture = $request->file('desktop_picture')->store('picture/slider');
        $mobile_picture = $request->file('mobile_picture')->store('picture/slider');

        $Slide->title =  $request->title;
        $Slide->picture =  $Picture;
        $Slide->mobile_picture =  $mobile_picture;
        $Slide->link =  $request->link;

        if($Slide->save()){
            return back()->with('success','تغییرات با موفقیت اعمال شد');
        }

        return back()->with('error','خطای سیستمی');
    }

    public function deleteSlide($id){
        $Slid = new Slider();
        $deletedRecored = $Slid->find($id); 
        Storage::delete($deletedRecored->picture);
        if($deletedRecored->delete()){
            return back()->with('success','اسلاید حذف شد');
        }
        return back()->with('error','خطای سیستمی');
    }
}
