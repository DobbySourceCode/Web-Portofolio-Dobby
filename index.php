<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-PHP-portofolio</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

    <!-- Navbar -->
    <header id="navbar">
        <div class="logo">
            <img src="asset/img/profil.jpg" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#hero">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero -->
    <section id="hero" class="hero">
        <div class="hero-content">
            <h1>Welcome to My Website</h1>
            <p>This is my story</p>
            <a href="#services" class="btn-hero">Explore More</a>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="services">
        <h2>MY PROJECT</h2>
        <p class="services-sub">Apa yang bisa kami tawarkan untuk Anda</p>

        <div class="slider">
            <?php
            include 'koneksi.php';
            $result = mysqli_query($koneksi, "SELECT * FROM project");

            $active = "active";
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
            <div class="slide ' . $active . '">
                <img src="' . $row['image'] . '" alt="' . $row['title'] . '">
                <div class="caption">
                    <h3>' . $row['title'] . '</h3>
                    <p>' . $row['description'] . '</p>
                </div>
            </div>';
                $active = ""; // supaya hanya slide pertama yang active
            }
            ?>
        </div>

        <!-- tombol navigasi -->
        <div class="navigation">
            <span class="prev">&#10094;</span>
            <span class="next">&#10095;</span>
        </div>

        <!-- background interaktif -->
        <div class="cursor-bg"></div>
    </section>



    <?php
    // include koneksi
    include "koneksi.php"; // pastikan file koneksi.php ada
    
    // Ambil data dari tabel about
    $query = "SELECT * FROM about"; // sesuaikan nama tabel
    $result = mysqli_query($koneksi, $query);

    // Inisialisasi array kosong
    $aboutData = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $aboutData[] = $row;
        }
    } else {
        echo "Query gagal: " . mysqli_error($koneksi);
    }
    ?>

    <!-- About -->
    <section id="about" class="about hidden">
        <h2 class="about-title">About Me</h2>

        <div class="about-container">
            <!-- Kiri: kotak about dan statistic -->
            <div class="about-boxes">
                <?php if (!empty($aboutData)): ?>
                    <?php foreach ($aboutData as $about): ?>
                        <div class="about-box">
                            <h3 class="about-heading"><?= $about['heading'] ?></h3>
                            <p class="about-description"><?= $about['description'] ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="no-data">Data About kosong.</p>
                <?php endif; ?>

                <div class="about-box performance-box">
                    <h3 class="about-heading">Statistic</h3>
                    <p class="about-description">KDA</p>
                    <canvas id="performanceChart" style="display:none;"></canvas>
                </div>
            </div>

            <!-- Kanan: lanyard -->
            <div class="lanyard">
                <?php if (!empty($aboutData)): ?>
                    <?php $profile = $aboutData[0]; ?>
                    <div class="card">
                        <div class="front">
                            <img src="<?= $profile['image'] ?>" alt="Foto Profil">
                        </div>
                        <div class="back">
                            <img src="asset/img/profil.jpg" alt="Foto Belakang">
                            <div class="profile-info">
                                <p class="profile-name"><?= $profile['name'] ?></p>
                                <p class="profile-role"><?= $profile['role'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <p>Profil tidak tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>







    <!-- Contact -->
    <section id="contact" class="contact">
        <h2>Contact</h2>
        <p class="contact-sub">Hubungi saya melalui sosial media atau kirim pesan melalui form berikut:</p>

        <div class="social-links">
            <a href="https://instagram.com/kyzraja" target="_blank" class="social instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://facebook.com/YudiSaputra" target="_blank" class="social facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://tiktok.com/@kyzrasicafer" target="_blank" class="social tiktok">
                <i class="fab fa-tiktok"></i>
            </a>
            <a href="https://github.com/DobbySourceCode" target="_blank" class="social github">
                <i class="fab fa-github"></i>
            </a>
        </div>

        <!-- Form Kontak -->
        <form action="proses_contact.php" method="POST" class="contact-form">
            <table>
                <tr>
                    <td><label for="name">Nama:</label></td>
                    <td><input type="text" id="name" name="name" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="message">Pesan:</label></td>
                    <td><textarea id="message" name="message" rows="5" required></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit">Kirim Pesan</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>


    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container" style="text-align: center;">
            <div class="footer-left">
                <p>© 2025 DobbySourceCode. All Rights Reserved.</p>
            </div>
        </div>
    </footer>


    <script src="asset/js/script.js"></script>
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php
    include 'koneksi.php';

    // Ambil data dari tabel stats
    $sql = "SELECT * FROM stats WHERE id=1";
    $result = mysqli_query($koneksi, $sql);

    $data = [];
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $data = [
            $row['kll'],
            $row['death'],
            $row['assist'],
            $row['win_rate'],
            $row['damage'],
            $row['mvp']
        ];
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Radar Chart Statistik</title>
        <script src="asset/js/chart.js"></script> <!-- Bisa ganti dengan CDN juga -->
    </head>

    <body>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const ctx = document.getElementById('performanceChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: ['Kll', 'Death', 'Assist', 'Win Rate', 'Damage', 'MVP'],
                        datasets: [{
                            label: 'Player Statistik',
                            data: <?php echo json_encode($data); ?>,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgba(255, 99, 132, 1)'
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            r: {
                                angleLines: { color: 'rgba(0,0,0,0.1)' },
                                grid: { color: 'rgba(0,0,0,0.1)' },
                                pointLabels: { color: '#2c3e50', font: { size: 14 } },
                                ticks: {
                                    beginAtZero: true, // mulai dari 0
                                    // hapus 'max' supaya otomatis menyesuaikan data
                                    color: '#2c3e50'
                                }
                            }
                        },
                        plugins: {
                            legend: { display: true, labels: { color: '#2c3e50' } }
                        }
                    }
                });
            });
        </script>


    </body>

    </html>




</body>

</html>