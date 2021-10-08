<?php

namespace App\Http\Controllers;

use App\Buku;
use App\Dokumen;
use Str;
use App\Jurnal;
use App\Report;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function getJurnal()
    {
        $jurnals = Jurnal::all();
        return view('admin.publikasi.jurnal',compact(['jurnals']));
    }

    public function postJurnal(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'file|mimes:pdf'
        ]);

        if ($request->has('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'dokumen';
            $gambar->move($tujuan_upload,$nama_gambar);
        }

        if ($request->has('file')) {
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'publikasi';
            $file->move($tujuan_upload,$nama_file);

            $sebelum = '.pdf';
            $sesudah = ['.png'];
            $imageName = Str::replaceArray($sebelum,$sesudah,$nama_file);
            $imagePdf = new \Spatie\PdfToImage\Pdf($tujuan_upload . '/' . $nama_file);
            $imagePdf->saveImage("publikasi/".$imageName);
          }else {
              $imageName = null;
              $nama_file = null;
          }

        $jurnal = Jurnal::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
            'file' => $nama_file
        ]);
        return redirect()->back()->with("success","Berhasil menambah dokumen");
    }

    public function editJurnal($id)
    {
        $jurnal = Jurnal::find($id);
        return view('admin.publikasi.editJurnal',compact(['jurnal']));
    }

    public function updateJurnal(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'file|mimes:pdf'
        ]);

        $jurnal = Jurnal::find($request->jurnal_id);
        if (request()->has('file')) {
            $pdfuploaded = $request->file('file');
            $pdfname = time() . '-' . $pdfuploaded->getClientOriginalName();
            $pdfpath = 'publikasi';
            $pdfuploaded->move($pdfpath, $pdfname);

            $sebelum = '.pdf';
            $sesudah = ['.png'];
            $imageName = Str::replaceArray($sebelum,$sesudah,$pdfname);
            $imagePdf = new \Spatie\PdfToImage\Pdf($pdfpath . '/' . $pdfname);
            $imagePdf->saveImage(public_path("publikasi/".$imageName));
        }else {
            $imageName = $jurnal->gambar;
            $pdfname = $jurnal->file;
        }

        $jurnal->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
            'file' => $pdfname
        ]);

        return redirect()->route('getJurnal');

    }

    public function deleteJurnal($id)
    {
        $jurnal  = Jurnal::find($id);
        $jurnal->delete();
        return back();
    }

    public function getBuku()
    {
        $bukus = Buku::all();
        return view('admin.publikasi.buku',compact(['bukus']));
    }

    public function postBuku(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|file|mimes:pdf'
        ]);

        if ($request->has('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'dokumen';
            $gambar->move($tujuan_upload,$nama_gambar);
        }


        if ($request->has('file')) {
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'publikasi';
            $file->move($tujuan_upload,$nama_file);

            $sebelum = '.pdf';
            $sesudah = ['.png'];
            $imageName = Str::replaceArray($sebelum,$sesudah,$nama_file);
            $imagePdf = new \Spatie\PdfToImage\Pdf($tujuan_upload . '/' . $nama_file);
            $imagePdf->saveImage("publikasi/".$imageName);
          }

        $buku = Buku::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
            'file' => $nama_file
        ]);
        return redirect()->back()->with("success","Berhasil menambah dokumen");
    }

    public function editBuku($id)
    {
        $buku = Buku::find($id);
        return view('admin.publikasi.editBuku',compact(['buku']));
    }

    public function updateBuku(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'file|mimes:pdf'
        ]);

        $buku = Buku::find($request->buku_id);
        if (request()->has('file')) {
            $pdfuploaded = $request->file('file');
            $pdfname = time() . '-' . $pdfuploaded->getClientOriginalName();
            $pdfpath = 'publikasi';
            $pdfuploaded->move($pdfpath, $pdfname);

            $sebelum = '.pdf';
            $sesudah = ['.png'];
            $imageName = Str::replaceArray($sebelum,$sesudah,$pdfname);
            $imagePdf = new \Spatie\PdfToImage\Pdf($pdfpath . '/' . $pdfname);
            $imagePdf->saveImage(public_path("publikasi/".$imageName));
        }else {
            $imageName = $buku->gambar;
            $pdfname = $buku->file;
        }

        $buku->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
            'file' => $pdfname
        ]);

        return redirect()->route('getBuku');

    }

    public function deleteBuku($id)
    {
        $buku  = Buku::find($id);
        $buku->delete();
        return back();
    }




    public function getReport()
    {
        $reports = Report::all();
        return view('admin.publikasi.report',compact(['reports']));
    }

    public function postReport(Request $request)
    {
        $request->validate([
            'nomor' => 'required',
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf'
        ]);

        if ($request->has('file')) {
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'publikasi';
            $file->move($tujuan_upload,$nama_file);
          }

        $report = Report::create([
            'nomor' => $request->nomor,
            'judul' => $request->judul,
            'file' => $nama_file
        ]);
        return redirect()->back()->with("success","Berhasil menambah dokumen");
    }

    public function deleteReport($id)
    {
        $report  = Report::find($id);
        $report->delete();
        return back();
    }

    public function getDokumen()
    {
        $dokumens = Dokumen::all();
        return view('admin.publikasi.dokumen',compact(['dokumens']));
    }

    public function postDokumen(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf'
        ]);

        if ($request->has('file')) {
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'publikasi';
            $file->move($tujuan_upload,$nama_file);
          }

        $dokumen = Dokumen::create([
            'judul' => $request->judul,
            'file' => $nama_file
        ]);
        return redirect()->back()->with("success","Berhasil menambah dokumen");
    }

    public function deleteDokumen($id)
    {
        $dokumen  = Dokumen::find($id);
        $dokumen->delete();
        return back();
    }

    public function getBukuUser()
    {
        $bukus = Buku::orderBy('created_at','desc')->paginate(15);
        return view('guest2.publikasi.buku',compact(['bukus']));
    }
    public function getJurnalUser()
    {
        $jurnals = Jurnal::orderBy('created_at','desc')->paginate(15);
        return view('guest2.publikasi.jurnal',compact(['jurnals']));
    }

    public function getReportUser()
    {
        $reports = Report::orderBy('created_at','desc')->paginate(15);
        return view('guest2.publikasi.report',compact(['reports']));
    }

    public function getDokumenUser()
    {
        $dokumens = Dokumen::orderBy('created_at','desc')->paginate(15);
        return view('guest2.publikasi.dokumen',compact(['dokumens']));
    }
}
