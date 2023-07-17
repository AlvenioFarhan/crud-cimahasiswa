<script>
    $(document).ready(function() {
        var url = "<?php echo base_url('mahasiswa'); ?>";
        
        var isnew = true;
        var idn= null;
        $('.btn-add').on('click', function(e){
            e.preventDefault();
            isnew = true;
            $('#exampleModal').modal('show');
        });

        // Create 
        $(document).on('click', "#btnSave", function(event) {
            event.preventDefault();
            if (isnew) {
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
                            idn = null;
                        } else {
    
                        }
                    }
                });
                
            } else {
                var data = {
                    'id': idn,
                    'nama': $("#mhsName").val(), // -> HOW TO GET DATA FROM INPUT REGULER FORM
                    'nim': $("#mhsNIM").val(),
                    'tgl_lahir': $("#mhsDate").val(),
                    'fakultas': $("#mhsFakultas").val(),
                }
                $.ajax({
                    url: "<?php echo base_url('mahasiswa/update') ?>",
                    data: data,
                    cache: false,
                    type: "post",
                    dataType: "json",
                    success: function(response) {
                        $('#exampleModal').modal('hide')
                        console.log(response);
                        window.location.reload();
                        idn = null;
                    }

                })
            }

            // $.ajax({
            //     url: "<?php echo base_url('mahasiswa/delete_data') ?>",
            //     data: data,
            //     cache: false,
            //     type: "delete",
            //     dataType: "json",
            //     success: function(response) {
            //         if (response.status == 1) {
            //             alert(response.pesan);
            //             window.location.reload();
            //         } else {

            //         }
            //     }
            // });
        })

        // $(document).on('click', ".btn-edit", function(e) {
        //     e.preventDefault();
        //     var data = {
        //         'nama': $("#mhsName").val(), // -> HOW TO GET DATA FROM INPUT REGULER FORM
        //         'nim': $("#mhsNIM").val(),
        //         'tgl_lahir': $("#mhsDate").val(),
        //         'fakultas': $("#mhsFakultas").val(),
        //     }

        //     $.ajax({
        //         url: "<?php echo base_url('mahasiswa/edit') ?>",
        //         data: data,
        //         cache: false,
        //         type: "post",
        //         dataType: "json",

        //     });

        // });

        $(document).on('click', ".btn-delete", function(e) {
            e.preventDefault();
            var idn = $(this).attr("data-id");
            
            
            $.ajax({
                url: url + '/delete',
                data: {
                    id: idn
                },
                cache: false,
                type: "post",
                dataType: "json",
                beforeSend: function(r) {
                },
                success: function(r) {
                    alert(r.message);
                    window.location.reload();
                }
            });

        });

        $(document).on('click', ".btn-edit", function(e){
            e.preventDefault();
             idn = $(this).attr("data-id");
             isnew = false;
            
            $.ajax({
                url: url + '/edit',
                data: {
                    id: idn
                },
                cache: false,
                type:"post",
                dataType: "json",
                
                success: function(r){
                    var data_mhs = r.mahasiswa[0];
                    $("#mhsName").val(data_mhs.nama);
                    $("#mhsNIM").val(data_mhs.nim);
                    $("#mhsDate").val(data_mhs.tgl_lahir);
                    $("#mhsFakultas").val(data_mhs.fakultas).change();
                    $("#exampleModal").modal("show");
                    console.log(data_mhs.nama);
                }
            })
        });
    });
</script>