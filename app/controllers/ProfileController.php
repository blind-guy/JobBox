<?php
use Intervention\Image\Facades\Image as Image;

class ProfileController extends \BaseController {
	
	public function ViewProfile(){
		
		if(!Auth::check()){
			return Redirect::to('/login');
		}
		$user = Auth::user();
		
		return View::make('profile', [
			'user' => $user]);
	}
	
	public function EditProfile(){
		
		if(!Auth::check()){
			return Redirect::to('/login');
		}
		$user = Auth::user();
		
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->country = Input::get('country');
		$user->bio = Input::get('bio');
		$user->company = Input::get('company');
		$user->position = Input::get('position');
		$user->job_description = Input::get('job_description');
		
		//image editing
		$image = Input::file('image');
		if($image != null){
			$destination = 'public/images/';
			$filename = $image->getClientOriginalName();
			$image->move($destination, $filename);
			Image::make($destination.$filename)->fit(300, 300)->save($destination.$filename);
			$user->profile_pic = 'images/'.$filename;
		}
		$user->save();
/*		try{
		catch(Exception $e){

			//Errors Log 
			 Session::flash('error_message', 'Oops! Something is wrong!');
			return Redirect::back()->withInput();
		}
*/		
			        return Redirect::to('/profile');
	}
}
?>