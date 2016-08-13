<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Login to Job Box');

$I->amOnPage('/login');

$I->fillField('email', 'test@test.com');
$I->fillField('password', 'test');
$I->click('Login');

$I->seeCurrentUrlEquals('/home');