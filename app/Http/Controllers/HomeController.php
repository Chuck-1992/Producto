<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->producto = new Product();
    }

    public function index()
    {
        $producto = $this->producto->get();
        return view('home', compact('producto'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'imagen' => 'required|max:50000',
        ]);

        $datosUpdate = request()->except('_method');
        $nombre = request()->input('nombre');
        $descripcion = request()->input('descripcion');
        $imagen = request()->input('imagen');

        //Validamos si el campo tipo file recolecto alguna imagen
        if ($request->hasFile('imagen')) {
            //Si se cumple esta condición creamos una carpeta en el directorio público
            $imagen = $request->file('imagen')->store('lista', 'public');
        }

        $this->producto->name = $nombre;
        $this->producto->description = $descripcion;
        $this->producto->image = $imagen;

        $this->producto->save();

        return redirect('home')->with('success', 'Se ha guardado el registro seleccionado.');
    }

    public function show($id)
    {
        $producto = $this->producto->where('id', $id)->get();

        return view('edit', compact('producto'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'imagen' => 'required|max:50000',
        ]);

        $datosUpdate = request()->except(['_token', '_method']);
        $nombre = request()->input('nombre');
        $descripcion = request()->input('descripcion');
        $imagen = request()->input('imagen');
        $id = request()->input('id');

        //Validamos si el campo tipo file recolecto alguna imagen
        $query = $this->producto->where('id', $id)->first();

        if ($request->hasFile('imagen')) {
            $query_ = $this->producto->where('id', $id)->get();

            foreach ($query_ as $t) {
                $id_image = $t->image;
                //Borramos la imagen del directorio local
                Storage::delete([$id_image]);
                //En caso de que no exista la creamos
                $imagen = $request->file('imagen')->store('lista', 'public');
            }

            $delete_image = $query->image;
            //Borramos la imagen del directorio local
            Storage::delete([$delete_image]);
            //Si se cumple esta condición creamos una carpeta en el directorio público
            $imagen = $request->file('imagen')->store('lista', 'public');
        }

        $query->name = $nombre;
        $query->description = $descripcion;
        $query->image = $imagen;

        $query->save();

        return redirect('home')->with('success', 'Actualización exitosa en el registro seleccionado.');
    }

    public function destroy($id)
    {
        //Tomamos el campo imagen
        $eliminar = $this->producto->where('id', $id)->first();

        if (Storage::delete([$eliminar->image])) {
        }

        $eliminar->delete();

        return redirect('home')->with('success', 'Se ha eliminado registro seleccionado.');
    }
}
