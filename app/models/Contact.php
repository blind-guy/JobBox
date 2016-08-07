<?php

class Contact extends Eloquent  {

	protected $table = 'contacts';

	protected $fillable = ['name', 'user_id', 'company_id', 'job_id', 'comment_id', 'phone','email' ];

}