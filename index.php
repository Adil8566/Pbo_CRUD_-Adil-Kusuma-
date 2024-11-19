<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<title>
ADIL KUSUMA</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">ADIL KUSUMA</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>TABEL BARANG</center></h4>
<?php

    require "koneksi.php";


    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_barang'])) {
        $id_barang=htmlspecialchars($_GET["id_barang"]);

        $sql="delete from tbl_barang where id_barang='$id_barang' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th><center>No</center></th>
            <th><center>Nama Barang</center></th>
            <th><center>Stok</center></th>
            <th><center>Harga Beli</center></th>
            <th><center>Harga Jual</center></th>
            <th> <colspan='2'> <center>Aksi</center></th>

        </tr>
        </thead>

        <?php
        require_once "koneksi.php";

        $sql="select * from tbl_barang order by id_barang desc";
        
        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
            <td><center><?php echo $no;?></center></td>
                <td><center><?php echo $data["nama_barang"]; ?></center></td>
                <td></center><?php echo $data["stok"];?></center></td>
                <td><center><?php echo $data["harga_beli"];?></center></td>
                <td><center><?php echo $data["harga_jual"];?></center></td>
                
                <td>
                <center>
                    <a href="update.php?id_barang=<?php echo htmlspecialchars($data['id_barang']); ?>" class="btn btn-warning" role="button"><i class= "nav-icon fas fa-edit"></i> Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-danger" role="button"><i class= "nav-icon fas fa-trash"></i> Delete</a>
                </center>
                </td>
                
            </tr>
            
            </tbody>
            <?php
        }
        ?>
    </table>  

    <a href="create.php" class="btn btn-primary" role="button"><i class= "nav-icon fas fa-plus"></i> Tambah Data</a>
</div>
</body>
</html>
