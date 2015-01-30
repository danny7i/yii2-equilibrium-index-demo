<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('test equilibrium index on the web page');
$I->amOnPage('/5,-9,3,6,15,8,7,1,9,4,-1');
$I->see('5');

$I->wantTo('test the handling of extra spaces');
$I->amOnPage('/5,   -9,3,6,15,   8,7,1,9     ,4,-1');
$I->see('5');

$I->wantTo('test exception for non-numeric elements');
$I->amOnPage('/5,-9,3,6,15,sometext,7,1,9,4,-1/strict');
$I->canSeeResponseCodeIs(400);

$I->wantTo('test when the last index is also an equilibrium index when the sum of all elements equals zero');
$I->amOnPage('/3,0, -7,9,1  ,2,-16,    7,1');
$expected = <<<str
Array
(
    [0] => 6
    [1] => 8
)
str;
$I->see($expected);



//3,0, -7,9,1  ,2,-16,    7,1

//$I->amOnPage('/2,1,3,7,-6,8,-10,-1,-4');
//$I->see('5');


