<?php

namespace App\Http\Controllers\Admin\Authorities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Authorities;
use Illuminate\Support\Facades\Storage;
use App\Model\Duties;

class AuthoritiesController extends Controller
{
	// getAuthorities sends all Authorities to view
    public function getAuthorities(){
    	$Authorities = Authorities::where('authorities_city_id',1)->get();
    	return view('Admin.Authorities.Authorities',compact('Authorities'));
    }

    //newAuthorities renders a page for creating new Authorities
    public function newAuthorities(){
    	return view('Admin.Authorities.NewAuthorities');
    }

    //createAuthorities
    public function createAuthorities(Authorities $Authority , Request $request){
    	//validation
    	$this->validate($request, [
					'Authorities_title' => 'required',
					'Authorities_name' => 'required',
					'Authorities_family' => 'required',
					'Authorities_cv' => 'required',
			],[
				'Authorities_title.required'=>'ورود سمت الزامی است',
				'Authorities_name.required'=>'ورود نام الزامی است',
				'Authorities_family.required'=>'ورود فامیل الزامی است',
				'Authorities_cv.required'=>'ورود رزومه الزامی است',
				]);
    	// Create a record
		$Authority->authorities_title = $request->Authorities_title;
		$Authority->authorities_name = $request->Authorities_name;
		$Authority->authorities_family = $request->Authorities_family;
		$Authority->authorities_cv = $request->Authorities_cv;

		//save the picture
		$picturePaht = $request->file('Authorities_picture')->store('picture/authorities');

		//check if saved
		if($picturePaht){

			$Authority->authorities_picture = $picturePaht;
			// Insert in database and check
			if($Authority->save()){
				return redirect()->route('Get_Authorities')->with('success','مسئول جدید با موفقیت وارد شد');	
			}
			else{
				return redirect()->route('Get_Authorities')->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
			}
		}
		else{
			return redirect()->route('Get_Authorities')->with('error','خطای سیستمی لطفا دوباره سعی کنید');	
		}
    }

    //editAuthorities renders a page for editing Authority
    public function editAuthorities($id){
    	$EditableAuthorities = Authorities::find($id);
    	return view('Admin.Authorities.EditAuthorities' ,compact('EditableAuthorities'));
    }

    //doEditAuthorities 
    public function doEditAuthorities(Request $request , $id){
    	//validation
    	$this->validate($request, [
				'Authorities_title' => 'required',
				'Authorities_name' => 'required',
				'Authorities_family' => 'required',
				'Authorities_cv' => 'required',
		],[
			'Authorities_title.required'=>'ورود سمت الزامی است',
			'Authorities_name.required'=>'ورود نام الزامی است',
			'Authorities_family.required'=>'ورود فامیل الزامی است',
			'Authorities_cv.required'=>'ورود رزومه الزامی است',
			]);
    	//find Authority
    	$EditedAuthorities = Authorities::find($id);

    	//check if new picture is uploaded
    	if(is_uploaded_file($request->Authorities_picture)){
    		//delete the picture
    		Storage::delete($EditedAuthorities->authorities_picture);
    		//save the new picture
    		$NewPicturePath = $request->file('Authorities_picture')->store('picture/authorities');
    		$EditedAuthorities->authorities_picture = $NewPicturePath;
    	}
    	//Edit the record
    	$EditedAuthorities->authorities_title = $request->Authorities_title;
    	$EditedAuthorities->authorities_name = $request->Authorities_name;
    	$EditedAuthorities->authorities_family = $request->Authorities_family;
    	$EditedAuthorities->authorities_cv = $request->Authorities_cv;
    	//save and check if done
    	if($EditedAuthorities->save()){
    		return redirect()->route('Get_Authorities')->with('success','مسئول با موفقیت ویرایش شد');
    	}
    	else{
    		return redirect()->route('Get_Authorities')->with('error','خطای سیستمی لطفا دوباره سعی کنید');		
    	}
		}
		
		//deleteAuthorities
    public function deleteAuthorities($id){
    	$deletedRecord = Authorities::find($id);
			Storage::delete($deletedRecord->authorities_picture);
			// this Code should be comented
			// Duties::where('ad_authorities_title',$deletedRecord->authorities_title)->delete();
    	if($deletedRecord->delete()){
    		return back()->with('success','مسئول با موفقیت پاک شد');
    	}
    	else{
    		return back()->with('success','خطای سیستمی لطفا دوباره سعی کنید');	
    	}
    }
}
