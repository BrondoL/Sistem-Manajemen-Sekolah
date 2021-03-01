<?= $this->extend('auth/layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Pengumuman</a></li>
        <li class="breadcrumb-item active">Umum</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<p class="sub-title"> <button type="button" class="btn btn-primary btn-sm tambahpengumuman"><i class=" fa fa-plus-circle"></i> Tambah Pengumuman</button>
</p>
<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listpengumuman() {
        $.ajax({
            url: "<?= site_url('pengumuman/getdata') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listpengumuman();
        $('.tambahpengumuman').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('pengumuman/formtambah') ?>",
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