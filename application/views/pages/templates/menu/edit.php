<div class="content-wrapper">
    <selection class="content">
        <?php foreach ($mahasiswa as $mhs) { ?>
            <form action="<?php echo base_url('mahasiswa/update'); ?>" method="post">

                <div class="form-group mb-3">
                    <label for="">Nama Mahasiswa</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $mhs['id'] ?>">
                    <input type="text" name="nama" class="form-control" value="<?php echo $mhs['nama'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="">NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?php echo $mhs['nim'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="">NTanggal LahirIM</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $mhs['tgl_lahir'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="">Fakultas</label>

                    <select id="mhsFakultas" class="form-select" name="fakultas" value="<?php echo $mhs['fakultas'] ?>">
                        <option>Pilih Fakultas</option>
                        <option value="1">Teknik Informatika</option>
                        <option value="2">Sistem Informasi</option>
                        <option value="3">Manajemen Informasi</option>
                        <option value="4">Teknik Komputer</option>
                    </select>

                    <!-- <input type="text" name="fakultas" class="form-control"> -->
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button class="btn btn-primary btn-submit" type="submit" href="#">Submit</button>

            </form>
        <?php } ?>
    </selection>
</div>