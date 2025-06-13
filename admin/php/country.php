<?php
function koneksi()
{
    $conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_243040033');
    return $conn;
}

function select($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Ambil data pendaftaran akun
$data_pendaftaran = select("SELECT * FROM checkoutcountry ORDER BY id DESC");
$total_pendaftaran = count($data_pendaftaran);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - Data Pendaftaran Akun</title>
    <link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css" rel="stylesheet">
    <style>
        body {
            background: #f8fafc;
        }
        .sidebar {
            background: linear-gradient(180deg, #0d6efd 80%, #2563eb 100%);
            min-height: 100vh;
            box-shadow: 2px 0 16px rgba(0,0,0,0.07);
            position: fixed;
            left: 0;
            top: 0;
            width: 220px;
            z-index: 1040;
            transition: transform 0.3s ease;
        }
        .sidebar .navbar-brand {
            font-size: 1.3rem;
            letter-spacing: 1px;
        }
        .sidebar .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: block;
            border: 3px solid #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .nav-link.active, .nav-link:hover {
            background: rgba(255,255,255,0.15);
            font-weight: bold;
        }
        .card-summary {
            border: none;
            border-radius: 1rem;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        }
        .card-summary:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        }
        .btn-custom {
            border-radius: 0.5rem;
        }
        .table-custom th, .table-custom td {
            vertical-align: middle;
        }
        .table-custom tbody tr:nth-child(even) {
            background: #f6f8fa;
        }
        .table-custom tbody tr:hover {
            background: #e9ecef;
        }
        .aksi-btns .btn {
            margin-right: 4px;
        }
        .footer {
            background: #0d6efd;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
            margin-top: 3rem;
            border-radius: 0 0 1rem 1rem;
        }
        /* Responsive sidebar */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .sidebar-backdrop {
                display: none;
                position: fixed;
                top: 0; left: 0; right: 0; bottom: 0;
                background: rgba(0,0,0,0.3);
                z-index: 1039;
            }
            .sidebar-backdrop.show {
                display: block;
            }
            main {
                margin-left: 0 !important;
            }
            .sidebar-toggle-btn {
                display: inline-block !important;
            }
        }
        @media (min-width: 992px) {
            .sidebar-toggle-btn {
                display: none !important;
            }
            .sidebar {
                transform: translateX(0) !important;
            }
            .sidebar-backdrop {
                display: none !important;
            }
            main {
                margin-left: 220px !important;
            }
        }
        .sidebar-toggle-btn {
            position: fixed;
            top: 18px;
            left: 18px;
            z-index: 1050;
            background: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: background 0.2s;
        }
        .sidebar-toggle-btn:hover {
            background: #2563eb;
        }
    </style>
</head>
<body>
<!-- Sidebar Toggle Button (Mobile) -->
<button class="sidebar-toggle-btn d-lg-none" id="sidebarToggle" aria-label="Toggle sidebar">
    <i class="bi bi-list"></i>
</button>
<div class="sidebar-backdrop" id="sidebarBackdrop"></div>
<!-- Sidebar -->
<div class="sidebar shadow" id="sidebarNav">
    <div class="sidebar-sticky pt-4 text-center">
        <a class="navbar-brand text-white fw-bold px-3 mb-4 d-block" href="#"><i class="bi bi-speedometer2 me-2"></i>Auto<span>Style</span></a>
        <ul class="nav flex-column text-start px-3">
            <!--<li class="nav-item mb-2">
                <a class="nav-link text-white active" href="#">
                    <i class="bi bi-house-door me-2"></i>Dashboard
                </a>
            </li>-->
             <li class="nav-item mb-2">
                <a class="nav-link text-white" href="index.php">
                    <i class="bi bi-person-plus me-2"></i>Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="orders.php">
                    <i class="bi bi-person-plus me-2"></i>Orders
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="cars.php">
                    <i class="bi bi-person-plus me-2"></i>Cars
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="vehicles.php">
                    <i class="bi bi-person-plus me-2"></i>Popular Vihecles
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="subscribe.php">
                    <i class="bi bi-person-plus me-2"></i>Subscribe
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="contact.php">
                    <i class="bi bi-person-plus me-2"></i>Contact
                </a>
            </li>
             <li class="nav-item mb-2">
                <a class="nav-link text-white" href="login.php">
                    <i class="bi bi-person-plus me-2"></i>User
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="country.php">
                    <i class="bi bi-person-plus me-2"></i>Country
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="../../public/php/index.php">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </a>
            </li>

        </ul>
    </div>
</div>

<main class="px-lg-4" style="min-height:100vh;">
    <div class="container mt-4 mb-5">
        <div class="card shadow-lg">
            <div class="header text-white d-flex justify-content-between align-items-center bg-primary p-3 rounded-top">
                <h4 class="mb-0"><i class="bi bi-table me-2"></i>Subscribers</h4>
                <a href="tambah/country.php" class="btn btn-light btn-custom shadow-sm"><i class="bi bi-plus-circle me-1"></i>add data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table table-striped table-hover table-custom mb-0 align-middle"  id="example">
                        <thead class="table-light">
                            <tr>
                                <th>no</th>
                                <th>email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($total_pendaftaran > 0): ?>
                                <?php $no = 1; ?>
                                <?php foreach ($data_pendaftaran as $akun): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= ($akun['country']); ?></td>
                    
                                        <td class="aksi-btns">

                                            <a href="ubah/ubahcountry.php?id=<?= $akun['id']; ?>" class="btn btn-success btn-sm btn-custom" title="Ubah Data">
                                                <i class="bi bi-pencil-square"></i>
                                           
                                            <a href="hapus/hapuscountry.php?id=<?= $akun['id']; ?>" class="btn btn-danger btn-sm btn-custom" onclick="return confirm('Delete this contact?');" title="Hapus Data">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="10" class="text-center text-muted">Belum ada data pendaftaran akun.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable()
        });
</script>
<script>
    // Sidebar toggle for mobile
    const sidebar = document.getElementById('sidebarNav');
    const toggleBtn = document.getElementById('sidebarToggle');
    const backdrop = document.getElementById('sidebarBackdrop');
    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('show');
        backdrop.classList.toggle('show');
    });
    backdrop.addEventListener('click', function() {
        sidebar.classList.remove('show');
        backdrop.classList.remove('show');
    });
</script>
</body>
</html>
