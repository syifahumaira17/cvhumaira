<?php
namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table = 'biodata';
    protected $primaryKey = 'id_biodata';

    protected $allowedFields = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'email',
        'no_hp',
        'deskripsi_singkat',
        'foto'
    ];
}