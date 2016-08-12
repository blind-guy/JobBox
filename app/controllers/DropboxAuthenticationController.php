<?php

class DropboxAuthenticationController extends \BaseController {

	public function showDropboxView(){

		$user = Auth::user();

        if(!Auth::check()){
			return Redirect::to('login');
		}

		return View::make('dropbox');


	}

	public function authenticateUser(){

		$appInfo = new Dropbox\AppInfo(getenv('DROPBOX_KEY'), getenv('DROPBOX_SECRET'));
		$appName = "WebTech_4413";
		$uri = "http://localhost:8000/authenticated";

		$csrfTokenStore = new SessionEntryStore('dropbox-auth-csrf-token');

		$webAuth = new Dropbox\WebAuth($appInfo, $appName, $uri, $csrfTokenStore);

		$authUrl = $webAuth->start();

		return Redirect::to($authUrl);


	}

	public function dropboxAuthenticated(){

		session_start();

		$csrfTokenStore = new SessionEntryStore('dropbox-auth-csrf-token');
		$appInfo = new Dropbox\AppInfo(getenv('DROPBOX_KEY'), getenv('DROPBOX_SECRET'));
		$appName = "WebTech_4413";
		$uri = "http://localhost:8000/authenticated";


		$csrfTokenStore = new SessionEntryStore('dropbox-auth-csrf-token');

		$webAuth = new Dropbox\WebAuth($appInfo, $appName, $uri, $csrfTokenStore);

		$token = $webAuth->finish(Input::all());
		$user = Auth::user();

		// save token into DB
		$user->dropbox_token = implode("",$token);

		return Redirect::to("/mydocuments");
		
	}


	public function showMyDocumentsView (){



		if(!Auth::check()){
			return Redirect::to('/login');
		}

		$user = Auth::user();

		$docs = UserDoc::where('ownerid', '=', $user->id)->get();


		return View::make('mydocuments', [
			'user' => $user,
			'docs' => $docs

			]);


		
    
    }
    public function uploadDocument(){

    	$user = Auth::user();

    	$image = Input::file('image');
        $destination = 'public/images/';
        $filename = $image->getClientOriginalName();
        $image->move($destination, $filename);
        $name = 'images/'.$filename;

      	try{

			UserDoc::create([
				'ownerid'=> $user->id,
				'name' => $name
			]);

		}catch(Exception $e){

			//Errors Log 
			 Session::flash('error_message', 'Oops! Something is wrong!');
			// echo $e;
			return Redirect::back()->withInput();
		}


		Session::flash('success_message', 'File successfully uploaded');
		return Redirect::to('/mydocuments');

	
    }
}


use Dropbox\Valuestore;

class SessionEntryStore implements ValueStore{

	private $key;

	function __construct($key){
		$this->key = $key;
	}

	function get(){
		return Session::get($this->key);
	}

	function set($value){
		Session::put($this->key, $value);
	}

	function clear(){
		Session::forget($this->key);
	}
}
