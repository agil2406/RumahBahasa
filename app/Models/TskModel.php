<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class TskModel extends Model
{
    protected $table      = 'surat_keluar';

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;
    protected $allowedFields = ['no_surat', 'pengirim', 'perihal', 'tujuan', 'tanggal', 'file'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getSurat($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }


    public function searchSK($keyword)
    {

        return $builder = $this->table('surat_keluar')->like('no_surat', $keyword)->orLike('pengirim', $keyword)->orLike('perihal', $keyword)->orLike('tujuan', $keyword)->orLike('tanggal', $keyword);
    }
}
