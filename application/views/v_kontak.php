<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <title>Data-Kontak</title>
</head>


<body>
    <div class="container">
        <?php echo $this->session->flashdata('msg'); ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahData">
            Tambah Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kontak</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="<?= base_url(); ?>/Contact/tambahdata" onSubmit="validasi()">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NO. Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Edit -->
        <?php
        foreach ($kontak->result_array() as $data) :
            $nama = $data['nama'];
            $no_telp = $data['no_telp'];
            $email = $data['email'];
            $tgl_lahir = $data['tgl_lahir'];
            $id = $data['id'];
            $foto = $data['profil'];
        ?>
            <div class="modal fade" id="EditData<?= $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kontak</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NO. Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No. Hanphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($kontak->result_array() as $data) :
                    $no++;
                    $id = $data['id'];
                    $nama = $data['nama'];
                    $no_telp = $data['no_telp'];
                    $email = $data['email'];
                    $tgl_lahir = $data['tgl_lahir'];
                    $id = $data['id'];
                    $foto = $data['profil'];
                    $status = $data['status'];
                ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $nama ?></td>
                        <td><?= $no_telp ?></td>
                        <td><?= $email ?></td>
                        <td><?= $foto ?></td>
                        <td><?= $tgl_lahir ?></td>
                        <td><?= $status ?></td>
                        <td>
                            <a href="#EditData<?= $id ?>" class="btn-primary" data-toggle="modal" data-original-title="Edit Task">Edit</a>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function validasi() {
            var nama = document.getElementById("nama").value;
            var email = document.getElementById("email").value;
            if (nama != "" && email != "") {
                return true;
            } else {
                alert('Anda harus mengisi data dengan lengkap !');
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>