    <?php
    include('koneksi/connect.php');
    include("header.php");

    if (isset($_POST['tambah'])) {
        $tanggal = $_POST['TanggalPenjualan'];
        $nama = $_POST['NamaPelanggan'];
        $nomeja = $_POST['nomor_meja'];

        // Menyisipkan data ke dalam tabel penjualan
        $sql_penjualan = $conn->query("INSERT INTO penjualan (TanggalPenjualan) VALUES ('$tanggal')");
        $id_transaksi_baru = $conn->insert_id; // Menggunakan insert_id dari objek koneksi

        // Menyisipkan data ke dalam tabel pelanggan menggunakan nilai kunci dari tabel penjualan
        $sql_pelanggan = $conn->query("INSERT INTO pelanggan (PelangganID, NamaPelanggan, nomor_meja) VALUES ('$id_transaksi_baru', '$nama', '$nomeja')");
        $id_pelanggan_baru = $conn->insert_id; // Menggunakan insert_id dari objek koneksi

        $menu_jumlah = $_POST['menu'];
        $jumlah_array = $_POST['jumlah'];

        foreach ($menu_jumlah as $i => $item) {
            $item_parts = explode("|", $item);
            $produk_id = $item_parts[0];
            $harga = $item_parts[1];
            $jumlah = $jumlah_array[$i];

            // Menyisipkan data ke dalam tabel detailpenjualan dengan nilai kunci primer yang unik
            $sql3 = $conn->query("INSERT INTO detailpenjualan (DetailID, ProdukID, JumlahProduk, Subtotal) VALUES ('$id_pelanggan_baru', '$produk_id', '$jumlah', '$harga')");
            // Periksa apakah query berhasil dijalankan
            if (!$sql3) {
                // Jika query gagal, tampilkan pesan error dan hentikan eksekusi
                die("Error: " . $conn->error);
            }

            $sql4 = $conn->query("UPDATE produk SET Stok = Stok - $jumlah  WHERE ProdukID = '$produk_id'");
            $sql5 = $conn->query("UPDATE produk SET Terjual = Terjual + $jumlah WHERE ProdukID = '$produk_id'");


            header("Location: daftar-transaksi.php");
            exit();
        }
    }
    ?>


    <script>
        // Fungsi untuk menambahkan input field untuk menu
        function tambahMenu() {
            var container = document.getElementById("menuContainer");
            var newMenuInput = document.createElement("div");

            newMenuInput.innerHTML = `
            <div class="">
                <label for="menu" class="form-label">Menu</label>
                <select id="menu" name="menu[]" class="form-control">
                    <option>Pilih Menu</option>
                    <?php
                    $sql6 = $conn->query("SELECT * FROM produk");
                    while ($data = $sql6->fetch_assoc()) {
                        echo "<option value='" . $data['ProdukID'] . "|" . $data['Harga'] . "'>" . $data['NamaProduk'] . " - Rp." . number_format($data['Harga']) . " - Stok:" . $data['Stok'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" min="1" class="form-control" id="jumlah" name="jumlah[]">
            </div>
        `;

            container.appendChild(newMenuInput);
        }
    </script>

    <nav class="navbar navbar-expand-lg navbar-primary bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="pilih-menu.php">Pelanggan</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="pilih-menu.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="p-4" id="main-content">
        <div class="card mt-5">
            <div class="card-body">
                <div class="container mt-5">
                    <h2>Tambah Transaksi</h2>
                    <form action="" method="POST">
                        <div class="col-2">
                            <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                            <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="TanggalPenjualan" name="TanggalPenjualan" readonly required>
                        </div>
                        <div>
                            <label for="nama" class="form-label">Nama Anda</label>
                            <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan" required>
                        </div>
                        <div>
                            <label for="nomeja" class="form-label">No Meja</label>
                            <input type="number" min="1" class="form-control" id="nomor_meja" name="nomor_meja" required>
                        </div>
                        <div id="menuContainer">
                            <div>
                                <label for="menu" class="form-label">Menu</label>
                                <select id="menu" name="menu[]" class="form-control" onchange="selection()">
                                    <option>Pilih Menu</option>
                                    <?php
                                    $sql7 = $conn->query("SELECT * FROM produk WHERE Stok > 0");
                                    while ($data = $sql7->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $data['ProdukID'] . '|' . $data['Harga']; ?>"><?php echo $data['NamaProduk'] . " - Rp." . number_format($data['Harga']) . " - Stok:" . $data['Stok']; ?></option>

                                    <?php } ?>

                                </select>

                                <input type="hidden" id="select" name="select" value="">
                                <!-- <select id="menu" name="menu[]" class="form-control">
                                    <option>Pilih Menu</option>
                                    <?php
                                    $sql7 = $conn->query("SELECT * FROM produk WHERE Stok > 0");
                                    while ($data = $sql7->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $data['ProdukID'] . '|' . $data['Harga']; ?>"><?php echo $data['NamaProduk'] . " - Rp." . number_format($data['Harga']) . " - Stok:" . $data['Stok']; ?></option>

                                    <?php } ?>

                                </select> -->
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" min="1" class="form-control" id="jumlah" name="jumlah[]" required>
                            </div>

                        </div>

                        <button type="button" class="btn btn-warning me-3" onclick="tambahMenu()">Tambah Menu+</button>

                        <button type="submit" name="tambah" class="btn btn-primary">Tambah Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selection() {
            let selected = document.getElementById('menu');
            let array = [];

            for (let i = 0; i < selected.options.length; i++) {
                if (selected.options[i].selected) {
                    array.push(selected.options[i].value);
                }

                document.getElementById('select').value = JSON.stringify(array)

            }
        }
    </script>