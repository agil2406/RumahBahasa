<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class skLModel extends Model
{
    protected $table      = 'sk_laporan';

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;
    protected $allowedFields = ['no_surat', 'pengirim', 'perihal', 'tujuan', 'tanggal'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getSurat($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }


    public function search($keyword)
    {

        return $builder = $this->table('sk_laporan')->like('no_surat', $keyword)->orLike('pengirim', $keyword)->orLike('perihal', $keyword)->orLike('tujuan', $keyword)->orLike('tanggal', $keyword);
    }
}
