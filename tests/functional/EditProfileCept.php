<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Edit my Job Box profile');

$I->amOnPage('/profile');

$I->fillField('email', 'testupdate@test.com');
$I->fillField('name', 'James Updated');
$I->fillField('city', 'test city updated');
$I->fillField('country', 'test country updated');
$I->fillField('bio', 'This is a test bio updated');
$I->fillField('company', 'Test Company updated');
$I->fillField('position', 'Test Position updated');
$I->fillField('job_description', 'I currently work at test job now updated!');
$I->click('Edit Profile');

$I->seeCurrentUrlEquals('/profile');

$I->wantTo('perform actions and see result');