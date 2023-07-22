<script>
    // Data Table
    var index = $("#fakultas").dataTable({
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
            'data': 'fakultas_name'
        }, {
            'data': 'fakultas_id',
            render: function(data, meta, row) {
                return `<button type="button" class="btn btn-warning btn-edit" data-id="` + data + `">Edit</button>
                    <button type="button" class="btn btn-danger btn-delete" data-id="` + data + `">Delete</button>`;
            }
        }]
    });
</script>