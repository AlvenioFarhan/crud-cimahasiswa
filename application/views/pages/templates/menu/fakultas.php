<div class="d-flex justify-content-between align-items-center flex-warp grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Data Fakultas</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <table id="fakultas_pg" class="display" style="width: 100%">
            <tr>
                <th>No</th>
                <th>Fakultas</th>
            </tr>

            <?php
            $no = 1;
            foreach ($fakultas_pg as $fks) :
            ?>
                <tr>
                    <td> <?php echo $no++ ?></td>
                    <td> <?php echo $fks['fakultas_name'] ?></td>
                    <!-- <td>
                        <div>
                            <?php echo anchor('dosen/delete/' . $dsn['dsn_id'], '<i data-feather="trash"></i>', array('class' => 'btn btn-danger btn-xs btn-delete', 'data-id' => $dsn['dsn_id'])); ?>
                        </div>
                    </td>
                    <td>
                        <div>

                            <button class="btn btn-warning btn-xs btn-edit" data-id="<?php echo $dsn['dsn_id'] ?>"><i data-feather="edit"></i></button>
                        </div>
                    </td> -->
                </tr>
            <?php endforeach; ?>

        </table>

    </div>
</div>