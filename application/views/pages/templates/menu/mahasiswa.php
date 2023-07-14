<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Data Mahasiswa</h4>
        <!-- <?php echo print_r($mahasiswa, true);?> -->
    </div>
</div>

<div class="card">
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <I data-feather="plus"></I>Tambah Data Mahasiswa
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
                                <label for="">Nama Mahasiswa :</label>
                                <input type="text" id="mhsName" name="nama" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">NIM :</label>
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
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Tanggal Lahir</th>
                <th>Fakultas</th>
                <th colspan="1">Aksi</th>
            </tr>

            <?php
            $no = 1;
            foreach ($mahasiswa as $mhs) :
            ?>

                <tr>
                    <td> <?php echo $no++ ?> </td>
                    <td> <?php echo $mhs['nama'] ?></td>
                    <td> <?php echo $mhs['nim'] ?></td>
                    <td> <?php echo $mhs['tgl_lahir'] ?></td>
                    <td> <?php echo $mhs['fakultas_name'] ? $mhs['fakultas_name'] : "---" ?></td>
                    <td onclick="javascript: return confirm ('Anda yakin hapus data?')">
                        <div>
                        <?php echo anchor('mahasiswa/delete/' . $mhs['id'], '<i data-feather="trash"></i>', array('class' => 'btn btn-danger btn-xs btn-delete')); ?>
                        </div>
                    </td>
                    <td>
                        <div>
                        <?php echo anchor('mahasiswa/edit/' . $mhs['id'], '<i data-feather="edit"></i>', array('class' => 'btn btn-warning btn-xs btn-edit')); ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>