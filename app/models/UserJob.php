<?php

class UserJob extends Eloquent  {

	protected $table = 'user_job';

	protected $fillable = ['user_id', 'job_id'];

}