<?php
namespace App\Models;

use CodeIgniter\Model;

class PortofolioModel extends Model
{
    protected $table = 'portofolio';
    protected $primaryKey = 'id_portofolio';

    protected $allowedFields = [
        'id_biodata',
        'judul',
        'deskripsi',
        'link_karya',
        'gambar'
    ];
}