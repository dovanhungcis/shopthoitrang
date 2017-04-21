<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::group ( [ 
        'middleware' => 'visitor' 
], function () {
    Route::get ( 'login', [ 
            'as' => 'getLogin',
            'uses' => 'Auth\LoginController@index' 
    ] );
    Route::post ( 'login', [ 
            'as' => 'postLogin',
            'uses' => 'Auth\LoginController@authenticate' 
    ] );
    Route::get ( 'register', [ 
            'as' => 'getRegister',
            'uses' => 'Auth\RegisterController@index' 
    ] );
    Route::post ( 'register', [ 
            'as' => 'postRegister',
            'uses' => 'Auth\RegisterController@create' 
    ] );
    Route::get ( '/forgot-password', 'Auth\ForgotPasswordController@forgotPassword' );
    Route::post ( '/forgot-password', 'Auth\ForgotPasswordController@postForgotPassword' );
    Route::get ( '/reset/{email}/{resetCode}', 'Auth\ForgotPasswordController@resetPassword' );
    Route::post ( '/reset/{email}/{resetCode}', 'Auth\ForgotPasswordController@postResetPassword' );
} );

Route::group ( [ 
        'middleware' => 'user' 
], function () {
    Route::group ( [ 
            'prefix' => 'sales',
            'as' => 'shop@' 
    ], function () {
        Route::get ( '/', [ 
                'as' => 'homepage',
                'uses' => 'ShopController@index' 
        ] );
        
        Route::get ( '/products/{slug}', [ 
                'as' => 'products',
                'uses' => 'ShopController@products' 
        ] );
        
        Route::get ( '/upcoming/{slug}', [ 
                'as' => 'products',
                'uses' => 'ShopController@upcoming' 
        ] );
        
        Route::post ( '/filter', [ 
                'as' => 'filter',
                'uses' => 'ShopController@filter' 
        ] );
        
        Route::get ( '/single/{slug}', [ 
                'as' => 'single',
                'uses' => 'ShopController@single' 
        ] );
        
        Route::get ( '/account', [ 
                'as' => 'account',
                'uses' => 'ShopController@account' 
        ] );
        
        Route::get ( '/logout', [ 
                'as' => 'logout',
                'uses' => 'Auth\LoginController@logout' 
        ] );
        
        Route::group ( [ 
                'prefix' => 'cart',
                'as' => 'cart@' 
        ], function () {
            Route::post ( '/addcart', [ 
                    'as' => 'addcart',
                    'uses' => 'CartController@addcart' 
            ] );
            
            Route::post ( '/showCart', [ 
                    'as' => 'showCart',
                    'uses' => 'CartController@showCart' 
            ] );
            
            Route::post ( '/changeCart', [ 
                    'as' => 'changeCart',
                    'uses' => 'CartController@changeCart' 
            ] );
            
            Route::post ( '/cancelProduct', [ 
                    'as' => 'cancelProduct',
                    'uses' => 'CartController@cancelProduct' 
            ] );
            
            Route::get ( '/checkout', [ 
                    'as' => 'checkout',
                    'uses' => 'CartController@checkout' 
            ] );
            
            Route::post ( '/order', [ 
                    'as' => 'order',
                    'uses' => 'CartController@order' 
            ] );
            
            Route::get ( '/success', [ 
                    'as' => 'success',
                    'uses' => 'CartController@success' 
            ] );
        } );
        
        Route::group ( [ 
                'prefix' => 'account',
                'as' => 'account@' 
        ], function () {
            Route::get ( '/changeAccount', [ 
                    'as' => 'getchangeAccount',
                    'uses' => 'UserController@getchangeAccount' 
            ] );
            Route::post ( '/changeAccount', [ 
                    'as' => 'changeAccount',
                    'uses' => 'UserController@changeAccount' 
            ] );
        } );
    } );
} );

Route::group ( [ 
        'prefix' => '',
        'as' => 'blog@' 
], function () {
    Route::get ( '/', [ 
            'as' => 'homepage',
            'uses' => 'BlogController@index' 
    ] );
    Route::get ( '/post/{id}/{slug}', [ 
            'as' => 'post',
            'uses' => 'BlogController@post' 
    ] );
    Route::get ( '/category/{slug}', [ 
            'as' => 'category.get',
            'uses' => 'BlogController@get_category' 
    ] );
    Route::get ( '/tag/{slug}', [ 
            'as' => 'tag.get',
            'uses' => 'BlogController@get_tag' 
    ] );
    Route::get ( '/like/{id}', [ 
            'as' => 'like',
            'uses' => 'BlogController@like' 
    ] );
    Route::get ( '/search', [ 
            'as' => 'search',
            'uses' => 'BlogController@search' 
    ] );
} );
// Route::group([ 'prefix' => 'sales', 'as' => 'shop@' ], function () {
// Route::get('/', [ 'as' => 'homepage', 'uses' => 'ShopController@index' ]);
// });

// Route::get('huy', function () {
// return view('admin.profile');
// });

// Route::get ( '/', function () {
// return view ( 'welcome' );
// } );
// Route::get ( '/products', function () {
// return view ( 'products' );
// } );
// Route::get ( '/collections', function () {
// return view ( 'collections' );
// } );
// Route::get ( '/about', function () {
// return view ( 'about' );
// } );
// Route::get ( '/contact', function () {
// return view ( 'contact' );
// } );
Route::get ( 'language/{locale}', [ 
        'uses' => 'LanguageController@changeLanguage' 
] );
// Route::post('/language-chooser', 'LanguageController@changeLanguage');
// //Language route
// Route::post('/language/', array(
// 'before' => 'crsf',
// 'as' => 'language-chooser',
// 'uses' => 'LanguageController@changeLanguage'
// ));

Route::get ( '/about', [ 
        'uses' => 'AboutUsController@about',
        'as' => 'about' 
] );

Route::group ( [ 
        'prefix' => 'admin',
        'as' => 'admin@' 
], function () {
    
    Route::get ( 'login', [ 
            'as' => 'getLogin',
            'uses' => 'Auth\LoginController@index' 
    ] );
    Route::post ( 'login', [ 
            'as' => 'postLogin',
            'uses' => 'Auth\LoginController@authenticate' 
    ] );
    Route::get ( 'register', [ 
            'as' => 'getRegister',
            'uses' => 'Auth\RegisterController@index' 
    ] );
    Route::post ( 'register', [ 
            'as' => 'postRegister',
            'uses' => 'Auth\RegisterController@create' 
    ] );
    
    Route::get ( 'logout', [ 
            'as' => 'logout',
            'uses' => 'Auth\LoginController@logout' 
    ] );
} );

// ['middleware' => ['auth', 'check.admin']
Route::group ( [ 
        'middleware' => [ 
                'auth',
                'check.admin' 
        ] 
], function () {
    
    Route::group ( [ 
            'prefix' => 'admin',
            'as' => 'admin@' 
    ], function () {
        Route::get ( '/', [ 
                'as' => 'dashboard',
                'uses' => 'DashboardController@index' 
        ] );
        Route::get ( 'profile', [ 
                'as' => 'profile',
                'uses' => 'DashboardController@profile' 
        ] );
        Route::post ( 'updateavatar', [ 
                'as' => 'updateavatar',
                'uses' => 'DashboardController@updateAvatar' 
        ] );
        Route::post ( 'updateprofile', [ 
                'as' => 'updateprofile',
                'uses' => 'DashboardController@updateProfile' 
        ] );
        
        Route::group ( [ 
                'prefix' => 'user',
                'as' => 'user@' 
        ], function () {
            Route::get ( '/', [ 
                    'as' => 'user',
                    'uses' => 'UserController@index' 
            ] );
            Route::get ( 'customer', [ 
                    'as' => 'customer',
                    'uses' => 'UserController@customer' 
            ] );
            Route::get ( 'create', [ 
                    'as' => 'create',
                    'uses' => 'UserController@create' 
            ] );
            Route::post ( 'store', [ 
                    'as' => 'store',
                    'uses' => 'UserController@store' 
            ] );
            Route::get ( 'edit/{id}', [ 
                    'as' => 'edit',
                    'uses' => 'UserController@edit' 
            ] );
            Route::post ( 'update/{id}', [ 
                    'as' => 'update',
                    'uses' => 'UserController@update' 
            ] );
            Route::get ( 'destroy/{id}', [ 
                    'as' => 'destroy',
                    'uses' => 'UserController@destroy' 
            ] );
        } );
        
        Route::group ( [ 
                'prefix' => 'category',
                'as' => 'category@' 
        ], function () {
            Route::get ( '/', [ 
                    'as' => 'category',
                    'uses' => 'CategoryController@index' 
            ] );
            Route::get ( 'create', [ 
                    'as' => 'create',
                    'uses' => 'CategoryController@create' 
            ] );
            Route::post ( 'store', [ 
                    'as' => 'store',
                    'uses' => 'CategoryController@store' 
            ] );
            Route::get ( 'edit/{id}', [ 
                    'as' => 'edit',
                    'uses' => 'CategoryController@edit' 
            ] );
            Route::post ( 'update/{id}', [ 
                    'as' => 'update',
                    'uses' => 'CategoryController@update' 
            ] );
            Route::get ( 'destroy/{id}', [ 
                    'as' => 'destroy',
                    'uses' => 'CategoryController@destroy' 
            ] );
        } );
        
        Route::group ( [ 
                'prefix' => 'post',
                'as' => 'post@' 
        ], function () {
            Route::get ( '/', [ 
                    'as' => 'post',
                    'uses' => 'PostController@index' 
            ] );
            Route::get ( 'create', [ 
                    'as' => 'create',
                    'uses' => 'PostController@create' 
            ] );
            Route::post ( 'store', [ 
                    'as' => 'store',
                    'uses' => 'PostController@store' 
            ] );
            Route::get ( 'edit/{id}', [ 
                    'as' => 'edit',
                    'uses' => 'PostController@edit' 
            ] );
            Route::post ( 'update/{id}', [ 
                    'as' => 'update',
                    'uses' => 'PostController@update' 
            ] );
            Route::get ( 'destroy/{id}', [ 
                    'as' => 'destroy',
                    'uses' => 'PostController@destroy' 
            ] );
        } );
        
        Route::post ( '/tag/store', [ 
                'as' => 'tag@store',
                'uses' => 'TagController@store' 
        ] );
        
        Route::group ( [ 
                'prefix' => 'supplier',
                'as' => 'supplier@' 
        ], function () {
            Route::get ( '/', [ 
                    'as' => 'supplier',
                    'uses' => 'SupplierController@index' 
            ] );
            Route::get ( 'create', [ 
                    'as' => 'create',
                    'uses' => 'SupplierController@create' 
            ] );
            Route::post ( 'store', [ 
                    'as' => 'store',
                    'uses' => 'SupplierController@store' 
            ] );
            Route::get ( 'edit/{id}', [ 
                    'as' => 'edit',
                    'uses' => 'SupplierController@edit' 
            ] );
            Route::post ( 'update/{id}', [ 
                    'as' => 'update',
                    'uses' => 'SupplierController@update' 
            ] );
            Route::get ( 'destroy/{id}', [ 
                    'as' => 'destroy',
                    'uses' => 'SupplierController@destroy' 
            ] );
        } );
        
        Route::group ( [ 
                'prefix' => 'item',
                'as' => 'item@' 
        ], function () {
            Route::get ( '/', [ 
                    'as' => 'item',
                    'uses' => 'ItemController@index' 
            ] );
            Route::get ( 'create', [ 
                    'as' => 'create',
                    'uses' => 'ItemController@create' 
            ] );
            Route::post ( 'store', [ 
                    'as' => 'store',
                    'uses' => 'ItemController@store' 
            ] );
            Route::get ( 'edit/{id}', [ 
                    'as' => 'edit',
                    'uses' => 'ItemController@edit' 
            ] );
            Route::post ( 'update/{id}', [ 
                    'as' => 'update',
                    'uses' => 'ItemController@update' 
            ] );
            Route::get ( 'destroy/{id}', [ 
                    'as' => 'destroy',
                    'uses' => 'ItemController@destroy' 
            ] );
        } );
        
        Route::group ( [ 
                'prefix' => 'sale',
                'as' => 'sale@' 
        ], function () {
            Route::get ( '/', [ 
                    'as' => 'sale',
                    'uses' => 'SaleController@index' 
            ] );
            Route::get ( 'create', [ 
                    'as' => 'create',
                    'uses' => 'SaleController@create' 
            ] );
            Route::post ( 'store', [ 
                    'as' => 'store',
                    'uses' => 'SaleController@store' 
            ] );
            Route::get ( 'edit/{id}', [ 
                    'as' => 'edit',
                    'uses' => 'SaleController@edit' 
            ] );
            Route::post ( 'update/{id}', [ 
                    'as' => 'update',
                    'uses' => 'SaleController@update' 
            ] );
            Route::get ( 'destroy/{id}', [ 
                    'as' => 'destroy',
                    'uses' => 'SaleController@destroy' 
            ] );
        } );
        
        Route::group ( [ 
                'prefix' => 'product',
                'as' => 'product@' 
        ], function () {
            Route::get ( '/', [ 
                    'as' => 'product',
                    'uses' => 'ProductController@index' 
            ] );
            Route::get ( 'create', [ 
                    'as' => 'create',
                    'uses' => 'ProductController@create' 
            ] );
            Route::post ( 'store', [ 
                    'as' => 'store',
                    'uses' => 'ProductController@store' 
            ] );
            Route::get ( 'edit/{id}', [ 
                    'as' => 'edit',
                    'uses' => 'ProductController@edit' 
            ] );
            Route::post ( 'update/{id}', [ 
                    'as' => 'update',
                    'uses' => 'ProductController@update' 
            ] );
            Route::get ( 'destroy/{id}', [ 
                    'as' => 'destroy',
                    'uses' => 'ProductController@destroy' 
            ] );
        } );
        
        Route::group ( [ 
                'prefix' => 'productquantity',
                'as' => 'productquantity@' 
        ], function () {
            Route::get ( '/', [ 
                    'as' => 'productquantity',
                    'uses' => 'ProductQuantityController@index' 
            ] );
            Route::get ( 'create/{id}', [ 
                    'as' => 'create',
                    'uses' => 'ProductQuantityController@create' 
            ] );
            Route::post ( 'store', [ 
                    'as' => 'store',
                    'uses' => 'ProductQuantityController@store' 
            ] );
            Route::get ( 'edit/{id}', [ 
                    'as' => 'edit',
                    'uses' => 'ProductQuantityController@edit' 
            ] );
            Route::post ( 'update/{id}', [ 
                    'as' => 'update',
                    'uses' => 'ProductQuantityController@update' 
            ] );
            Route::get ( 'destroy/{id}', [ 
                    'as' => 'destroy',
                    'uses' => 'ProductQuantityController@destroy' 
            ] );
            Route::get ( 'show/{id}', [ 
                    'as' => 'show',
                    'uses' => 'ProductQuantityController@show' 
            ] );
        } );
        
        Route::group ( [ 
                'prefix' => 'invoice',
                'as' => 'invoice@' 
        ], function () {
            Route::get ( '/', [ 
                    'as' => 'invoice',
                    'uses' => 'InvoiceController@index' 
            ] );
            Route::get ( 'show/{id}', [ 
                    'as' => 'show',
                    'uses' => 'InvoiceController@show' 
            ] );
            Route::get ( 'acceptorder/{id}', [ 
                    'as' => 'acceptorder',
                    'uses' => 'InvoiceController@acceptorder' 
            ] );
        } );
    } );
} );
