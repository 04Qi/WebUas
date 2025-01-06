<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Lampu LED</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        input, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        .detail-harga {
            background-color: #f8f9fa;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Pemesanan</h1>
    <h2>Lampu LED</h2>

    <form action="process_order.php" method="POST">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
        </div>

        <div class="form-group">
            <label for="nomorHp">Nomor Hp</label>
            <input type="tel" id="nomorHp" name="nomorHp" placeholder="Masukkan nomor hp" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
        </div>

        <div class="form-group">
            <label for="jumlah">lama Peminjaman</label>
            <input type="number" id="jumlah" name="jumlah" value="1" min="1" required>
        </div>

        <div class="form-group">
            <label for="hargaSatuan">Harga Satuan (Rp)</label>
            <input type="number" id="hargaSatuan" name="hargaSatuan" value="50000" readonly>
        </div>

        <div class="detail-harga">
            <h3>Detail Harga</h3>
            <p>Harga Satuan: Rp <span id="displayHargaSatuan">50.000</span></p>
            <p>Jumlah: <span id="displayJumlah">1</span></p>
            <p>Total: Rp <span id="displayTotal">50.000</span></p>
        </div>

        <button type="submit">Pesan</button>
    </form>

    <script>
        document.getElementById('orderForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('processorder.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Pesanan berhasil disimpan!');
                    this.reset();
                    updateTotal();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memproses pesanan');
            });
        });

        function updateTotal() {
            const jumlah = parseInt(document.getElementById('jumlah').value) || 0;
            const hargaSatuan = parseInt(document.getElementById('hargaSatuan').value) || 0;
            const total = jumlah * hargaSatuan;

            document.getElementById('displayHargaSatuan').textContent = hargaSatuan.toLocaleString('id-ID');
            document.getElementById('displayJumlah').textContent = jumlah;
            document.getElementById('displayTotal').textContent = total.toLocaleString('id-ID');
        }

        document.getElementById('jumlah').addEventListener('input', updateTotal);
        updateTotal();
    </script>
</body>
</html>