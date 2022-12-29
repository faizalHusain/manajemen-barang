<?php

namespace App\Http\Controllers;

use App\Models\uom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public static function getUom()
    {
        $uoms = uom::all();
        return response($uoms,200);
    }
    public static function addUom()
    {
        $validator = Validator::make(request()->all(), [
            'uom_code' => 'required|max:255',
            'uom_name' => 'required|max:255',
        ]);
        $uom = new uom();
        $uom->uom_code = request("uom_code", "");
        $uom->uom_name = request("uom_name", "");
        $uom->save();
        return $uom;
    }
    public static function editUom($id)
    {
        $uom = uom::find($id);
        return response($uom,200);
    }
    public static function updateUom($id)
    {
        $uom = uom::find($id);
        $validator = Validator::make(request()->all(), [
            'uom_code' => 'required|max:255',
            'uom_name' => 'required|max:255',
        ]);
        $uom->uom_code = request("uom_code", "");
        $uom->uom_name = request("uom_name", "");
        $uom->save();
        return response($uom,200);
    }
    public static function deleteUom($id)
    {
        $uom = uom::find($id);
        $uom->delete();
        return response()->json(["message"=>"data berhasil dihapus"],200);
    }
}
