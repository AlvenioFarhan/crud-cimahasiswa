<script>
    $(document).ready(function() {
        let url = "<?php echo base_url('dosen'); ?>"

        let isnew = true;
        let idn = null;
        $('.btn-add').on('click', function(e) {
            e.preventDefault();
            isnew = true;
            $('#exampleModal').modal('show');
        });

        
        // Data Table
        var index = $("#dosen").dataTable({
            "processing" : true,
            "serverSide" : true,
            ajax: {
                url: url +"/loadData",
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
                'data': 'id',
                render: function(data, meta, row) {
                    return `<button type="button" class="btn btn-warning btn-edit" data-id="` + data + `">Edit</button>
                    <button type="button" class="btn btn-danger btn-delete" data-id="` + data + `">Delete</button>`;
                }
            }]
        });
    });
</script>