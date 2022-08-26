<?= $this->extend('templates/templates'); ?>


<?= $this->section('konten'); ?>
<div class=" card-body">
    <h1>
        <center> Detail Surat Keluar</center>
    </h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form>
                    <div class="form-group row">
                        <label for="no_surat" class="col-sm-2 col-form-label">No Surat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?= $surat_keluar['no_surat'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?= $surat_keluar['perihal'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_diterima" class="col-sm-2 col-form-label">Tanggal Dibuat</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" value="<?= $surat_keluar['tanggal'] ?>">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?= $surat_keluar['pengirim'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerima" class="col-sm-2 col-form-label">Tujuan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?= $surat_keluar['tujuan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="file" class="col-sm-2 col-form-label">File </label>
                    <div class="col-sm-8">
                        <embed src="<?= base_url('surat_keluar/') . '/' . $surat_keluar['file']; ?>" type="application/pdf" width="200" height="260">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <form action="<?= base_url('/Transaksi/deleteSK') . '/' . $surat_keluar['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="hapus">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Untuk Menghapusnya ?') ; ">Hapus</button>
                </form>
                <a href="<?= base_url('/Transaksi/editSK') . '/' . $surat_keluar['id']; ?>" class="btn btn-warning mt-auto">Ubah Data</a>
            </div>
        </div>
        <?= $this->endsection('konten'); ?>