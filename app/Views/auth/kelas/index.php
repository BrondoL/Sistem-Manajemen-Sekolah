<?= $this->extend('auth/layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Siswa</a></li>
        <li class="breadcrumb-item active">List Kelas</li>
        <li class="breadcrumb-item "><a href="<?= site_url('auth/siswa') ?>">List Siswa</a></li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<p class="sub-title"> <button type="button" class="btn btn-primary btn-sm tambahkelas"><i class=" fa fa-plus-circle"></i> Tambah Kelas</button>
</p>
<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listkelas() {
        $.ajax({
            url: "<?= site_url('siswa/getkelas') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listkelas();
        $('.tambahkelas').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('siswa/formkelas') ?>",
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