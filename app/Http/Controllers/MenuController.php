<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller {

    public function index() {
        $menu = DB::table('menu')
            ->join('etiqueta', 'menu.etiqueta_id', '=', 'etiqueta.id')
            ->select('menu.nombre', 'menu.ico', 'menu.id', 'etiqueta.nombre as categoria')
            ->get();

        return response()->json(['data' => $menu ]);
    }

    public function categoria() {
        $etiquetas = DB::table('etiqueta')->select('id', 'nombre')->get();

        return response()->json(['data' => $etiquetas]);
    }

    public function insert( Request $request) {

        $form_data = array(
            'nombre'      => $request->nombre,
            'ico'         => $request->ico,
            'etiqueta_id' => $request->etiqueta_id,
        );

        Menu::create($form_data);

        return response()->json(['success' => 'OK']);
    }

    public function update( Request $request) {

        $form_data = array(
            'nombre'      => $request->nombre,
            'ico'         => $request->ico,
            'etiqueta_id' => $request->etiqueta_id,
        );

        Menu::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'OK']);
    }

    public function edit($id) {
        $data = DB::table('menu')
        ->join('etiqueta', 'menu.etiqueta_id', '=', 'etiqueta.id')
        ->select('menu.nombre', 'menu.ico', 'menu.id', 'etiqueta.nombre as categoria', 'etiqueta.id as id_etiqueta')
        ->where('menu.id', '=', $id)
        ->get();

        return response()->json(['data' => $data]);
    }

    public function delete($id) {
        $data = DB::table('menu')->where('id', '=', $id);
        $data->delete();
        return response()->json(['success' => 'ok']);
    }

}
