<?php

class UserDoc extends Eloquent  {

	protected $table = 'documents';

	protected $fillable = ['ownerid', 'name'];

}