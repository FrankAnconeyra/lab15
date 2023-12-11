<?php
namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeComentario(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id);

        $comentario->increment('likes');


        return back()->with('success', '¡Has dado like al comentario!');
    }
}
