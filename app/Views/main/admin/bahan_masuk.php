<?= $this->extend('main/admin/adminLayout/bahanLayout') ?>
<?= $this->section('konten') ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-7 col-md-5 align-self-center">
                <h3 class="text-themecolor">Data Bahan Masuk</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                    <li class="breadcrumb-item active">Bahan Masuk</li>
                </ol>
            </div>
            <div class="col-5 col-md-7 align-self-center text-right d-md-block">
                <a href="/admin/buat_bahan_masuk" class="btn btn-info"><i class="fa fa-plus-circle"></i> Tambah</a>
            </div>
        </div>
        <!-- table responsive -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Bahan Masuk</h4>
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
                                <th>Tanggal masuk</th>
                                <th>Nama bahan</th>
                                <th>Jumlah masuk</th>
                                <th>Supplier</th>
                                <th>Satuan</th>
                                <th>Terakhir diubah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($getBahanMasuk as $bahanMasuk) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $bahanMasuk['dibuat_bahan_masuk'] ?></td>
                                    <td><?= $bahanMasuk['nama_bhn'] ?></td>
                                    <td><?= $bahanMasuk['jml_masuk'] ?></td>
                                    <td><?= $bahanMasuk['nama'] ?></td>
                                    <td><?= $bahanMasuk['satuan'] ?></td>
                                    <td><?= $bahanMasuk['diubah_bahan_masuk'] ?></td>
                                    <td style="text-align: center;">
                                        <a href="/admin/hapus_bahan_masuk/<?= $bahanMasuk['id_bhn_msk'] ?>" id="hapus-bahan-masuk" class="btn btn-danger btn-sm">Hapus</a>
                                        <a href="javascript:void(0);" data-id="<?= $bahanMasuk['id_bhn_msk'] ?>" data-bahan="<?= $bahanMasuk['nama_bhn'] ?>" data-supplier="<?= $bahanMasuk['id_supp'] ?>" id="ubah-bahan-masuk" class=" btn btn-info btn-sm">Ubah</a>
                                    </td>
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

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form-ubah">
                    <div class="form-group">
                        <label>Nama Bahan</label><span class="text-danger"> *</span>
                        <input type="text" class="form-control" id="nama_bahan" readonly>
                    </div>
                    <div class="form-group">
                        <label>Supplier</label><span class="text-danger"> *</span>
                        <select class="custom-select col-12 <?= $validation->hasError('id_supp') ? 'is-invalid' : '' ?>" name="id_supp">
                            <option selected disabled>Pilih...</option>
                            <?php foreach ($getSupplier as $supplier) : ?>
                                <option value="<?= $supplier['id_supp'] ?>" <?= old('id_supp') == $supplier['id_supp'] ? 'selected' : '' ?>><?= $supplier['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('id_supp') ?></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

        $(document).on('click', '#hapus-bahan-masuk', function(event) {
            event.preventDefault();
            let href = $(this).attr('href');
            Swal.fire({
                title: 'Perhatian!',
                text: 'Yakin ingin menghapus data bahan masuk ini?',
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

        $(document).on('click', '#ubah-bahan-masuk', function() {
            // Data
            let idBahan = $(this).data('id');
            let namaBahan = $(this).data('bahan');
            let supplier = $(this).data('supplier');
            // Title
            $('#editModalLabel').html(`Ubah Data ${namaBahan}`);
            // Put Input
            $('#nama_bahan').val(namaBahan);
            $('[name="id_supp"]').val(supplier);
            $('#form-ubah').attr('action', `/admin/ubah_bahan_masuk/${idBahan}`);
            // Show Modal
            $('#editModal').modal('show')
        })
    })
</script>
<?= $this->endSection() ?>