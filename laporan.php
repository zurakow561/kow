<style>
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        overflow: auto;
    }

    /* Modal Content */
    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        padding: 20px;
        border-radius: 8px;
        max-width: 450px;
        width: 90%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        position: relative;
    }

    /* Close Button */
    .close {
        color: #555;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover {
        color: #000;
    }

    /* Form container styles */
    .form-container {
        display: flex;
        flex-direction: column;
        align-items: stretch;
    }

    /* Input styles */
    .form-container input[type=text],
    .form-container input[type=date],
    .form-container textarea,
    .form-container select {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    /* Button styles */
    .form-container button {
        color: white;
        padding: 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 8px 0;
        font-size: 16px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .form-container button:hover {
        transform: translateY(-2px);
    }

    /* Cancel button specific style */
    .form-container .cancelbtn {
        background-color: rgba(244, 67, 54, 0.8);
    }

    .form-container .cancelbtn:hover {
        background-color: rgba(244, 67, 54, 1);
    }

    /* Container for button alignment */
    .form-container .button-container {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    /* Responsive styles */
    @media screen and (max-width: 500px) {
        .modal-content {
            width: 95%;
        }

        .form-container .button-container {
            flex-direction: column;
            gap: 5px;
        }
    }
</style>

<body>
    <h1 class="mt-4">Laporan Peminjaman</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="cetak.php" class="btn btn-success">
                <i class="fa fa-print"></i> Cetak
            </a>
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.UserID = peminjaman.UserID LEFT JOIN buku ON buku.BukuID = peminjaman.BukuID");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo htmlspecialchars($data['NamaLengkap']); ?></td>
                            <td><?php echo htmlspecialchars($data['Judul']); ?></td>
                            <td><?php echo htmlspecialchars($data['TanggalPeminjaman']); ?></td>
                            <td><?php echo htmlspecialchars($data['TanggalPemgembalian']); ?></td>
                            <td><?php echo htmlspecialchars($data['StatusPeminjaman']); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
