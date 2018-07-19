<?php

Route::get('/test/{name}')
    ->uses('Pradeep\LaraCurl\Controllers\TestController@index');