<?php
include 'konesi.php'; // Perbaiki nama file jika ada kesalahan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari input POST
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomorHp'];
    $email = $_POST['email'];
    $jumlah = (int) $_POST['jumlah'];
    $harga_satuan = (float) $_POST['hargaSatuan'];
    $total_harga = $jumlah * $harga_satuan;

    // Query dengan placeholder
    $sql = "INSERT INTO pemesanan (nama, nomor_hp, email, jumlah, harga_satuan, total_harga) VALUES (?, ?, ?, ?, ?, ?)";

    // Siapkan statement
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        // Bind parameter ke statement
        mysqli_stmt_bind_param($stmt, "sssidd", $nama, $nomor_hp, $email, $jumlah, $harga_satuan, $total_harga);

        // Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            $response = array(
                'status' => 'success',
                'message' => 'Pesanan berhasil disimpan'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error: ' . mysqli_stmt_error($stmt)
            );
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error: Gagal menyiapkan statement'
        );
    }

    // Kirimkan response sebagai JSON
    echo json_encode($response);
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
