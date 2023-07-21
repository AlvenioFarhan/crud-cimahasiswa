<script>
    $(document).ready(function() {
        let url = "<?php echo base_url('dosen'); ?>";

        let isnew = true;
        let idn = null;
        $('.btn-add').on('click', function(e) {
            e.preventDefault();
            isnew = true;
            $('#exampleModal').modal('show');
        });


        // Create 
        $(document).on('click', "#btnSave", function(event) {
            event.preventDefault();
            if (isnew) {
                var data = {
                    'nama': $("#dsnName").val(), // -> HOW TO GET DATA FROM INPUT REGULER FORM
                    'nim': $("#dsnNIM").val(),
                    'tgl_lahir': $("#dsnDate").val(),
                    'fakultas': $("#dsnFakultas").val(),
                }
                $.ajax({
                    url: "<?php echo base_url('dosen/tambah_aksi') ?>",
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
                    'dsn_id': idn,
                    'dsn_nama': $("#dsnName").val(), // -> HOW TO GET DATA FROM INPUT REGULER FORM
                    'dsn_nim': $("#dsnNIM").val(),
                    'dsn_tgl_lahir': $("#dsnDate").val(),
                    'dsn_fakultas': $("#dsnFakultas").val(),
                }
                $.ajax({
                    url: "<?php echo base_url('dosen/update') ?>",
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

                });
            }

        });


        $(document).on('click', ".btn-delete", function(e) {
            e.preventDefault();
            var idn = $(this).attr("data-id");


            $.ajax({
                url: url + '/delete',
                data: {
                    dsn_id: idn
                },
                cache: false,
                type: "post",
                dataType: "json",
                beforeSend: function(r) {},
                success: function(r) {
                    alert(r.message);
                    console.log()
                    window.location.reload();
                }
            });

        });

        $(document).on('click', ".btn-edit", function(e) {
            e.preventDefault();
            idn = $(this).attr("data-id");
            isnew = false;

            $.ajax({
                url: url + '/edit',
                data: {
                    dsn_id: idn
                },
                cache: false,
                type: "post",
                dataType: "json",

                success: function(r) {
                    var data_dsn = r.dosen[0];
                    // idn = data_dsn.dsn_id;
                    $("#dsnName").val(data_dsn.dsn_nama);
                    $("#dsnNIM").val(data_dsn.dsn_nim);
                    $("#dsnDate").val(data_dsn.dsn_tgl_lahir);
                    $("#dsnFakultas").val(data_dsn.dsn_fakultas).change();
                    $("#exampleModal").modal("show");
                    console.log(data_dsn.dsn_nama);
                }
            })
        });

        // Data Table
        var index = $("#dosen").dataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: url + "/loadData",
                type: "post",
                dataType: "json",
                cache: "false",
                data: function(d) {
                    //parameter in here
                },
                dataScr: function(responce) {
                    return response.data;
                }
            },
            "columnDefs": [{
                    "searchable": true,
                    "orderable": true,
                    "targets": [0, 1, 2, 3, 4, 5]
                },
                {
                    'width': 'width',
                    'targets': []
                },
                {
                    'className': 'className',
                    'targets': []
                }
            ],
            "order": [
                [0, 'asc']
            ],
            "columns": [{
                'data': 'id',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            }, {
                'data': 'dsn_nama'
            }, {
                'data': 'dsn_nim'
            }, {
                'data': 'dsn_tgl_lahir'
            }, {
                'data': 'fakultas_name'
            }, {
                'data': 'dsn_id',
                render: function(data, meta, row) {
                    return `<button type="button" class="btn btn-warning btn-edit" data-id="` + data + `">Edit</button>
                    <button type="button" class="btn btn-danger btn-delete" data-id="` + data + `">Delete</button>`;
                }
            }]
        });
    });
</script>