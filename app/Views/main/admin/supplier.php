<?= $this->extend('main/admin/adminLayout/bahanLayout') ?>
<?= $this->section('konten') ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Buat & Data Supplier</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                    <li class="breadcrumb-item active">Buat & Data Supplier</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Buat Supplier</h4>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
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
                        <form action="/admin/buat_supplier" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label>Nama Supplier</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" name="nama" value="<?= old('nama') ?>" placeholder="Nama lengkap">
                                <div class="invalid-feedback"><?= $validation->getError('nama') ?></div>
                            </div>
                            <div class="form-group">
                                <label>Email Supplier</label>
                                <input type="text" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" name="email" value="<?= old('email') ?>" placeholder="Email aktif">
                                <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                            </div>
                            <div class="form-group">
                                <label>No Handphone Supplier</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control <?= $validation->hasError('no_hp') ? 'is-invalid' : '' ?>" name="no_hp" value="<?= old('no_hp') ?>" placeholder="Diawali dengan 0">
                                <div class="invalid-feedback"><?= $validation->getError('no_hp') ?></div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Supplier</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : '' ?>" name="alamat" value="<?= old('alamat') ?>" placeholder="Alamat lengkap">
                                <div class="invalid-feedback"><?= $validation->getError('alamat') ?></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Buat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <!-- table responsive -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Data Supplier</h4>
                <hr>
                <div class="table-responsive">
                    <table id="supplier-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama supplier</th>
                                <th>Email supplier</th>
                                <th>No handphone supplier</th>
                                <th>Alamat supplier</th>
                                <th>Dibuat</th>
                                <th>Terakhir diubah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($getSupplier as $supplier) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $supplier['nama'] ?></td>
                                    <td><?= $supplier['email'] == null ? 'Tidak ada' : $supplier['email'] ?></td>
                                    <td><?= $supplier['no_hp'] ?></td>
                                    <td><?= $supplier['alamat'] ?></td>
                                    <td><?= $supplier['created_at'] ?></td>
                                    <td><?= $supplier['updated_at'] ?></td>
                                    <td style="text-align: center;">
                                        <a href="/admin/hapus_supplier/<?= $supplier['id_supp'] ?>" id="hapus-supplier" class="btn btn-danger btn-sm">Hapus</a>
                                        <a href="javascript:void(0);" data-id="<?= $supplier['id_supp'] ?>" data-nama="<?= $supplier['nama'] ?>" data-email="<?= $supplier['email'] ?>" data-nohp="<?= $supplier['no_hp'] ?>" data-alamat="<?= $supplier['alamat'] ?>" id="ubah-supplier" class="btn btn-info btn-sm">Ubah</a>
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
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Nama Supplier</label><span class="text-danger"> *</span>
                        <input type="text" class="form-control <?= $validation->hasError('nama_ubah') ? 'is-invalid' : '' ?>" name="nama_ubah" placeholder="Nama lengkap">
                        <div class="invalid-feedback"><?= $validation->getError('nama_ubah') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Email Supplier</label>
                        <input type="text" class="form-control <?= $validation->hasError('email_ubah') ? 'is-invalid' : '' ?>" name="email_ubah" placeholder="Email aktif">
                        <div class="invalid-feedback"><?= $validation->getError('email_ubah') ?></div>
                    </div>
                    <div class="form-group">
                        <label>No Handphone Supplier</label><span class="text-danger"> *</span>
                        <input type="text" class="form-control <?= $validation->hasError('no_hp_ubah') ? 'is-invalid' : '' ?>" name="no_hp_ubah" placeholder="Diawali dengan 0">
                        <div class="invalid-feedback"><?= $validation->getError('no_hp_ubah') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Alamat Supplier</label><span class="text-danger"> *</span>
                        <input type="text" class="form-control <?= $validation->hasError('alamat_ubah') ? 'is-invalid' : '' ?>" name="alamat_ubah" placeholder="Alamat lengkap">
                        <div class="invalid-feedback"><?= $validation->getError('alamat_ubah') ?></div>
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
        $('#supplier-table').DataTable({
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

        $(document).on('click', '#hapus-supplier', function(event) {
            event.preventDefault();
            let href = $(this).attr('href');
            Swal.fire({
                title: 'Perhatian!',
                text: 'Yakin ingin menghapus data supplier ini?',
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

        $(document).on('click', '#ubah-supplier', function() {
            // Data
            let idSupplier = $(this).data('id');
            let namaSupplier = $(this).data('nama');
            let emailSupplier = $(this).data('email');
            let nohpSupplier = $(this).data('nohp');
            let alamatSupplier = $(this).data('alamat');
            // Title
            const title = `Ubah Data ${namaSupplier}`;
            $('#editModalLabel').html(title);
            // Put Input
            $('[name="nama_ubah"]').val(namaSupplier);
            $('[name="email_ubah"]').val(emailSupplier);
            $('[name="no_hp_ubah"]').val(nohpSupplier);
            $('[name="alamat_ubah"]').val(alamatSupplier);

            $('#form-ubah').attr('action', `/admin/ubah_supplier/${idSupplier}`);
            // Show Modal
            $('#editModal').modal('show')
        })
    })
</script>
<?= $this->endSection() ?>