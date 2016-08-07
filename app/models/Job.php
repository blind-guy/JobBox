<?php

class Job extends Eloquent  {

	protected $table = 'jobs';

	protected $fillable = ['company_id', 'company_name', 'posted', 'expired', 'job_url', 'contactid', 'position', 'summary'];

}