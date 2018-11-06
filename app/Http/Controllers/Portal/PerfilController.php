<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PerfilUpdate;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function index()
    {
        return view('portal.perfil');
    }

    public function update(PerfilUpdate $request)
    {
        $user = auth()->user();
        $data = $request->all();

        if($data['password'] != null) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $data['image'] = $user->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = $user->id . \kebab_case($user->name);

            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";

            $data['image'] = $nameFile;

            $upload = $request->image->move(public_path('/uploadedimages'), $nameFile);

            if (!$upload) {
                return redirect()->back();
            }
        }

        $userUpdate = $user->update($data);

        return back();
    }
}
