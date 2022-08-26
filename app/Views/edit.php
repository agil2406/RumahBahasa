<?= $this->extend('templates/templates'); ?>

<?= $this->section('konten'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Surat Masuk</h2>
            <form action="/Transaksi/update/<?= $surat_masuk['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $surat_masuk['id']; ?>">
                <input type="hidden" name="fileLama" value="<?= $surat_masuk['file']; ?>">
                <div class="form-group row">
                    <label for="no_surat" class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" id="no_surat" placeholder="No Surat" name="no_surat" autofocus value="<?= (old('no_surat')) ? old('no_surat') : $surat_masuk['no_surat'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_surat'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('pengirim')) ? 'is-invalid' : ''; ?>" id="pengirim" placeholder="Pengirim" name="pengirim" value="<?= (old('pengirim')) ? old('pengirim') : $surat_masuk['pengirim'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pengirim'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" id="perihal" placeholder="Perihal" name="perihal" value="<?= (old('perihal')) ? old('perihal') : $surat_masuk['perihal'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('perihal'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerima" class="col-sm-2 col-form-label">Penerima</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('penerima')) ? 'is-invalid' : ''; ?>" id="penerima" placeholder="Penerima" name="penerima" value="<?= (old('penerima')) ? old('penerima') : $surat_masuk['penerima'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('penerima'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_diterima" class="col-sm-2 col-form-label">Tanggal Diterima</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_diterima')) ? 'is-invalid' : ''; ?>" id="tgl_diterima" name="tgl_diterima" value="<?= (old('tgl_diterima')) ? old('tgl_diterima') : $surat_masuk['tgl_diterima'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_diterima'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="file" class="col-sm-2 col-form-label">File </label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" id="file" name="file" onchange="previewSurat()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('file'); ?>
                            </div>
                            <label class="custom-file-label" for="file"><?= $surat_masuk['file']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>