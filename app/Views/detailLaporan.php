<?= $this->extend('templates/templates'); ?>


<?= $this->section('konten'); ?>
<div class=" card-body">
    <h1>
        <center> Detail Surat Keluar Laporan</center>
    </h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form>
                    <div class="form-group row">
                        <label for="no_surat" class="col-sm-2 col-form-label">No Surat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?= $sk_laporan['no_surat'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?= $sk_laporan['perihal'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_diterima" class="col-sm-2 col-form-label">Tanggal Diterima</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" value="<?= $sk_laporan['tanggal'] ?>">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?= $sk_laporan['pengirim'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerima" class="col-sm-2 col-form-label">Penerima</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?= $sk_laporan['tujuan'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <form action="<?= base_url('/Bsurat/deleteLaporan') . '/' . $sk_laporan['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="hapus">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Untuk Menghapusnya ?') ; ">Hapus</button>
                </form>
            </div>
        </div>
        <?= $this->endsection('konten'); ?>