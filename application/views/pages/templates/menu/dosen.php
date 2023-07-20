<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Data Dosen</h4>
        <!-- <?php echo print_r($dosen, true);?> -->
    </div>
</div>

<div class="card">
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-add">
            <I data-feather="plus"></I>Tambah Data Dosen
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('dosen/tambahaksi'); ?>">
                            <div class="form-group mb-3">
                                <label for="">Nama Dosen :</label>
                                <input type="text" id="dsnName" name="nama" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">NIM Dosen:</label>
                                <input type="text" id="dsnNIM" name="nim" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Tanggal Lahir :</label>
                                <input type="date" id="dsnDate" name="tgl_lahir" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Fakultas :</label>
                                <select id="dsnFakultas" class="form-select" name="dsn_fakultas">
                                    <option>Pilih Fakultas</option>
                                    <option value="1">Teknik Informatika</option>
                                    <option value="2">Sistem Informasi</option>
                                    <option value="3">Manajemen Informasi</option>
                                    <option value="4">Teknik Komputer</option>
                                </select>
                            </div>
                            <button type="reset" id="btnReset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                            <button type="submit" id="btnSave" class="btn btn-primary btn-save">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama Dosen</th>
                <th>NIM Dosen</th>
                <th>Tanggal Lahir</th>
                <th>Fakultas</th>
                <th colspan="1">Aksi</th>
            </tr>

            <?php
            $no = 1;
            foreach ($dosen as $dsn) :
            ?>
                <tr>
                    <td> <?php echo $no++ ?></td>
                    <td> <?php echo $dsn['dsn_nama'] ?></td>
                    <td> <?php echo $dsn['dsn_nim'] ?></td>
                    <td> <?php echo $dsn['dsn_tgl_lahir'] ?></td>
                    <td> <?php echo $dsn['dsn_fakultas'] ? $dsn['dsn_fakultas'] : "---" ?></td>
                    <td>
                        <div>
                            <?php echo anchor('dosen/delete/' . $dsn['dsn_id'], '<i data-feather="trash"></i>', array('class' => 'btn btn-danger btn-xs btn-delete', 'data-id' => $dsn['dsn_id'])); ?>
                        </div>
                    </td>
                    <td>
                        <div>

                            <button class="btn btn-warning btn-xs btn-edit" data-id="<?php echo $dsn['dsn_id'] ?>"><i data-feather="edit"></i></button>
                            <!-- <a class="btn btn-warning btn-xs btn-edit"><i data-feather="edit"></i></a> -->
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0"> Data Table Dosen</h4>

    </div>
</div>
<div class="card">
    <div class="card-body">

        <table id="dosen" class="display" style="width:100%">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Tanggal Lahir</th>
                <th>Fakultas</th>
                <th>Aksi</th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>