<?= $this->extend('main/admin/adminLayout/bahanLayout') ?>
<?= $this->section('konten') ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Buat & Data Satuan</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                    <li class="breadcrumb-item active">Buat & Data Satuan</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Buat Satuan</h4>
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
                        <form action="/admin/buat_satuan" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label>Nama Satuan</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control <?= $validation->hasError('satuan') ? 'is-invalid' : '' ?>" name="satuan" value="<?= old('satuan') ?>" placeholder="contoh: Unit">
                                <div class="invalid-feedback"><?= $validation->getError('satuan') ?></div>
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
                <h4 class="card-title">Data Satuan</h4>
                <hr>
                <div class="table-responsive">
                    <table id="satuan-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Satuan</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($getSatuan as $satuan) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $satuan['satuan'] ?></td>
                                    <td><?= $satuan['created_at'] ?></td>
                                    <td style="text-align: center;"><a href="/admin/hapus_satuan/<?= $satuan['id_satuan'] ?>" id="hapus-satuan" class="btn btn-danger btn-sm">Hapus</a></td>
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
        $('#satuan-table').DataTable({
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

        $(document).on('click', '#hapus-satuan', function(event) {
            event.preventDefault();
            let href = $(this).attr('href');
            Swal.fire({
                title: 'Perhatian!',
                text: 'Yakin ingin menghapus data satuan ini?',
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