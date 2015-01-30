PHP Equilibrium Index Using Yii2
================================

This is a Yii2 project in which you can supply an array of comma-separated integers in the request url and receive Equilibrium Index/Indice of that array. 


About Equilibrium Index
-----------------------

http://www.geeksforgeeks.org/equilibrium-index-of-an-array/


About This Project
------------------

* Defined a service *app/services/EquilibriumIndexService* as an application component which can located by calling:

```php
Yii::$app->equilibriumIndex
```

* Created routing rules for URL format ```*/equilibrium-index/comma,separated,array,elements[/strict]``` where:
    * Comma-separated integers will be used to calculate their Equilibrium Index.
    * If *strict* is set and an non-numeric array element is found, an 400 error will be returned; otherwise it will be discarded silently.

* Created acceptance tests for the site. The test file is ```tests/acceptance/EICept.php```.

Set Up
------

* This project requires PHP >= 5.4 and [composer](https://getcomposer.org/) installed
* After downloading the source, run 

```
composer update
```

to pull dependencies
* Configure ```tests/acceptance.suite.yml``` to set your local test url:

```
    config:
        PhpBrowser:
            url: '[YOUR URL]/equilibrium-index/'
```

* To run the tests:

```
vendor/bin/codecept run
```

