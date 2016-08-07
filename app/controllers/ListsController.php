<?php

class ListsController extends \BaseController {

	public function getLists(){
		/* Get all lists from database needed for dropdowns in View */

		//get all company records from DB; return to view to be displayed in menu
		$company_options = Company::lists('name', 'id');

		// get all contacts in the db; return to view
		$contact_options = Contact::lists('name', 'id');

		return View::make('addjob', [
			'company_options'	=> $company_options,
			'contact_options'	=> $contact_options
		]);
	}


}
