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
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Buat Bahan</h4>
                <h6 class="card-subtitle"> All with bootstrap element classies </h6>
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
                        <form action="/admin/create_bahan_masuk" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label>Tanggal Masuk</label><span class="text-danger"> *</span>
                                <input type="date" class="form-control <?= $validation->hasError('tgl_masuk') ? 'is-invalid' : '' ?>" name="tgl_masuk" value="<?= old('tgl_masuk') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('tgl_masuk') ?></div>
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
                            <div class="form-group">
                                <label>Bahan</label><span class="text-danger"> *</span>
                                <select class="custom-select col-12 <?= $validation->hasError('id_bhn') ? 'is-invalid' : '' ?>" name="id_bhn">
                                    <option selected disabled>Pilih...</option>
                                    <?php foreach ($getBahan as $bahan) : ?>
                                        <option value="<?= $bahan['id_bhn'] ?>" <?= old('id_bhn') == $bahan['id_bhn'] ? 'selected' : '' ?> data-satuan="<?= ucfirst($bahan['satuan']) ?>" data-stok="<?= $bahan['total_stok'] ?>"><?= $bahan['nama_bhn'] . ' - ' . ucfirst($bahan['satuan']) ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('id_bhn') ?></div>
                            </div>
                            <div class="form-group">
                                <label>Stok Awal</label>
                                <input type="text" class="form-control <?= $validation->hasError('stok_awal') ? 'is-invalid' : '' ?>" id="stok-awal" name="stok_awal" value="<?= old('stok_awal') ?>" readonly>
                                <div class="invalid-feedback"><?= $validation->getError('stok_awal') ?></div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Masuk</label><span class="text-danger"> *</span>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control <?= $validation->hasError('jml_masuk') ? 'is-invalid' : '' ?>" value="<?= old('jml_masuk') ?>" name="jml_masuk" <?= old('id_bhn') ? '' : 'readonly' ?> autocomplete="off">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="satuan-bahan">Satuan</span>
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('jml_masuk') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Total Stok</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control <?= $validation->hasError('total_stok') ? 'is-invalid' : '' ?>" value="<?= old('total_stok') ?>" id="stok-akhir" name="total_stok" readonly>
                                <div class="invalid-feedback"><?= $validation->getError('total_stok') ?></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Buat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('main/layout/footer') ?>
</div>

<script src="/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
<script>
    $(function() {
        $('[name="id_bhn"]').on('change', function() {
            let dataStok = $(this).find(':selected').data('stok');
            let satuan = $(this).find(':selected').data('satuan');
            let jmlMasuk = $('[name="jml_masuk"]');

            if (jmlMasuk.val() == '') {
                $('#stok-awal').val(dataStok);
                $('#stok-akhir').val(dataStok);
            } else {
                $('#stok-awal').val(dataStok);
                dataStok = dataStok + parseInt(jmlMasuk.val());
                $('#stok-akhir').val(dataStok).trigger('change');
            }

            jmlMasuk.removeAttr('readonly')
            $('#satuan-bahan').html(satuan);
        })
        $('[name="jml_masuk"]').on('keyup', function() {
            let jmlMasuk = parseInt($(this).val());
            let stokAwal = parseInt($('#stok-awal').val());
            let totalStok = $('#stok-akhir');

            if ($(this).val() == '') {
                totalStok.val(stokAwal);
            } else {
                stokAwal = stokAwal + jmlMasuk;
                totalStok.val(stokAwal);
            }
        })
    })
</script>
<?= $this->endSection() ?>