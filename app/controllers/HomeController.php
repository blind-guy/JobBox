<?php
 
class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


	
	public function showHomePage(){
		
		if(!Auth::check()){
			return Redirect::to('/login');
		}

		$user = Auth::user();

		return View::make('home',[
			'user' => $user
		])->with('search_results', null);
		
	}

    public function jobSearch()
    {
        if(!Auth::check()){
            return Redirect::to('/login');
        }

        $user = Auth::user();
        
        $validation = Validator::make(Input::all(),[
            'location' => 'required',
            'keywords' => 'required'
        ]);
        
        if($validation->fails()){
            $messages = $validation->messages();
            Session::flash('validation_messsages', $messages);
            return Redirect::back()->withInput();
        }

        $location = urlencode(Input::get('location'));
        $keywords = urlencode(Input::get('keywords'));
        $query = 'http://api.indeed.com/ads/apisearch?publisher=1943955385502944&q='.$keywords.'&l='.$location.'&v=2';
        $search_res = file_get_contents($query);
        $xml_obj = simplexml_load_string($search_res);
//        var_dump($query);
//        die();

        return View::make('home',[
            'user' => $user
        ])->with('search_results', $xml_obj);
        
    }
}


/*old code, could use later for the profile


	public function showUserProfile($uid){

		$count = User::where('id', '=', $uid)->count();

		if($count == 0){
			return Redirect::to('/feed');
		}

		//array
		//$user = User::where('id', '=', $uid)->get();

		//single row
		$user = User::where('id', '=', $uid)->first();

		return View::make('profile', [
			'user'	=> $user
		]);

	}


}
*/
