<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Sign up to Job Box');

$I->amOnPage('/signup');

$I->fillField('email', 'test@test.com');
$I->fillField('password', 'test');
$I->fillField('repassword', 'test');
$I->fillField('name', 'James');
$I->fillField('city', 'test city');
$I->fillField('country', 'test country');
$I->fillField('gender', 'male');
$I->fillField('bio', 'This is a test bio');
$I->fillField('company', 'Test Company');
$I->fillField('position', 'Test Position');
$I->fillField('job_description', 'I currently work at test job!');
$I->click('Sign up');

$I->seeCurrentUrlEquals('/login');

$I->wantTo('perform actions and see result');
