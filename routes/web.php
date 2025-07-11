<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Profile;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create_user', function () {
    $user = User::create([
        'name' => 'Eva',
        'email' => 'Eva@gmail.com',
        'password' => bcrypt('password')

    ]);
    return $user;
});

Route::get('/create_profile', function () {
    $profile = Profile::create([
        'user_id' => 1,
        'phone' => '0344646',
        'address' => 'Jl. Baru, No.3'
    ]);
    return $profile;
});
//     $user = User::find(2);
//     $user->profile()->create([
//        'phone' => '083136',
//        'address' => 'jl. Baru milik Cyntia' 
//     ]);
//     return $user;
// });

Route::get('/create_user_profile', function () {
    $user = User::find(2);

    $profile = new Profile([
        'phone' => '0161611561',
        'address' => 'Jl. Raya, No.123'
    ]);
    $user->profile()->save($profile);
    return $user;
});
 
Route::get('/read_user', function(){
 $user = User::find(2);

//  return $user->profile->phone;
$data=[
    'name' => $user->name,
    'phone' => $user->profile->phone,
    'address' => $user->profile->address
]; 
return $data;
});

Route::get('/read_profile', function(){
    $profile = Profile::where('phone', '0344646')->first();
//  return $profile->user->name;
$data=[
    'name' => $profile->user->name,
    'email' => $profile->user->email,
    'phone' => $profile->phone,
    'address' =>$profile->address
];
return $data;

});
 

Route::get('/update_profile', function(){
    $user = User::find(2);
    $data=[
    'phone' => '0145',
    'address' =>'jl, Baru update'
];
    $user->profile()->update($data);
    return $user;
});

Route::get('/delete_profile', function (){
$user = User::find(2);
$user->profile()->delete();
return $user;
});