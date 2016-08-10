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
		$location = Input::get('location');
		
/*		try{
		*/	
			User::update([
				'name' => $name,
				'email' => $email,
				'location' => $location
			]);
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