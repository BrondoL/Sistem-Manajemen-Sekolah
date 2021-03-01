<?= $this->extend('auth/layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Siswa</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('auth/kelas') ?>">List Kelas</a></li>
        <li class="breadcrumb-item active">List Siswa</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<p class="sub-title"> <button type="button" class="btn btn-primary btn-sm tambahsiswa"><i class=" fa fa-plus-circle"></i> Tambah Siswa</button>
</p>
<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listsiswa() {
        $.ajax({
            url: "<?= site_url('siswa/getdata') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listsiswa();
        $('.tambahsiswa').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('siswa/formtambah') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();

                    $('#modaltambah').modal('show');
                }
            });
        });
    });
</script>
<?= $this->endSection('isi') ?>