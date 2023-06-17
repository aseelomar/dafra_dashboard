<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
Route::get('lang/{lang}',function ($lang){
    if(in_array($lang,['ar','en'])){
        session()->put('lang',$lang);
    }else{
        session()->put('lang','ar');
    }
    return back();
})->name('lang');

Route::group(['middleware'=>'Lang'],function (){
    Route::name('site.')->group(function (){

        Route::get('/', 'HomeController@index')->name('home');
        Route::get('news','HomeController@news')->name('allnews');
        Route::get('news/{id}','HomeController@showNews')->name('showNews');
        Route::post('addEmail','HomeController@addEmail')->name('addEmail');
        Route::get('showVideo/{id}','HomeController@showVideo')->name('showVideo');
        Route::get('detailsVideo/{id}','HomeController@detailsVideo')->name('detailsVideo');
        Route::get('videos', 'HomeController@videos')->name('videos');
        Route::get('videos/{id}', 'HomeController@allVideo')->where('id', 'series|movies|programs')->name('allVideo');
        Route::post('searchVideo', 'HomeController@search')->name('search');
        Route::get('schedule','HomeController@guide')->name('guide');
        Route::get('live','HomeController@live')->name('live');
        /////
        Route::get('login','CustomerController@login')->name('login');
        Route::post('register','CustomerController@register')->name('register');
        Route::get('signup','CustomerController@signup')->name('signup');
        Route::post('getLogin','CustomerController@getLogin')->name('getLogin');

        Route::get('logout', 'CustomerController@logout')->name('logout');

        Route::get('policy', 'HomeController@policy')->name('policy');
        Route::get('about', 'HomeController@about')->name('about');

        Route::get('setDayMode',function() {
           return session(['mode' => 'day']);
//            return redirect()->route('site.home');
        })->name('mode.day');


        Route::get('setDarkMode',function() {
           return  session(['mode' => 'dark']);
//            return redirect()->route('site.home');
        })->name('mode.dark');


//        Route::get('test', function (){
//            return response()->json(last(request()->segments()));
//        });

    });


//    Route::get( 'test/{search}', function ( $given ) {
//        $parentArray = [ [ 4, 2, 7, 1, 6 ], [ 8, 3 ] ];
//
//        $result = null;
//        $diff   = null;
//        $new    = [];
//
//        foreach ( $parentArray as $key => $item )
//        {
//            $new[ $key ] = $item[0];
//
//            if ( count( $new ) === count( $parentArray ) )
//            {
//                foreach ( $new as $item2 )
//                {
//                    $currDiff = abs( $given - $item2 );
//                    if ( $currDiff < $diff || $diff === null )
//                    {
//                        $diff   = $currDiff;
//                        $result = $item2;
//                    }
//                }
//            }
//        }
//
//        echo
////    Route::get( 'test/{search}', function ( $given ) {
////        $parentArray = [ [ 3, 2, 7, 1, 6 ], [ 8, 3 ] ];
////
////        $result = null;
////        $diff   = null;
////
////        foreach ( $parentArray as $array )
////        {
////            foreach ( $array as $itemArray )
////            {
////                $currDiff = abs( $given - $itemArray );
////                if ( $currDiff < $diff || $diff === null )
////                {
////                    $diff   = $currDiff;
////                    $result = $itemArray;
////                }
////            }
////
////            echo $result;
////            $diff = null;
////        }
////
////    } );
//});

    Route::get( 'testdd/{search}', function ( $given ) {
        $parentArray = [ [ 4, 2 ], [ 8, 3 ] ];

        $diff   = null;
        $new    = [];

        foreach ( $parentArray as $key => $item )
        {
            $new[ $key ] = $item[0];


//               $news=  uasort($parentArray,
//                   function ($x, $y) {
//                        return $x[0] <=> $y[1];
//                    )};


                foreach ( $new as $item2 )
                {
                    $currDiff = abs( $given - $item2 );
                    if ( $currDiff < $diff || $diff === null )
                    {
                        $result = $item2;
                        echo $result;
                    }

                }
            }

    });
    Route::get( 'testtt/{search}', function ( $given ) {
        $parentArray = [[8, 2], [4, 3]];

        $diff = null;
        $new = [];
        $index = null;

        foreach ($parentArray as $key => $item) {
            $new[$key] = $item[0];


                if ($new[0] - $new[1] >= 0) {
                    asort($new);
                }
                $new=uasort($parentArray, function ($x, $y) {
                    return $x[0] <=> $y[1];
                });

                foreach ($new as $key2 => $item2) {
                    $currDiff = abs($given - $item2);
                    if ($currDiff < $diff || $diff === null) {
                        $result = $item2;
//                    echo $result;
                        echo implode(',', $parentArray[$key2]);
                    }
                }
            }
    });

//    Route::get('testt/{numTest}',function ($numTest){
//        $test = array([
//            ['3','5'],
//            ['6','5']
//        ]);
//        $subNum= null;
//        $num=null;
//        $reslut=[];
//
//        foreach ($test as $arr) {
//        foreach ($arr as $index=>$value){
//            foreach ($value as $index=>$val) {
//
//                $currDiff = abs( $numTest - $val );
//                if ( $currDiff < $num || $num === null )
//                {
//                $reslut=$val + $reslut;
//
//                     // $reslut =reslut.unshift($val);
//
//                }ELSE{
//                    $reslut[] =$val;
//                }
//            }
//            DD($reslut);
//        }}
//    });

    Route::get( 'testy/{search}', function ( $given ) {
        $parentArray = [ [ 4, 2, 7, 1, 6 ], [ 8, 3 ] ];

        $diff   = null;
        $new    = [];

        foreach ( $parentArray as $key => $item )
        {
            $new[ $key ] = $item[0];
           $news= uasort($parentArray, function ($x, $y) {
                return $x[0] <=> $y[1];
            });

            $parentArray= collect($parentArray);
           // dd($parentArray);
                foreach ( $new as $item2 )
                {
                    $currDiff = abs( $given - $item2 );
                    if ( $currDiff < $diff || $diff === null )
                    {
                        $result = $item2;
                        echo $result;
                    }
                }
            }


    } );
    Route::get( '/testA/{target}', function ( $target ) {
        $arr = [ [ 1, 2, 3 ], [ 3, 2, 5 ] ];

        $firsts = array_map( function ( $sub ) {
            return $sub[0];
        }, $arr );

        $closest = null;
        foreach ( $firsts as $item )
        {
            if ( $closest === null || abs( $target - $closest ) > abs( $item - $target ) )
            {
                $closest = $item;
            }
        }

        $result = $arr[0][0] === $closest ? $arr : array_reverse( $arr );

        $final = [];
        foreach ( $result as $res )
        {
            foreach ( $res as $item )
            {
                $final[] = $item;
            }
        }
        return $final;

    });
    Route::get( '/test/{target}', function ( $target ) {
        $arr = [ [ 7, 2, 3 ], [ 3, 2, 5 ] ];

        $firsts = array_map( function ( $sub ) {
            return $sub[0];
        }, $arr );

        $closest = null;
        foreach ( $firsts as $item )
        {
            if ( $closest === null || abs( $target - $closest ) > abs( $item - $target ) )
            {
                $closest = $item;
            }
        }

        $result = $arr[0][0] === $closest ? $arr : array_reverse( $arr );

        collect($result)->each(function ($array) {
            print_r(json_encode(array_values($array)));
        });

    } );
    });
