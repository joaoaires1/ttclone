<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Friendship;
use DB;

class ProcurarController extends Controller
{
    public function index()
    {
        return view('portal.procurar');
    }

    public function getPessoas(Request $request)
    {
        $user_id = auth()->user()->id;
        $nome_pessoa = $request->pessoa;

        $busca = User::leftJoin('friendships', function ($join) use ($user_id) {
            $join->on('users.id', '=', 'friendships.seguindo_id')
                ->where('friendships.user_id', '=', $user_id);
        })
        ->where('users.id', '<>', $user_id)
        ->where('name', 'like', "%$nome_pessoa%")
        ->select('users.*', 'friendships.seguindo_id')
        ->get();

        // $busca = DB::select("
        //     SELECT users.*, friendships.seguindo_id
        //     FROM users
        //     LEFT JOIN friendships
        //     on (friendships.user_id = $user_id AND users.id = friendships.seguindo_id)
        //     WHERE users.name LIKE '%$nome_pessoa%' AND users.id <> $user_id
        // ");

        return $busca;
    }

    public function seguir(Request $request)
    {
        $user_id = auth()->user()->id;
        $seguindo_id = $request->pessoa_id;
        
        $seguir = Friendship::create([
            'user_id' => $user_id,
            'seguindo_id' => $seguindo_id 
        ]);
    }

    public function deixar(Request $request)
    {
        $user_id = auth()->user()->id;
        $seguindo_id = $request->pessoa_id;

        $deixar = Friendship::where('user_id', $user_id)
        ->where('seguindo_id', $seguindo_id)
        ->delete();
    }
}
