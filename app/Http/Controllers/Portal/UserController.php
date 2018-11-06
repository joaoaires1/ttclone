<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Post;
use App\Models\Friendship;

class UserController extends Controller
{
    public function index($name)
    {
        $user = User::where('username', '=', $name)->with('posts')->first();
        $user_id = $user->id;
        $tweets = Post::where('user_id', $user_id)->count();
        $seguindo = Friendship::where('user_id', $user_id)->count();
        $seguidores = Friendship::where('seguindo_id', $user_id)->count();
        
        $image = $user->image;

        if (!$image) $image = 'avatar-generico.png';

        if ($user) {
            return view('portal.user', [
                'name' => $user->name,
                'username' => $user->username,
                'image' => $image,
                'tweets' => $tweets,
                'seguindo' => $seguindo,
                'seguidores' => $seguidores,
                'posts' => $user->posts
            ]);
        } else {
            return dd('Usuário não existe');
        }
        
    }
}
