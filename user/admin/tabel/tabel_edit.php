<!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Daftar Peserta</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr class="text-center";>
                      <th>No</th>
                      <th>Foto</th>
                      <th>NPM</th>
                      <th>nama</th>
                      <th>Tlp</th>
                      <th>jurusan</th>
                      <th>kelas</th>
                      <th>persyaratan</th>
                      <th>aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php  $i = 1; ?>
                      <?php foreach($mahasiswa as $mhs) : ?>
                      <tr class="text-center";>
                        <td><?php echo $i; ?></td>
                        <td><img src="img/<?php echo $mhs["gambar"] ?>" width="50"></td>
                        <td><?php echo $mhs["npm"] ?></td>
                        <td><?php echo $mhs["nama"] ?></td>
                        <td><?php echo $mhs["no_tlp"] ?></td>
                        <td><?php echo $mhs["jurusan"] ?></td>
                        <td><?php echo $mhs["kelas"] ?></td>
                        <td><?php echo $mhs["persyaratan"] ?></td>
                        <td>
                        <a href="update/update.php?id=<?= $mhs["id"]; ?>">
                           <button class="btn btn-primary">Update</button>
                       </a>
                        <a href="delete/delete.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Yakin?');">
                           <button class="btn btn-danger">Delete</button>
                       </a>
                       </td>
                         <?php $i++ ?>
                     </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
            