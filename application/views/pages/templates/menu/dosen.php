<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Data Dosen</h4>
    </div>
</div>

<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <I data-feather="plus"></I>Tambah Data Dosen
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('mahasiswa/tambahaksi'); ?>">
                        <div class="form-group mb-3">
                            <label for="">Nama Dosen :</label>
                            <input type="text" id="mhsName" name="nama" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">NIM Dosen:</label>
                            <input type="text" id="mhsNIM" name="nim" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Tanggal Lahir :</label>
                            <input type="date" id="mhsDate" name="tgl_lahir" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Fakultas :</label>
                            <select id="mhsFakultas" class="form-select" name="fakultas">
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
        </tr>

        <?php
        $no = 1;
        foreach ($dosen as $dsn) :
        ?>
            <tr>
                <td> <?php echo $no++ ?></td>
                <td> <?php echo $dsn->nama ?></td>
                <td> <?php echo $dsn->nim_dsn ?></td>
                <td> <?php echo $dsn->tgl_lahir ?></td>
                <td> <?php echo $dsn->fakultas ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>