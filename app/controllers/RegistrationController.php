<?php
use Intervention\Image\Facades\Image as Image;

class RegistrationController extends \BaseController{

	/*
	 * ShowSignUpView:
	 * This function renders the sign up view which consists of
	 * a sign form.
	 */
	public function showSignUpView(){

		if(Auth::check()){
			return Redirect::to('/home');
		}

		return View::make('signup');

	}	

	/* 
	 * signUp(): Sign up form on the sign up view POSTS
	 * to this function. 
	 * This function creates a new user and redirects them to login. 
	 */
	public function signUp(){

		$validation = Validator::make(Input::all(),[
			'email' =>' required|unique:users', 
			'password' => 'required',
			'repassword' => 'required',
			'name'	=> 'required',
			'gender'	=> 'required'
		]);

		if($validation->fails()){
            $messages = $validation->messages();
            Session::flash('validation_messages', $messages);
            return Redirect::back()->withInput();
        }


		$email = Input::get('email');
		$password = Input::get('password');
		$repassword = Input::get('repassword');
		$name = Input::get('name');
		$gender = Input::get('gender');
        $city = Input::get('city');
		$country = Input::get('country');
		$bio = Input::get('bio');
		$company = Input::get('company');
		$position = Input::get('position');
		$job_description = Input::get('job_description');

        $image = Input::file('image');
        $destination = 'public/images/';
        $filename = $image->getClientOriginalName();
        $image->move($destination, $filename);

        Image::make($destination.$filename)->fit(300, 300)->save($destination.$filename);
        $profile_pic = 'images/'.$filename;
/*        var_dump($profile_pic);
        die(); */
		try{

			User::create([
				'email'	            => $email,
				'password'	        => Hash::make($password),
				'name'              => $name,
				'gender'	        => $gender,
                'profile_pic'       => $profile_pic,
                'bio'               => $bio,
                'city'              => $city,
                'country'           => $country,
                'company'           => $company,
                'position'          => $position,
                'job_description'   => $job_description
			]);

		}catch(Exception $e){

			//Errors Log 
			 Session::flash('error_message', 'Oops! Something is wrong!');
			return Redirect::back()->withInput();
		}


		Session::flash('success_message', 'Success! Welcome to Our Job Box');
		return Redirect::to('/login');

	}

	/* Unused code
	

		// Code to send verification code
        Mail::send('emails.verify', $view_data, function ($message) use ($email_data) {
            $message->to($email_data['recipient'])
                ->subject($email_data['subject']);
        });

    */     
}
