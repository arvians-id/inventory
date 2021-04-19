<?= $this->extend('main/admin/adminLayout/bahanLayout') ?>
<?= $this->section('konten') ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Buat & Data Bahan</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                    <li class="breadcrumb-item active">Buat & Data Bahan</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Buat Bahan</h4>
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
                        <form action="/admin/buat_bahan" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label>Nama Bahan</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control <?= $validation->hasError('nama_bhn') ? 'is-invalid' : '' ?>" name="nama_bhn" value="<?= old('nama_bhn') ?>" placeholder="contoh: Kayu">
                                <div class="invalid-feedback"><?= $validation->getError('nama_bhn') ?></div>
                            </div>
                            <div class="form-group">
                                <label>Satuan</label><span class="text-danger"> *</span>
                                <select class="custom-select col-12 <?= $validation->hasError('id_satuan') ? 'is-invalid' : '' ?>" name="id_satuan">
                                    <option selected disabled>Pilih...</option>
                                    <?php foreach ($getSatuan as $satuan) : ?>
                                        <option value="<?= $satuan['id_satuan'] ?>" <?= old('id_satuan') == $satuan['id_satuan'] ? 'selected' : '' ?>><?= $satuan['satuan'] ?></option>
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
                <h4 class="card-title">Data Bahan</h4>
                <hr>
                <div class="table-responsive">
                    <table id="bahan-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama bahan</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Dibuat</th>
                                <th>Terakhir diubah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($getBahan as $bahan) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $bahan['nama_bhn'] ?></td>
                                    <td><?= $bahan['total_stok'] ?></td>
                                    <td><?= $bahan['satuan'] ?></td>
                                    <td><?= $bahan['dibuat_bahan'] ?></td>
                                    <td><?= $bahan['diubah_bahan'] ?></td>
                                    <td style="text-align: center;">
                                        <a href="/admin/hapus_bahan/<?= $bahan['id_bhn'] ?>" id="hapus-bahan" class="btn btn-danger btn-sm">Hapus</a>
                                        <a href="javascript:void(0);" data-id="<?= $bahan['id_bhn'] ?>" data-nama="<?= $bahan['nama_bhn'] ?>" data-satuan="<?= $bahan['id_satuan'] ?>" id="ubah-bahan" class=" btn btn-info btn-sm">Ubah</a>
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
                        <input type="text" class="form-control <?= $validation->hasError('nama_bhn_ubah') ? 'is-invalid' : '' ?>" name="nama_bhn_ubah">
                        <div class="invalid-feedback"><?= $validation->getError('nama_bhn_ubah') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label><span class="text-danger"> *</span>
                        <select class="custom-select col-12 <?= $validation->hasError('id_satuan_ubah') ? 'is-invalid' : '' ?>" name="id_satuan_ubah">
                            <option selected disabled>Pilih...</option>
                            <?php foreach ($getSatuan as $satuan) : ?>
                                <option value="<?= $satuan['id_satuan'] ?>" <?= old('id_satuan_ubah') == $satuan['id_satuan'] ? 'selected' : '' ?>><?= $satuan['satuan'] ?></option>
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

        $(document).on('click', '#hapus-bahan', function(event) {
            event.preventDefault();
            let href = $(this).attr('href');
            Swal.fire({
                title: 'Perhatian!',
                text: 'Yakin ingin menghapus data bahan ini?',
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

        $(document).on('click', '#ubah-bahan', function() {
            // Data
            let idBahan = $(this).data('id');
            let namaBahan = $(this).data('nama');
            let idSatuanBahan = $(this).data('satuan');
            // Title
            const title = `Ubah Data ${namaBahan}`;
            $('#editModalLabel').html(title);
            // Put Input
            $('[name="nama_bhn_ubah"]').val(namaBahan);
            $('[name="id_satuan_ubah"]').val(idSatuanBahan);
            $('#form-ubah').attr('action', `/admin/ubah_bahan/${idBahan}`);
            // Show Modal
            $('#editModal').modal('show')
        })
    })
</script>
<?= $this->endSection() ?>