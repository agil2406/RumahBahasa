<?= $this->extend('templates/templates'); ?>

<?= $this->section('konten'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Buat Surat Keluar Laporan</h2>
            <form action="/Bsurat/saveLaporan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="no_surat" class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" id="no_surat" placeholder="No Surat" name="no_surat" autofocus value="<?= old('no_surat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_surat'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('pengirim')) ? 'is-invalid' : ''; ?>" id="pengirim" placeholder="Pengirim" name="pengirim" value="<?= old('pengirim'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pengirim'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" id="perihal" placeholder="Perihal" name="perihal" value="<?= old('perihal'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('perihal'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('tujuan')) ? 'is-invalid' : ''; ?>" id="tujuan" placeholder="Tujuan" name="tujuan" value="<?= old('tujuan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tujuan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Dibuat</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Buat Surat</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>