<?php
namespace App\Models;

use CodeIgniter\Model;

class KeahlianModel extends Model
{
    protected $table = 'keahlian';
    protected $primaryKey = 'id_keahlian';

    protected $allowedFields = [
        'id_biodata',
        'nama_keahlian',
        'tingkat'
    ];
}