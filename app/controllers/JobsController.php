<?php

class JobsController extends \BaseController {

    public function showAddJobsView(){

        return View::make('addjob');

    }

	public function addJob(){

        

		$validation = Validator::make(Input::all(),[
            
            'position' => 'required',
            'company' => 'required',
            'summary' => 'required',
            'date_posted' => 'date',
            'contact' => 'required',
            'job_url' => 'required'
        ]);

        if($validation->fails()){
            $messages = $validation->messages();
            Session::flash('validation_messages', $messages);
            return Redirect::back()->withInput();
        }


        $position = Input::get('position');
        $companyid = Input::get('company');
        $summary = Input::get('summary');
        $date_posted = Input::get('date'); // change
        $contactid = Input::get('contact');
        $job_url = Input::get('job_url');


        //echo $contactname;

        /* get the contact id based on the contact name
        try{
            $contact = Contact::where('name', '=', $contactname)->get();
        }catch(Exception $e){
            Session::flash('error_message', 'No contact found!');
            return Redirect::back()->withInput();
        }
        */
        //dd($position);
        //dd($companyid);
        //dd($summary);
        //dd($date_posted);
        //dd($contactid);
        //dd($job_url);
        
        // Add a job to the jobs table
        try{
            Job::create([
                'position' => $position,
                'company_id' => $companyid,
                'company_name' => 'Company',
                'summary' => $summary,
                'posted' => $date_posted,
                'expired' => '2017-01-01',
                'contactid' => $contactid,
                'job_url' => $job_url
            ]);

        }catch(Exception $e){

            //Errors Log 
            Session::flash('error_message', 'Error in saving new job!');
            //echo $e;
            return Redirect::back()->withInput();
            //return Redirect::back()->render();
        }

        $user = Auth::user();
        $job = Job::where('company_id', '=', $companyid)->first();

        //dd($user);
        // Add an entry to the user_job table
        try{
            UserJob::create([
                'user_id' => $user->id,
                'job_id' => $job->id
            ]);

        }catch(Exception $e){

            //Errors Log 
             Session::flash('error_message', 'Error in saving new user-job!');
            return Redirect::back()->withInput();
        }

        // Show a flash message
        \Session::flash('success_message', 'Success! New job has been added!');
        return Redirect::to('/addjob');
        
        
    }


    public function viewJobs(){

        if(!Auth::check()){
            return Redirect::to('/login');
        }

        $user = Auth::user();

        // Get your set of User-Jobs
        try{
            $userjobs = UserJob::where('user_id', '=', $user->id)->get();
        }catch(Exception $e){
            Session::flash('error_message', 'No jobs found!');
            return Redirect::back()->withInput();
        }

        foreach($userjobs as $userjob){
            $myjobs = Job::where('job_id', '=', $userjob->id)->get();
        }

        return View::make('viewjobs', [
            'user'  => $user,
            'jobs' => $myjobs,
        ]);

    }


}
