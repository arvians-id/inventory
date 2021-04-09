<?= $this->extend('main/admin/adminLayout/bahanLayout') ?>
<?= $this->section('konten') ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-7 col-md-5 align-self-center">
                <h3 class="text-themecolor">Data Bahan Keluar</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                    <li class="breadcrumb-item active">Bahan Keluar</li>
                </ol>
            </div>
            <div class="col-5 col-md-7 align-self-center text-right d-md-block">
                <a href="/admin/buat_bahan_keluar" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah</a>
            </div>
        </div>
        <!-- table responsive -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Bahan Keluar</h4>
                <h6 class="card-subtitle">Data table example</h6>
                <hr>
                <?php if (session()->getFlashdata('sukses')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('sukses') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif (session()->getFlashdata('gagal')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('gagal') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>
                <div class="table-responsive">
                    <table id="bahan-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>Tanggal keluar</th>
                                <th>Nama bahan</th>
                                <th>Jumlah keluar</th>
                                <th>Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($getBahanKeluar as $bahanKeluar) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= 'TRX00000' . $bahanKeluar['id_brg_msk'] ?></td>
                                    <td><?= $bahanKeluar['tgl_keluar'] ?></td>
                                    <td><?= $bahanKeluar['nama_bhn'] ?></td>
                                    <td><?= $bahanKeluar['jml_keluar'] ?></td>
                                    <td><?= $bahanKeluar['dibuat_bahan'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('main/layout/footer') ?>
</div>

<script src="/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
<script>
    $(function() {
        $('#bahan-table').DataTable({
            "autoWidth": false,
            "responsive": true,
            "columnDefs": [{
                    "targets": [-1],
                    "orderable": false,
                },
                {
                    "targets": [-1],
                    "className": "text-center"
                },
            ],
        })

        $(document).on('click', '#hapus-bahan-keluar', function(event) {
            event.preventDefault();
            let href = $(this).attr('href');
            Swal.fire({
                title: 'Perhatian!',
                text: 'Yakin ingin menghapus data bahan keluar ini?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1d96c3',
                cancelButtonColor: '#ff5c6c',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        })
    })
</script>
<?= $this->endSection() ?>