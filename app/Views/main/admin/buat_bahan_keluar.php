<?= $this->extend('main/admin/adminLayout/bahanLayout') ?>
<?= $this->section('konten') ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Buat Bahan Keluar</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                    <li class="breadcrumb-item active">Buat Bahan Keluar</li>
                </ol>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Buat Bahan Keluar</h4>
                <hr>
                <form action="/admin/create_bahan_keluar" method="post">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8">
                            <div class="form-group">
                                <label>Barang</label><span class="text-danger"> *</span>
                                <select class="custom-select col-12 <?= $validation->hasError('id_brg') ? 'is-invalid' : '' ?>" name="id_brg">
                                    <option selected disabled>Pilih...</option>
                                    <?php foreach ($getBarang as $barang) : ?>
                                        <option value="<?= $barang['id_brg'] ?>" <?= old('id_brg') == $barang['id_brg'] ? 'selected' : '' ?> data-stok="<?= $barang['total_stok'] ?>"><?= $barang['nama_brg'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('id_brg') ?></div>
                            </div>

                            <div class="form-group">
                                <label>Stok Awal</label>
                                <input type="text" class="form-control" id="stok-awal" name="stok_awal" value="<?= old('stok_awal') ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Barang Masuk</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control <?= $validation->hasError('jml_masuk') ? 'is-invalid' : '' ?>" name="jml_masuk" value="<?= old('jml_masuk') ?>" <?= old('id_brg') ? '' : 'readonly' ?> autocomplete="off">
                                <div class="invalid-feedback"><?= $validation->getError('jml_masuk') ?></div>
                            </div>
                            <div class="form-group">
                                <label>Total Stok</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control <?= $validation->hasError('total_stok') ? 'is-invalid' : '' ?>" value="<?= old('total_stok') ?>" id="stok-akhir" name="total_stok" readonly>
                                <div class="invalid-feedback"><?= $validation->getError('total_stok') ?></div>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Masuk Barang/Tanggal Keluar Bahan</label><span class="text-danger"> *</span>
                                <input type="date" class="form-control <?= $validation->hasError('tgl_keluar') ? 'is-invalid' : '' ?>" name="tgl_keluar" value="<?= old('tgl_keluar') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('tgl_keluar') ?></div>
                            </div>
                        </div>
                    </div>
                    <?php if ($validation->hasError('jml_keluar.*') || $validation->hasError('stok_bahan.*')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php
                            $jmlKeluar = $validation->hasError('jml_keluar.*') ? "<li>" . $validation->getError('jml_keluar.*') . "</li>" : null;
                            $stokBahan = $validation->hasError('stok_bahan.*') ? "<li>" . $validation->getError('stok_bahan.*') . "</li>" : null;
                            echo "<ul>
                                    $jmlKeluar
                                    $stokBahan
                                </ul>"
                            ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>
                    <div class="row">
                        <?php foreach ($getBahan as $bahan) : ?>
                            <div class="col-12 col-lg-6">
                                <?= csrf_field() ?>
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= $bahan['nama_bhn'] ?></h4>
                                        <hr>
                                        <input type="hidden" name="id_bhn[]" value="<?= $bahan['id_bhn'] ?>">
                                        <div class="form-group">
                                            <label>Stok Awal</label>
                                            <input type="text" class="form-control" id="stok-awal-<?= $bahan['id_bhn'] ?>" value="<?= $bahan['total_stok'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Keluar</label><span class="text-danger"> *</span>
                                            <div class="input-group">
                                                <input type="text" class="form-control <?= $validation->hasError('jml_keluar.*') ? 'is-invalid' : '' ?>" name="jml_keluar[]" data-idKeluar="<?= $bahan['id_bhn'] ?>" id="jml_keluar" autocomplete="off">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="satuan-bahan"><?= $bahan['satuan'] ?></span>
                                                </div>
                                            </div>
                                            <small class="text-info">Masukkan 0 jika tidak ada bahan keluar</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Stok</label><span class="text-danger"> *</span>
                                            <input type="text" class="form-control <?= $validation->hasError('stok_bahan.*') ? 'is-invalid' : '' ?>" value="<?= $bahan['total_stok'] ?>" id="<?= $bahan['id_bhn'] ?>" name="stok_bahan[]" readonly>
                                            <small class="text-danger" style="display: none;" id="show-alert-<?= $bahan['id_bhn'] ?>">Total stok tidak bisa kurang dari 0</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </form>
            </div>
        </div>
    </div>
    <?= $this->include('main/layout/footer') ?>
</div>

<script src="/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
<script>
    $(function() {
        // Barang
        $('[name="id_brg"]').on('change', function() {
            let dataStok = $(this).find(':selected').data('stok');
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
        // Bahan
        $(document).on('keyup', '[name="jml_keluar[]"]', function() {
            let jmlMasuk = parseInt($(this).val());
            let getId = $(this).attr('data-idKeluar');
            let stokAwal = parseInt($('#stok-awal-' + getId).val());

            let totalStok = $('#' + getId);

            if ($(this).val() == '') {
                totalStok.val(stokAwal);
            } else {
                stokAwal = stokAwal - jmlMasuk;
                if (stokAwal >= 0) {
                    totalStok.val(stokAwal);
                    $('#show-alert-' + getId).hide();
                } else {
                    totalStok.val(stokAwal);
                    $('#show-alert-' + getId).show();
                }
            }
        })
    })
</script>
<?= $this->endSection() ?>