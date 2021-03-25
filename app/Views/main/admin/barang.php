<?= $this->extend('main/admin/adminLayout/bahanLayout') ?>
<?= $this->section('konten') ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Buat & Data Barang</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                    <li class="breadcrumb-item active">Buat & Data Barang</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Buat Barang</h4>
                <h6 class="card-subtitle"> All with bootstrap element classies </h6>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <form action="/admin/buat_barang" method="post">
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
                            <div class="form-group">
                                <label>Nama Barang</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control <?= $validation->hasError('nama_brg') ? 'is-invalid' : '' ?>" name="nama_brg" value="<?= old('nama_brg') ?>" placeholder="contoh: Kayu palet">
                                <div class="invalid-feedback"><?= $validation->getError('nama_brg') ?></div>
                            </div>
                            <div class="form-group">
                                <label>Satuan</label><span class="text-danger"> *</span>
                                <select class="custom-select col-12 <?= $validation->hasError('id_satuan') ? 'is-invalid' : '' ?>" name="id_satuan">
                                    <option selected disabled>Pilih...</option>
                                    <?php foreach ($getSatuan as $satuan) : ?>
                                        <option value="<?= $satuan['id_satuan'] ?>" <?= old('id_satuan') ? 'selected' : '' ?>><?= $satuan['satuan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('id_satuan') ?></div>
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
                <h4 class="card-title">Data Barang</h4>
                <h6 class="card-subtitle">Data table example</h6>
                <hr>
                <div class="table-responsive">
                    <table id="barang-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Dibuat</th>
                                <th>Terakhir diubah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($getBarang as $barang) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $barang['nama_brg'] ?></td>
                                    <td>20</td>
                                    <td><?= $barang['satuan'] ?></td>
                                    <td><?= $barang['dibuat_barang'] ?></td>
                                    <td><?= $barang['diubah_barang'] ?></td>
                                    <td style="text-align: center;">
                                        <a href="/admin/hapus_barang/<?= $barang['id_brg'] ?>" id="hapus-barang" class="btn btn-danger btn-sm">Hapus</a>
                                        <a href="javascript:void(0);" data-id="<?= $barang['id_brg'] ?>" data-nama="<?= $barang['nama_brg'] ?>" data-satuan="<?= $barang['id_satuan'] ?>" id="ubah-barang" class="btn btn-info btn-sm">Ubah</a>
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
                        <label>Nama Barang</label><span class="text-danger"> *</span>
                        <input type="text" class="form-control <?= $validation->hasError('nama_brg_ubah') ? 'is-invalid' : '' ?>" name="nama_brg_ubah">
                        <div class="invalid-feedback"><?= $validation->getError('nama_brg_ubah') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label><span class="text-danger"> *</span>
                        <select class="custom-select col-12 <?= $validation->hasError('id_satuan_ubah') ? 'is-invalid' : '' ?>" name="id_satuan_ubah">
                            <option selected disabled>Pilih...</option>
                            <?php foreach ($getSatuan as $satuan) : ?>
                                <option value="<?= $satuan['id_satuan'] ?>" <?= old('id_satuan_ubah') ? 'selected' : '' ?>><?= $satuan['satuan'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('id_satuan_ubah') ?></div>
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
        $('#barang-table').DataTable({
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

        $(document).on('click', '#hapus-barang', function(event) {
            event.preventDefault();
            let href = $(this).attr('href');
            Swal.fire({
                title: 'Perhatian!',
                text: 'Yakin ingin menghapus data barang ini?',
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

        $(document).on('click', '#ubah-barang', function() {
            // Data
            let idBarang = $(this).data('id');
            let namaBarang = $(this).data('nama');
            let idSatuanBarang = $(this).data('satuan');
            // Title
            const title = `Ubah Data ${namaBarang}`;
            $('#editModalLabel').html(title);
            // Put Input
            $('[name="nama_brg_ubah"]').val(namaBarang);
            $('[name="id_satuan_ubah"]').val(idSatuanBarang);
            $('#form-ubah').attr('action', `/admin/ubah_barang/${idBarang}`);
            // Show Modal
            $('#editModal').modal('show')
        })
    })
</script>
<?= $this->endSection() ?>