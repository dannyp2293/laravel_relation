<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create_user', function () {
    $user = User::create([
        'name' => 'Cinta',
        'email' => 'eva@gmail.com',
        'password' => bcrypt('password')

    ]);
    return $user;
});

Route::get('/create_profile', function () {
//     $profile = Profile::create([
//         'user_id' => 2,
//         'phone' => '0344646',
//         'address' => 'Jl. Baru, No.3'
//     ]);
//     return $profile;
// });
    $user = User::find(3);
    $user->profile()->create([
       'phone' => '083136',
       'address' => 'jl. Baru milik EVA' 
    ]);
    return $user;
});

Route::get('/create_user_profile', function () {
    $user = User::find(2);

    $profile = new Profile([
        'phone' => '12345',
        'address' => 'Jl. baru diaspal, No.123'
    ]);
    $user->profile()->save($profile);
    return $user;
});
 
Route::get('/read_user', function(){
 $user = User::find(1);

 return $user->profile->phone;
// $data=[
//     'name' => $user->name,
//     'phone' => $user->profile->phone,
//     'address' => $user->profile->address
// ]; 
// return $data;
});

Route::get('/read_profile', function(){
    $profile = Profile::where('phone', '12345')->first();
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
    $user = User::find(3);
    $data=[
    'phone' => '0145',
    'address' =>'jl, Baru Cor coran'
];
    $user->profile()->update($data);
    return $user;
});

Route::get('/delete_profile', function (){
$user = User::find(1);
$user->profile()->delete();
return $user;
});

Route::get('/create_post', function(){
    // $user = User::create([
    //     'name' => 'danny',
    //     'email' => 'danny@mail.com',
    //     'password' => bcrypt('password')
    // ]);
    $user = User::findOrFail(1);
    $user->posts()->create([
        'title' => 'Isi title Post',
        'body' => 'Hello world in isi dari body table post baru'
    ]);
    return 'Succes';
});

Route::get('/deletepost', function(){
    // $post = Post::find(4);
    // $post -> delete();
// ada 2 opsi hapus dengan metode find atau metode destroy
    User::destroy(6); // menghapus post dengan id = 1

    // $post = Post::where('user_id', 3);
    // $post ->delete();


});

