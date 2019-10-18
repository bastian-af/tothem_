<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    function upload(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|image|mimes:jpg,png,gif|max:2048'
        ]);

        $image = $request->file('select_file');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('\resources\views\profile_pictures'), $new_name);
        return ;
    }
    public function getDownload($documento)
    {
        $file= public_path(). "/archivos_unidades/".$documento;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return response()->download($file, $documento ,$headers);
    }
}
