<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

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
    $profile = Profile::create([
        'user_id' => 1,
        'phone' => '0344646',
        'address' => 'Jl. Baru, No.3'
    ]);
    return $profile;
});
    // $user = User::find(3);
    // $user->profile()->create([
    //    'phone' => '083136',
    //    'address' => 'jl. Baru milik EVA' 
    // ]);
    // return $user;
// });

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
    $user = User::create([
        'name' => 'danny',
        'email' => 'danny@mail.com',
        'password' => bcrypt('password')
    ]);
    // $user = User::findOrFail(1);
    $user->posts()->create([
        'title' => 'Isi title Post Baru ',
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

Route::get('/read_post', function(){
    $user = User::find(1);

    // dd($user->posts()->get());
    $posts = $user->posts()->get();
   

    foreach($posts as $post){
        $data[] = [
            'name'=> $post->user->name,
            'post_id' =>$post->id,
            'title'=> $post->title,
            'body'=>$post->body
        ];
    }
    //   $post = $user->posts()->first();
//    $data= [
//             'name'=> $post->user->name,
//             'title'=> $post->title,
//             'body'=>$post->body
//         ];

    return $data;
}); 

Route::get('/upate_post', function(){
    $user = User::findOrFail(1);

    $user->posts()->where('id', 2)->update([
        'title' => 'ini update 2 baru',
        'body' => 'Ini isian post yang sudah diupdate'
    ]);
    return 'Success';
});

Route::get('/delete_post', function(){
$user = User::find(1);

// $user->posts()->whereId(1)->delete();
$user->posts()->where('id',2)->delete();
return 'Success';
});

Route::get('/create_categories', function(){
    // $post = Post::findOrFail(1);

    // $post->categories()->create([
    //     'slug' => str::slug('PHP', '-'),
    //     'category' =>'Belajar PHP'
    // ]);
    // return 'Succes';
    $user = User::create([
        'name' => 'Eva',
        'email' => 'Eva@mail.com',
        'password' => bcrypt('password')

    ]);
    $user->posts()->create([
        'title' => 'New Title',
        'body' => 'New Body Content'])->categories ()->create([ 'slug' =>str::slug('New Category', '-'), 'category' => 'New Category' ]);

return 'sucess';
});
 


