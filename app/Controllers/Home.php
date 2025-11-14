<?php

namespace App\Controllers;

use App\Models\BiodataModel;
use App\Models\PendidikanModel;
use App\Models\PengalamanModel;
use App\Models\KeahlianModel;
use App\Models\PortofolioModel;

class Home extends BaseController
{
    public function index()
    {
        helper('url');

        $biodataModel     = new BiodataModel();
        $pendidikanModel  = new PendidikanModel();
        $pengalamanModel  = new PengalamanModel();
        $keahlianModel    = new KeahlianModel();
        $portofolioModel  = new PortofolioModel();

        $idBiodata = 1; // sesuai isi DB kamu

        $data = [
            // ambil biodata
            'biodata'        => $biodataModel->find($idBiodata),

            // pendidikan
            'pendidikan'     => $pendidikanModel
                                ->where('id_biodata', $idBiodata)
                                ->orderBy('tahun_masuk', 'ASC')
                                ->findAll(),

            // pengalaman
            'pengalaman'     => $pengalamanModel
                                ->where('id_biodata', $idBiodata)
                                ->orderBy('tahun_mulai', 'ASC')
                                ->findAll(),

            // keahlian
            'keahlian'       => $keahlianModel
                                ->where('id_biodata', $idBiodata)
                                ->findAll(),

            // portofolio
            'portofolio'     => $portofolioModel
                                ->where('id_biodata', $idBiodata)
                                ->findAll(),
        ];

        return view('welcome_message', $data);
    }
}