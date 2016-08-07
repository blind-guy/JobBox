<?php

class Company extends Eloquent  {

	protected $table = 'companies';

	protected $fillable = ['name', 'street_address', 'state', 'zip_code', 'phone', 'email', 'business_type', 'mission_statement'];

}