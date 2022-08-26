<?= $this->extend('templates/templates'); ?>


<?= $this->section('konten'); ?>

<!-- konten -->
<div class="konten">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Laporan Surat Keluar Rumah Bahasa</h1>
        <p class="mb-4">Berikut data-data surat keluar.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <center>
                    <h6 class="m-0 font-weight-bold text-primary">Surat Keluar </h6>
                </center>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="suratkeluar" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Surat</th>
                                <th>Pengirim</th>
                                <th>Perihal</th>
                                <th>Tujuan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- akhir konten -->

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        var dataTable = $('#suratkeluar').DataTable({
            dom: 'Bfrtip',
            buttons: ['excel', 'pdf', 'print'],
            "processing": true,
            "ordering": true,
            "info": true,
            "serverSide": true,
            "stateSave": true,
            "scrollX": true,
            "ajax": {
                url: "<?php echo base_url("Laporan/ajax_list_keluar"); ?>", // json datasource
                type: "POST", // method  , by default get

            }
        });
    });
</script>

<?= $this->endsection('konten'); ?>