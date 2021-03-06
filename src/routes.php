<?php

Route::group(config('shop.routes.login', ['middleware' => ['web']]), function() {

	Route::match( array( 'GET' ), 'admin', array(
		'as' => 'aimeos_shop_admin',
		'uses' => 'Aimeos\Shop\Controller\AdminController@indexAction'
	));

});


Route::group(config('shop.routes.extadm', ['prefix' => 'admin/{site}/extadm', 'middleware' => ['web', 'auth']]), function() {

	Route::match( array( 'POST' ), 'do', array(
		'as' => 'aimeos_shop_extadm_json',
		'uses' => 'Aimeos\Shop\Controller\ExtadmController@doAction'
	));

	Route::match( array( 'GET' ), 'file', array(
		'as' => 'aimeos_shop_extadm_file',
		'uses' => 'Aimeos\Shop\Controller\ExtadmController@fileAction'
	));

	Route::match( array( 'GET' ), '', array(
		'as' => 'aimeos_shop_extadm',
		'uses' => 'Aimeos\Shop\Controller\ExtadmController@indexAction'
	));

});


Route::group(config('shop.routes.jqadm', ['prefix' => 'admin/{site}/jqadm', 'middleware' => ['web', 'auth']]), function() {

	Route::match( array( 'GET' ), 'file/{type}', array(
		'as' => 'aimeos_shop_jqadm_file',
		'uses' => 'Aimeos\Shop\Controller\JqadmController@fileAction'
	));

	Route::match( array( 'GET', 'POST' ), 'copy/{resource}/{id}', array(
		'as' => 'aimeos_shop_jqadm_copy',
		'uses' => 'Aimeos\Shop\Controller\JqadmController@copyAction'
	));

	Route::match( array( 'GET', 'POST' ), 'create/{resource}', array(
		'as' => 'aimeos_shop_jqadm_create',
		'uses' => 'Aimeos\Shop\Controller\JqadmController@createAction'
	));

	Route::match( array( 'GET', 'POST' ), 'delete/{resource}/{id}', array(
		'as' => 'aimeos_shop_jqadm_delete',
		'uses' => 'Aimeos\Shop\Controller\JqadmController@deleteAction'
	));

	Route::match( array( 'GET' ), 'get/{resource}/{id}', array(
		'as' => 'aimeos_shop_jqadm_get',
		'uses' => 'Aimeos\Shop\Controller\JqadmController@getAction'
	));

	Route::match( array( 'POST' ), 'save/{resource}/{id?}', array(
		'as' => 'aimeos_shop_jqadm_save',
		'uses' => 'Aimeos\Shop\Controller\JqadmController@saveAction'
	));

	Route::match( array( 'GET', 'POST' ), 'search/{resource}', array(
		'as' => 'aimeos_shop_jqadm_search',
		'uses' => 'Aimeos\Shop\Controller\JqadmController@searchAction'
	));

});


Route::group(config('shop.routes.jsonadm', ['prefix' => 'admin/{site}/jsonadm', 'middleware' => ['web', 'auth']]), function() {

	Route::match( array( 'DELETE' ), '{resource}/{id?}', array(
		'as' => 'aimeos_shop_jsonadm_delete',
		'uses' => 'Aimeos\Shop\Controller\JsonadmController@deleteAction'
	))->where( array( 'resource' => '[^0-9]+', 'id' => '[0-9]*' ) );

	Route::match( array( 'GET' ), '{resource}/{id?}', array(
		'as' => 'aimeos_shop_jsonadm_get',
		'uses' => 'Aimeos\Shop\Controller\JsonadmController@getAction'
	))->where( array( 'resource' => '[^0-9]+', 'id' => '[0-9]*' ) );

	Route::match( array( 'PATCH' ), '{resource}/{id?}', array(
		'as' => 'aimeos_shop_jsonadm_patch',
		'uses' => 'Aimeos\Shop\Controller\JsonadmController@patchAction'
	))->where( array( 'resource' => '[^0-9]+', 'id' => '[0-9]*' ) );

	Route::match( array( 'POST' ), '{resource}/{id?}', array(
		'as' => 'aimeos_shop_jsonadm_post',
		'uses' => 'Aimeos\Shop\Controller\JsonadmController@postAction'
	))->where( array( 'resource' => '[^0-9]+', 'id' => '[0-9]*' ) );

	Route::match( array( 'PUT' ), '{resource}/{id?}', array(
		'as' => 'aimeos_shop_jsonadm_put',
		'uses' => 'Aimeos\Shop\Controller\JsonadmController@putAction'
	))->where( array( 'resource' => '[^0-9]+', 'id' => '[0-9]*' ) );

	Route::match( array( 'OPTIONS' ), '{resource?}', array(
		'as' => 'aimeos_shop_jsonadm_options',
		'uses' => 'Aimeos\Shop\Controller\JsonadmController@optionsAction'
	))->where( array( 'resource' => '[^0-9]*' ) );

});


Route::group(config('shop.routes.jsonapi', ['prefix' => 'jsonapi', 'middleware' => ['api']]), function() {

	Route::match( array( 'DELETE' ), '{resource}', array(
		'as' => 'aimeos_shop_jsonapi_delete',
		'uses' => 'Aimeos\Shop\Controller\JsonapiController@deleteAction'
	));

	Route::match( array( 'GET' ), '{resource}', array(
		'as' => 'aimeos_shop_jsonapi_get',
		'uses' => 'Aimeos\Shop\Controller\JsonapiController@getAction'
	));

	Route::match( array( 'PATCH' ), '{resource}', array(
		'as' => 'aimeos_shop_jsonapi_patch',
		'uses' => 'Aimeos\Shop\Controller\JsonapiController@patchAction'
	));

	Route::match( array( 'POST' ), '{resource}', array(
		'as' => 'aimeos_shop_jsonapi_post',
		'uses' => 'Aimeos\Shop\Controller\JsonapiController@postAction'
	));

	Route::match( array( 'PUT' ), '{resource}', array(
		'as' => 'aimeos_shop_jsonapi_put',
		'uses' => 'Aimeos\Shop\Controller\JsonapiController@putAction'
	));

	Route::match( array( 'OPTIONS' ), '{resource?}', array(
		'as' => 'aimeos_shop_jsonapi_options',
		'uses' => 'Aimeos\Shop\Controller\JsonapiController@optionsAction'
	));

});


Route::group(config('shop.routes.account', ['middleware' => ['web', 'auth']]), function() {

	Route::match( array( 'GET', 'POST' ), 'myaccount/favorite/{fav_action?}/{fav_id?}/{d_prodid?}/{d_name?}/{d_pos?}', array(
		'as' => 'aimeos_shop_account_favorite',
		'uses' => 'Aimeos\Shop\Controller\AccountController@indexAction'
	));

	Route::match( array( 'GET', 'POST' ), 'myaccount/watch/{wat_action?}/{wat_id?}/{d_prodid?}/{d_name?}/{d_pos?}', array(
		'as' => 'aimeos_shop_account_watch',
		'uses' => 'Aimeos\Shop\Controller\AccountController@indexAction'
	));

	Route::match( array( 'GET', 'POST' ), 'myaccount/download/{dl_id}', array(
		'as' => 'aimeos_shop_account_download',
		'uses' => 'Aimeos\Shop\Controller\AccountController@downloadAction'
	));

	Route::match( array( 'GET', 'POST' ), 'myaccount', array(
		'as' => 'aimeos_shop_account',
		'uses' => 'Aimeos\Shop\Controller\AccountController@indexAction'
	));

});


Route::group(config('shop.routes.default', ['middleware' => ['web']]), function() {

	Route::match( array( 'GET', 'POST' ), 'count', array(
		'as' => 'aimeos_shop_count',
		'uses' => 'Aimeos\Shop\Controller\CatalogController@countAction'
	));

	Route::match( array( 'GET', 'POST' ), 'detail/{d_prodid}/{d_name?}/{d_pos?}', array(
		'as' => 'aimeos_shop_detail',
		'uses' => 'Aimeos\Shop\Controller\CatalogController@detailAction'
	));

	Route::match( array( 'GET', 'POST' ), 'detail/pin/{pin_action?}/{pin_id?}/{d_prodid?}/{d_name?}/{d_pos?}', array(
		'as' => 'aimeos_shop_session_pinned',
		'uses' => 'Aimeos\Shop\Controller\CatalogController@detailAction'
	));

	Route::match( array( 'GET', 'POST' ), 'list', array(
		'as' => 'aimeos_shop_list',
		'uses' => 'Aimeos\Shop\Controller\CatalogController@listAction'
	));

	Route::match( array( 'GET', 'POST' ), 'suggest', array(
		'as' => 'aimeos_shop_suggest',
		'uses' => 'Aimeos\Shop\Controller\CatalogController@suggestAction'
	));

	Route::match( array( 'GET', 'POST' ), 'stock', array(
		'as' => 'aimeos_shop_stock',
		'uses' => 'Aimeos\Shop\Controller\CatalogController@stockAction'
	));

	Route::match( array( 'GET', 'POST' ), 'basket', array(
		'as' => 'aimeos_shop_basket',
		'uses' => 'Aimeos\Shop\Controller\BasketController@indexAction'
	));

	Route::match( array( 'GET', 'POST' ), 'checkout/{c_step?}', array(
		'as' => 'aimeos_shop_checkout',
		'uses' => 'Aimeos\Shop\Controller\CheckoutController@indexAction'
	));

});


Route::group(config('shop.routes.confirm', ['middleware' => ['web']]), function() {

	Route::match( array( 'GET', 'POST' ), 'confirm', array(
		'as' => 'aimeos_shop_confirm',
		'uses' => 'Aimeos\Shop\Controller\CheckoutController@confirmAction'
	));

});


Route::group(config('shop.routes.update', []), function() {

	Route::match( array( 'GET', 'POST' ), 'update', array(
		'as' => 'aimeos_shop_update',
		'uses' => 'Aimeos\Shop\Controller\CheckoutController@updateAction'
	));

});


Route::get('terms', array(
	'as' => 'aimeos_shop_terms',
	'uses' => 'Aimeos\Shop\Controller\PageController@termsAction'
));

Route::get('privacy', array(
	'as' => 'aimeos_shop_privacy',
	'uses' => 'Aimeos\Shop\Controller\PageController@privacyAction'
));
