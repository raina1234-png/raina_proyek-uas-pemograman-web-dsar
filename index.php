<?php
include "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$search = "";
if (isset($_GET['query'])) {
    $search = mysqli_real_escape_string($conn, $_GET['query']);
    $sql = "SELECT * FROM produk WHERE nama LIKE '%$search%' OR deskripsi LIKE '%$search%' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM produk ORDER BY id DESC";
}
$result = mysqli_query($conn, $sql);

if (isset($_POST['action']) && $_POST['action'] == 'save_ttd') {
    $id = intval($_POST['id']);
    $img_base64 = $_POST['image'];
    mysqli_query($conn, "UPDATE produk SET tanda_tangan='$img_base64' WHERE id=$id");
    echo "Sukses";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GlowFlora Hub - Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #fff6f7; font-family: sans-serif; color: #3d3435; }
        .navbar { background: white; box-shadow: 0 4px 12px rgba(255, 182, 193, 0.2); }
        .text-pink { color: #ff8da1 !important; }
        .btn-pink { background-color: #ffb6c1; color: white; border: none; }
        .btn-pink:hover { background-color: #ff8da1; color: white; }
        .card { border: none; border-radius: 16px; box-shadow: 0 8px 24px rgba(255, 182, 193, 0.15); }
        .table-thead-pink { background-color: #ffeef1 !important; }
        #canvas-ttd { border: 2px dashed #ffb6c1; border-radius: 12px; background: #fffcfc; cursor: crosshair; }
        .badge-ready { background-color: #d1e7dd; color: #0f5132; }
        .badge-kritis { background-color: #fff3cd; color: #664d03; }
        .badge-habis { background-color: #f8d7da; color: #842029; }
    </style>
</nav>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold text-pink" href="index.php"><i class="fa-solid fa-sparkles"></i> GlowFlora Hub</a>
        <div class="ms-auto d-flex align-items-center">
            <span class="small me-3"><i class="fa-solid fa-user-check text-success"></i> Welcome, Rara</span>
            <a href="logout.php" class="btn btn-sm btn-outline-danger py-0 px-2"><i class="fa-solid fa-power-off"></i> Keluar</a>
        </div>
    </div>
</nav>

<div class="container mb-5">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card p-4 mb-4 bg-white">
                <h5 class="fw-bold mb-3 text-pink"><i class="fa-solid fa-folder-plus"></i> Tambah Data Skincare</h5>
                <form action="tambah.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label class="small fw-medium">Nama Varian Produk</label>
                        <input type="text" name="nama" class="form-control form-control-sm" required placeholder="Contoh: Serum Glow">
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label class="small fw-medium">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control form-control-sm" required placeholder="120000">
                        </div>
                        <div class="col">
                            <label class="small fw-medium">Stok</label>
                            <input type="number" name="stok" class="form-control form-control-sm" required placeholder="10">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="small fw-medium">Deskripsi Formula</label>
                        <textarea name="deskripsi" class="form-control form-control-sm" rows="2" placeholder="Detail kandungan..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="small fw-medium">Upload Foto (Multiple)</label>
                        <input type="file" name="gambar[]" class="form-control form-control-sm" multiple required>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-pink btn-sm w-100 py-2 shadow-sm">Simpan Produk</button>
                </form>
            </div>

            <div class="card p-3 bg-white">
                <h6 class="fw-bold mb-2 small text-muted"><i class="fa-solid fa-clapperboard"></i> Video Profil Rangkaian Toko</h6>
                <div class="ratio ratio-16x9">
                    <video controls style="border-radius: 10px; object-fit: cover;">
                        <source src="Dior Skin Essentials.mp4" type="video/mp4">
                        Browser tidak mendukung HTML5 Video.
                    </video>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card p-4 bg-white">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
                    <h5 class="fw-bold m-0"><i class="fa-solid fa-boxes-stacked text-pink"></i> Datatable Stok Produk</h5>
                    <a href="export.php" class="btn btn-sm btn-success px-3"><i class="fa-solid fa-file-csv"></i> Export ke CSV</a>
                </div>

                <form method="GET" action="index.php" class="mb-3">
                    <div class="input-group" style="max-width: 350px;">
                        <input type="text" name="query" class="form-control form-control-sm" placeholder="Cari nama produk..." value="<?= htmlspecialchars($search) ?>">
                        <button type="submit" class="btn btn-sm btn-secondary">Cari</button>
                        <?php if($search != ""): ?><a href="index.php" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-rotate-left"></i></a><?php endif; ?>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover align-middle small">
                        <thead>
                            <tr class="table-thead-pink">
                                <th>Foto</th>
                                <th>Nama Varian</th>
                                <th>Harga Jual</th>
                                <th>Status Stok</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)): 
                                $files = explode(',', $row['gambar']);
                                $fotoUtama = !empty($files[0]) ? $files[0] : 'default.jpg';

                                if($row['stok'] == 0) {
                                    $badge = '<span class="badge badge-habis">Habis Total</span>';
                                } elseif($row['stok'] <= 5) {
                                    $badge = '<span class="badge badge-kritis">Stok Kritis ('.$row['stok'].')</span>';
                                } else {
                                    $badge = '<span class="badge badge-ready">Ready ('.$row['stok'].')</span>';
                                }
                            ?>
                            <tr>
                                <td><img src="img/<?= $fotoUtama ?>" class="img-thumbnail" width="60"></td>
                                <td class="fw-medium"><?= htmlspecialchars($row['nama']) ?></td>
                                <td class="fw-bold text-secondary">Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                                <td><?= $badge; ?></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" onclick="bukaModalDetail('<?= $row['id'] ?>', '<?= htmlspecialchars($row['nama']) ?>', 'Rp <?= number_format($row['harga'], 0, ',', '.') ?>', '<?= $row['stok'] ?> Unit', '<?= htmlspecialchars($row['deskripsi']) ?>', '<?= count($files) ?> Berkas Foto')"><i class="fa-solid fa-eye"></i></button>
                                        <button class="btn btn-outline-info" onclick="bukaModalTTD(<?= $row['id'] ?>)"><i class="fa-solid fa-signature"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:16px;">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold"><span id="md-title-nama"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-borderless small">
                    <tr><td width="40%"><strong>ID Register:</strong></td><td>FV-2026-<span id="md-id"></span></td></tr>
                    <tr><td><strong>Nama Varian:</strong></td><td id="md-nama"></td></tr>
                    <tr><td><strong>Harga Jual:</strong></td><td id="md-harga"></td></tr>
                    <tr><td><strong>Kuantitas:</strong></td><td id="md-stok"></td></tr>
                    <tr><td><strong>Deskripsi:</strong></td><td id="md-deskripsi" class="text-muted"></td></tr>
                    <tr><td><strong>Total Foto:</strong></td><td id="md-total-foto" class="text-pink"></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTTD" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:16px;">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold">TTD Digital</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <canvas id="canvas-ttd" width="400" height="180"></canvas>
                <div class="mt-2 text-end me-4">
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="clearCanvas()">Hapus</button>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="current-id-produk">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-sm btn-pink" onclick="saveCanvas()">Simpan TTD</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function bukaModalDetail(id, nama, harga, stok, deskripsi, totalFoto) {
        document.getElementById('md-title-nama').innerText = nama;
        document.getElementById('md-id').innerText = id;
        document.getElementById('md-nama').innerText = nama;
        document.getElementById('md-harga').innerText = harga;
        document.getElementById('md-stok').innerText = stok;
        document.getElementById('md-deskripsi').innerText = deskripsi;
        document.getElementById('md-total-foto').innerText = totalFoto;
        new bootstrap.Modal(document.getElementById('modalDetail')).show();
    }

    const canvas = document.getElementById('canvas-ttd');
    const ctx = canvas.getContext('2d');
    let drawing = false;
    ctx.strokeStyle = "#3d3435";
    ctx.lineWidth = 2.5;

    canvas.addEventListener('mousedown', (e) => { drawing = true; ctx.beginPath(); ctx.moveTo(e.offsetX, e.offsetY); });
    canvas.addEventListener('mousemove', (e) => { if(drawing) { ctx.lineTo(e.offsetX, e.offsetY); ctx.stroke(); } });
    canvas.addEventListener('mouseup', () => drawing = false);

    function bukaModalTTD(id) {
        document.getElementById('current-id-produk').value = id;
        clearCanvas();
        new bootstrap.Modal(document.getElementById('modalTTD')).show();
    }
    function clearCanvas() { ctx.clearRect(0, 0, canvas.width, canvas.height); }

    function saveCanvas() {
        const id = document.getElementById('current-id-produk').value;
        const dataURL = canvas.toDataURL();
        
        const formData = new FormData();
        formData.append('action', 'save_ttd');
        formData.append('id', id);
        formData.append('image', dataURL);

        fetch('index.php', { method: 'POST', body: formData })
        .then(res => res.text())
        .then(data => {
            alert("Tanda Tangan berhasil disimpan!");
            window.location.reload();
        });
    }
</script>
</body>
</html>