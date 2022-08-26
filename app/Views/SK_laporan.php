<?= $this->extend('templates/templates'); ?>


<?= $this->section('konten'); ?>

<div class=" card-body">
    <h1>
        <center> Data Surat Keluar Laporan</center>
    </h1>

    <div class="row mt-3">
        <div class="col-6">
            <a href="/Bsurat/createLaporan" class="btn btn-primary ">Buat Surat</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-6 ml-auto">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan keyword pencarian" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="Tsuratmasuk" width="100%" cellspacing="0">
            <thead>
            <tbody>
                <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Pengirim</th>
                    <th>Perihal</th>
                    <th>Tujuan</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($sk_laporan as $sk) : ?>
                    <tr>
                        <td><?= $i++; ?> </td>
                        <td><?= $sk['no_surat'] ?></td>
                        <td><?= $sk['pengirim'] ?></td>
                        <td><?= $sk['perihal'] ?></td>
                        <td><?= $sk['tujuan'] ?></td>
                        <td><?= $sk['tanggal'] ?></td>
                        <td>
                            <a href="/Bsurat/detailLaporan/<?= $sk['id']; ?>" class="btn btn-success">Detail</a>
                        </td>
                    </tr>
                    </thead>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>

<?= $this->endsection('konten'); ?>