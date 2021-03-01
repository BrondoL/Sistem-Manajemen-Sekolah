<?= $this->extend('auth/layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Pengumuman</a></li>
        <li class="breadcrumb-item active">Kelulusan</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<p class="sub-title"> <button type="button" class="btn btn-primary btn-sm tambahkelulusan"><i class=" fa fa-plus-circle"></i> Tambah Data</button>
</p>
<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listkelulusan() {
        $.ajax({
            url: "<?= site_url('pengumuman/getkelulusan') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listkelulusan();
        $('.tambahkelulusan').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('pengumuman/formkelulusan') ?>",
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