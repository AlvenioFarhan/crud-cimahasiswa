<script>
    $(document).ready(function() {
        $(document).on('click', "#btnSave", function(event) {
            event.preventDefault();
            var data = {
                'nama': $("#mhsName").val(), // -> HOW TO GET DATA FROM INPUT REGULER FORM
                'nim': $("#mhsNIM").val(),
                'tgl_lahir': $("#mhsDate").val(),
                'fakultas': $("#mhsFakultas").val(),
            }
            $.ajax({
                url: "<?php echo base_url('mahasiswa/tambah_aksi') ?>",
                data: data,
                cache: false,
                type: "post",
                dataType: "json",
                success: function(response) {
                    if (response.status == 1) {
                        alert(response.pesan);
                        window.location.reload();
                    } else {

                    }
                }
            });

            $.ajax({
                url: "<?php echo base_url('mahasiswa/delete_data') ?>",
                data: data,
                cache: false,
                type: "delete",
                dataType: "json",
                success: function(response) {
                    if (response.status == 1) {
                        alert(response.pesan);
                        window.location.reload();
                    } else {

                    }
                }
            });
        })
    });
</script>