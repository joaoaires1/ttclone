<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Friendship;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $username = '@'.auth()->user()->username;
        $tweets = Post::where('user_id', $id)->count();
        $seguindo = Friendship::where('user_id', $id)->count();
        $seguidores = Friendship::where('seguindo_id', $id)->count();
        
        return view('portal.home', [
            'name' => $name,
            'username' => $username,
            'tweets' => $tweets,
            'seguindo' => $seguindo,
            'seguidores' => $seguidores
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'content' => 'required'
        ]);

        $user_id = auth()->user()->id;

        $post = Post::create([
            'user_id' => $user_id,
            'content' => $request->content
        ]);
    }

    public function getPosts()
    {
        $user_id = auth()->user()->id;
        $id_dos_seguidores = [];
        
        $seguindo = Friendship::where('friendships.user_id', $user_id)
                    ->select('friendships.seguindo_id')
                    ->get();

        foreach ($seguindo as $id) {
            array_push($id_dos_seguidores, $id->seguindo_id);
        }

        $posts = Post::whereIn('user_id', $id_dos_seguidores)
                        ->orWhere('user_id', $user_id)
                        ->orderBy('id', 'desc')
                        ->with('user')
                        ->paginate(15);

        return $posts;
    }

    function getLastPost() {
        $user_id = auth()->user()->id;
        $post = Post::where('user_id', $user_id)
                    ->orderBy('id', 'desc')
                    ->with('user')
                    ->first();

        return $post;
    }
}
