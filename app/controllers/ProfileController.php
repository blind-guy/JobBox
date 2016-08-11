<?php

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
		
		$name = Input::get('name');
		$email = Input::get('email');
		$email = Input::get('email');
		$password = Input::get('password');
		$repassword = Input::get('repassword');
		$country = Input::get('country');
		$bio = Input::get('bio');
		$company = Input::get('company');
		$position = Input::get('position');
		$job_description = Input::get('job_description');

/*		try{
		*/	
		$user->save();
		/*catch(Exception $e){

			//Errors Log 
			 Session::flash('error_message', 'Oops! Something is wrong!');
			return Redirect::back()->withInput();
		}
*/	
		return View::make('profile', [
			'user' => $user]);
	}
}
?>