<?php

class ProfileController extends \BaseController {
	
	public function showProfile(){
		
		if(!Auth::check()){
			return Redirect::to('/login');
		}
		$user = Auth::user();
		
		return View::make('profile', [
			'user' => $user]);
	}
}
?>