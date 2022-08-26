<?= $this->extend('templates/templates'); ?>


<?= $this->section('konten'); ?>

<div class=" card-body">
    <h1>
        <center> Data Surat Masuk</center>
    </h1>

    <div class="row mt-3">
        <div class="col-6">
            <a href="/Transaksi/create" class="btn btn-primary ">Tambah Surat Masuk</a>
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
                    <th>Penerima</th>
                    <th>Tanggal Diterima</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                <?php foreach ($surat_masuk as $sm) : ?>
                    <tr>
                        <td><?= $i++; ?> </td>
                        <td><?= $sm['no_surat'] ?></td>
                        <td><?= $sm['pengirim'] ?></td>
                        <td><?= $sm['perihal'] ?></td>
                        <td><?= $sm['penerima'] ?></td>
                        <td><?= $sm['tgl_diterima'] ?></td>
                        <td>
                            <a href="/Transaksi/detail/<?= $sm['id']; ?>" class="btn btn-success">Detail</a>
                        </td>
                    </tr>
                    </thead>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?= $pager->links('surat_masuk', 'sm_pagination'); ?>
    </div>
</div>

<?= $this->endsection('konten'); ?>