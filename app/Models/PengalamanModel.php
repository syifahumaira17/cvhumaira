<?php
namespace App\Models;

use CodeIgniter\Model;

class PengalamanModel extends Model
{
    protected $table = 'pengalaman';
    protected $primaryKey = 'id_pengalaman';

    protected $allowedFields = [
        'id_biodata',
        'jenis_pengalaman',
        'nama_tempat',
        'posisi',
        'tahun_mulai',
        'tahun_selesai',
        'deskripsi'
    ];
}