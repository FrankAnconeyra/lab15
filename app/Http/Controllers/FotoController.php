<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Comentario;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Http;


class FotoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            $id = $user->id;
            $fotos = Foto::where('user_id', $id)->get();
            return view('fotos.fotos', compact('fotos'));
        }
    }
    public function subirFoto(Request $request)
    {
        $user = auth()->user();
    
        if ($request->hasFile('foto')) {
            $id = $user->id;
            $image = $request->file('foto');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->put('/' . $fileName, file_get_contents($image));
            $foto = new Foto;
            $foto->user_id = $id;
            $foto->hotel = $request->hotel; 
            $foto->descripcion = $request->descripcion;
            $foto->provincia = $request->provincia; 
            $foto->distrito = $request->distrito; 
            $foto->direccion = $request->direccion;
            $foto->cuartos_disponibles = $request->cuartos_disponibles;
            $foto->tipo_habitacion = $request->tipo_habitacion;
            $foto->precio_noche = $request->precio_noche; 
            $foto->precio_semana = $request->precio_semana; 
            $foto->precio_mes = $request->precio_mes; 
            $foto->reserva = $request->reserva; 
            $foto->estado = 1;
            $foto->ruta = $fileName;
            $foto->save();
            
            
            return redirect('/fotos');
        }
    }
    
    public function mostrarFoto(string $ruta)
    {
        $file = Storage::disk('local')->get($ruta);
        return Image::make($file)->response();
    }
    
    public function eliminarFoto(Request $request)
    {
    if ($request->id_foto) {
        $foto = Foto::orderBy('created_at', 'asc')->find($request->id_foto);

        
        if ($foto) {
            Storage::disk('local')->delete($foto->ruta);
            $foto->delete();
            return redirect('/fotos')->with('success', 'Foto eliminada exitosamente');
        } else {
            return redirect('/fotos')->with('error', 'La foto no existe o ya ha sido eliminada');
        }
    }

    return redirect('/fotos')->with('error', 'No se proporcionó un ID de foto válido');
    }
    public function subirComentario(Request $request)
    {
    if($request->comentario) { 
        $id = auth()->user()->id;
        $comentario = new Comentario; 
        $comentario->user_id = $id;
        $comentario->foto_id = $request->id_foto;
        $comentario->comentario = $request->comentario;
        $comentario->estado = 1;
        $comentario->save(); 
        return redirect('/home');
    }
    }
    public function eliminarComentario(Request $request)
{
    if ($request->id_comentario) {
        $comentario = Comentario::find($request->id_comentario);

        if ($comentario) {
            // Verificar si el usuario autenticado es el autor del comentario
            if ($comentario->user_id === auth()->id()) {

                $comentario->delete();
                return redirect('/fotos')->with('success', 'Comentario eliminado exitosamente');
            } else {
                return redirect('/fotos')->with('error', 'No tienes permiso para eliminar este comentario');
            }
        } else {
            return redirect('/fotos')->with('error', 'El comentario no existe o ya ha sido eliminado');
        }
    }

    return redirect('/fotos')->with('error', 'No se proporcionó un ID de comentario válido');
}
        public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
    public function enviarApi(Request $request)
    {
        $fotos = Foto::select('id', 'ruta', 'descripcion')->get();
    
        function ordenarFotos($fotos, $idFotoPrimera) {
            $fotoPrimera = null;
            foreach ($fotos as $key => $foto) {
                if ($foto['id'] == $idFotoPrimera) {
                    $fotoPrimera = $foto;
                    unset($fotos[$key]);
                    break;
                }
            }
            if ($fotoPrimera) {
                array_unshift($fotos, $fotoPrimera);
            }
            return $fotos;
        }
    
        try {
           
            $fotosOrdenadas = ordenarFotos($fotos->toArray(), 2); 
    
            $url = "http://127.0.0.1:8000/enviarApi";
            $response = Http::post($url, ['datos' => $fotosOrdenadas]);
    
            
            if ($response->successful()) {
                return $response->json(); 
            } else {
                return response()->json(['error' => 'Error en la solicitud'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); 
    }
}   
}