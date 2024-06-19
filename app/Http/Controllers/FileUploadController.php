<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload() 
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request) 
    {
        // return "Pemrosesan file upload di sini";
        // dump($request->berkas);

        // if($request->hasFile('berkas'))
        // {
        //     echo "path(): ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ".$request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ".$request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): ".$request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ".$request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): ".$request->berkas->getSize();
        // }
        // else
        // {
        //     echo "Tidak ada berkas yang diupload";
        // }

        $request->validate(['berkas'=>'required|file|image|max:500',]);
        // $path = $request->berkas->store('uploads');
        $extfile = $request->berkas->getClientOriginalName();
        $namaFile = 'web-'.time().".".$extfile;

        $path = $request->berkas->move('gambar',$namaFile);
        $path = str_replace("\\","//", $path);
        echo "Variabel path berisi:$path <br>";

        $pathBaru = asset('gambar/'.$namaFile);
        echo "proses upload berhasil, data disimpan pada:$path";
        echo "<br>";
        echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";
        // echo $request->berkas->getClientOriginalName()."lolos validasi";
    }

    // Tugas JS 12
    public function fileUploadRename()
    {
        return view('file-upload-rename');
    }

    public function prosesFileUploadRename(Request $request)
    {
        $request->validate(['berkas'=>'required|file|image|max:500']);
        $extfile = $request->berkas->getClientOriginalExtension();
        $nama_file = $request->input('namaFile'); 
        $namaFile = 'web-'.time().".". $nama_file.".".$extfile; 

        $path = $request->berkas->move('gambar',$namaFile);
        $path = str_replace("\\","//", $path);

        $pathBaru = asset('gambar/'.$namaFile);
        echo "Gambar berhasil diupload di <a href='$pathBaru'>$nama_file.$extfile</a>";
        echo "<br><br>";
        echo "<img src='$pathBaru' alt='Gambar' style='max-width: 300px; max-height: 300px;'>";
    }
}