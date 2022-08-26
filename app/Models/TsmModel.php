<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class TsmModel extends Model
{
    protected $table      = 'surat_masuk';

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;
    protected $allowedFields = ['no_surat', 'pengirim', 'perihal', 'penerima', 'tgl_diterima', 'file'];
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

        return $builder = $this->table('surat_masuk')->like('no_surat', $keyword)->orLike('pengirim', $keyword)->orLike('perihal', $keyword)->orLike('penerima', $keyword)->orLike('tgl_diterima', $keyword);
    }
}
