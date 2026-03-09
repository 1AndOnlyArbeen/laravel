<?php

use Illuminate\Support\Facades\Route;




Route:: get ('/', function (){
    return view ('welcome');
})->name('home');


Route:: get ('/about', function (){
    return view ('aboutus');
});

// sub routing 

Route:: get ('/about/subaboutus', function (){
    return view ('subaboutus');
});

//paramaters 
Route::get ('/param/{id?}/comments/{comments?}', function ( ?string $id =null, ?string $comments= null){

if (!$id && ! $comments) {
    return "<h2> no id has found </h2>";

    
}return "<h1>Post Id : ". $id."</h1> <h2> ".$comments ."</h2> ";


});


/*
route constraints 

where the route accepts only the number 

Route::get ('/mycons/{constrain?}', function ( ?string $constrain =null,){

if (!$constrain) {
    return "<h2> no id has found </h2>";

    
}return "<h1>Post Id : ". $constrain."</h1>";


})-> whereNumber ('constrain');

*/


/* where the route constraint only accepts the strings => whereAlpha

Route::get ('/mycons/{constrain?}', function ( ?string $constrain =null,){

if (!$constrain) {
    return "<h2> no id has found </h2>";

    
}return "<h1>Post Id : ". $constrain."</h1>";


})-> whereAlpha('constrain');
*/


/*
where the route constrain accepts the both the string and the numeric 



Route::get ('/mycons/{constrain?}', function ( ?string $constrain =null,){

if (!$constrain) {
    return "<h2> no id has found </h2>";

    
}return "<h1>Post Id : ". $constrain."</h1>";


})-> whereAlphaNumeric('constrain');

*/



/* where the route constrain accpets only among the given value 


Route::get ('/mycons/{constrain?}', function ( ?string $constrain =null,){

if (!$constrain) {
    return "<h2> no id has found </h2>";

    
}return "<h1>Post Id : ". $constrain."</h1>";


})->whereIn('constrain', ['movie', 'song', 'coding']);

*/


/*

where the constrian accept the another param also 
Route::get('/post/{constrain?}/comment/{comment?}', function (?string $constrain = null, ?string $comment = null) {

    if (!$constrain) {
        return "<h2>No ID has been found</h2>";
    }
    
    return "<h1>Post ID: " . $constrain . " & comment: " . $comment . "</h1>";
    
})->where('constrain', '[0-9]+')->whereAlpha('comment');

*/




Route:: get ('/test', function (){
    return view ('first');
});

Route::redirect('/first', 'test', 301);



// multiple route grouping 

Route:: prefix('page')->group(function(){
    Route:: get ('/second', function (){
    return view ('second');
})->name('second');

Route:: get ('/thirddddd', function (){
    return view ('third');
})->name('mythird');

});

Route:: fallback(function(){
    return view('fallback');
});



require __DIR__ . '/web2.php';