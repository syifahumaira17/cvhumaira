<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= esc($biodata['nama_lengkap'] ?? 'Curriculum Vitae') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2f7b80;
            --primary-dark: #1d5155;
            --bg-main: #e2f0f0;
            --card-bg: #ffffff;
            --muted: #6d7b7c;
            --pill: #d4e5e6;
            --shadow-soft: 0 20px 40px rgba(0,0,0,0.06);
            --radius-xl: 24px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-main);
            color: #111827;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ========== HEADER + NAVBAR ========== */

        .header {
            background: var(--bg-main);
            padding: 16px 6vw 48px;
        }

        .nav-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            font-size: 20px;
        }

        .logo-mark {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 3px solid var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .nav-links {
            display: flex;
            gap: 28px;
            font-size: 14px;
        }

        .nav-links a {
            color: #111827;
            opacity: 0.8;
            position: relative;
            padding-bottom: 2px;
        }

        .nav-links a.active,
        .nav-links a:hover {
            opacity: 1;
            font-weight: 600;
        }

        .nav-links a.active::after,
        .nav-links a:hover::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 2px;
            border-radius: 999px;
            background: var(--primary-dark);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .search-input {
            background: rgba(255,255,255,0.4);
            border-radius: 999px;
            padding: 6px 14px;
            font-size: 13px;
            border: 1px solid rgba(148,163,184,0.4);
            min-width: 160px;
        }

        .search-input::placeholder {
            color: #6b7280;
        }

        .user-greeting {
            font-size: 13px;
            opacity: .8;
        }

        .hero {
            text-align: center;
            padding-bottom: 12px;
        }

        .hero-title {
            font-size: clamp(32px, 4vw, 44px);
            font-weight: 700;
            margin-bottom: 10px;
        }

        .hero-subtitle {
            max-width: 560px;
            margin: 0 auto;
            font-size: 13px;
            color: var(--muted);
            line-height: 1.6;
        }

        /* ========== MAIN WRAPPER ========== */

        .page-wrapper {
            background: var(--card-bg);
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
            box-shadow: var(--shadow-soft);
            margin: 0 3vw 40px;
            padding: 40px 4vw 48px;
        }

        .brand-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 32px;
            flex-wrap: wrap;
            font-size: 12px;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: .12em;
        }

        .brand-row span {
            padding: 8px 0;
        }

        .cv-section {
            margin-bottom: 56px;
        }

        /* animasi fade-in section */
        .js-animate .cv-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity .6s ease, transform .6s ease;
        }

        .js-animate .cv-section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .cv-section-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .cv-section-subtitle {
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 22px;
        }

        /* ========== HOME / BIODATA ========== */

        .main-grid {
            display: grid;
            grid-template-columns: minmax(0, 3fr) minmax(260px, 2fr);
            gap: 24px;
            margin-bottom: 32px;
        }

        .biodata-card {
            background: #f1f7f7;
            border-radius: var(--radius-xl);
            padding: 24px 24px 20px;
        }

        .biodata-row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 14px;
        }

        .biodata-field {
            background: var(--pill);
            border-radius: 999px;
            padding: 10px 16px;
            font-size: 13px;
            display: flex;
            flex-wrap: wrap;
            gap: 4px 10px;
            align-items: baseline;
        }

        .biodata-field.full {
            border-radius: 18px;
        }

        .field-label {
            font-weight: 500;
            opacity: 0.8;
        }

        .field-value {
            font-weight: 400;
            opacity: 0.9;
        }

        .biodata-message {
            min-height: 96px;
            align-items: flex-start;
        }

        .download-btn {
            margin-top: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 24px;
            font-size: 13px;
            border-radius: 999px;
            border: none;
            background: var(--primary-dark);
            color: #fff;
            cursor: pointer;
        }

        .profile-card {
            background: linear-gradient(150deg, #024f51, #3a7f80);
            border-radius: 24px;
            padding: 20px 22px 22px;
            color: #e5f4f5;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .profile-header {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .profile-photo {
            width: 72px;
            height: 72px;
            border-radius: 24px;
            overflow: hidden;
            border: 2px solid rgba(255,255,255,0.5);
            flex-shrink: 0;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 18px;
            font-weight: 600;
        }

        .profile-role {
            font-size: 13px;
            opacity: .8;
        }

        .profile-summary {
            font-size: 12px;
            line-height: 1.6;
            opacity: .9;
        }

        .profile-list {
            list-style: none;
            font-size: 12px;
            display: grid;
            gap: 6px;
            padding-left: 0;
        }

        .profile-list li::before {
            content: "• ";
            margin-right: 4px;
        }

        .profile-pill {
            margin-top: 4px;
            background: rgba(15,118,110,0.2);
            border-radius: 999px;
            border: 1px solid rgba(209,250,229,0.3);
            padding: 7px 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 11px;
        }

        .profile-pill span:last-child {
            font-weight: 500;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0,1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .info-card {
            border-radius: 18px;
            padding: 18px 18px 16px;
            background: #eef6f6;
        }

        .info-card:nth-child(2) {
            background: #f3f8f8;
        }

        .info-card:nth-child(3) {
            background: #ffffff;
            border: 1px solid #e5e7eb;
        }

        .info-title {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .info-sub {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.5;
        }

        /* ========== RINGKASAN TIMELINE DI HOME ========== */

        .bottom-section {
            border-radius: 18px;
            overflow: hidden;
            background: #e5f2f2;
            border: 1px solid #d1e0e0;
        }

        .timeline-header {
            padding: 12px 18px;
            font-size: 13px;
            font-weight: 600;
            background: #d2e5e5;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .timeline-body {
            padding: 12px 18px 16px;
            max-height: 220px;
            overflow-y: auto;
            font-size: 12px;
        }

        .timeline-item {
            margin-bottom: 10px;
        }

        .timeline-item-title {
            font-weight: 600;
        }

        .timeline-item-meta {
            font-size: 11px;
            color: var(--muted);
        }

        .timeline-item-desc {
            margin-top: 3px;
            line-height: 1.5;
        }

        /* ========== SECTION PENDIDIKAN / PENGALAMAN / KEAHLIAN / PORTOFOLIO ========== */

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .edu-card,
        .exp-card {
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            padding: 14px 16px;
            background: #f8fbfb;
        }

        .edu-title,
        .exp-title {
            font-size: 14px;
            font-weight: 600;
        }

        .edu-meta,
        .exp-meta {
            font-size: 12px;
            color: var(--muted);
            margin: 2px 0 6px;
        }

        .edu-desc,
        .exp-desc {
            font-size: 12px;
            color: #4b5563;
            line-height: 1.5;
        }

        .skill-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .skill-pill {
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            background: #eef6f7;
            border: 1px solid #d1e5e6;
        }

        .skill-category {
            margin-bottom: 16px;
        }

        .skill-category-title {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .portfolio-card {
            background: #f3f8f8;
            border-radius: 18px;
            padding: 14px 14px 16px;
            border: 1px solid #e0e7e7;
        }

        .portfolio-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .portfolio-meta {
            font-size: 11px;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .portfolio-desc {
            font-size: 12px;
            color: #4b5563;
        }

        /* ========== MAP / LOKASI ========== */

        .map-wrapper {
            border-radius: 18px;
            overflow: hidden;
            box-shadow: var(--shadow-soft);
            border: 1px solid #e5e7eb;
        }

        .map-wrapper iframe {
            width: 100%;
            height: 320px;
            border: 0;
        }

        /* ========== FOOTER ========== */

        .footer {
            background: var(--primary-dark);
            color: #e5f4f4;
            padding: 28px 6vw 30px;
            font-size: 12px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: minmax(0,2fr) repeat(3, minmax(0,1fr));
            gap: 20px;
            margin-bottom: 16px;
        }

        .footer-title {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer li + li {
            margin-top: 4px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(148,163,184,0.5);
            padding-top: 10px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
            opacity: .8;
        }

        /* ========== RESPONSIVE ========== */

        @media (max-width: 960px) {
            .main-grid {
                grid-template-columns: minmax(0,1fr);
            }
            .info-grid {
                grid-template-columns: minmax(0,1fr);
            }
            .cards-grid {
                grid-template-columns: minmax(0,1fr);
            }
            .portfolio-grid {
                grid-template-columns: repeat(2, minmax(0,1fr));
            }
            .page-wrapper {
                margin: 0 4vw 32px;
            }
        }

        @media (max-width: 720px) {
            .nav-links {
                display: none;
            }
            .search-input {
                display: none;
            }
            .header {
                padding-inline: 4vw;
            }
            .hero-title {
                font-size: 32px;
            }
            .brand-row {
                justify-content: center;
            }
            .footer-grid {
                grid-template-columns: minmax(0,1fr) minmax(0,1fr);
            }
        }

        @media (max-width: 480px) {
            .portfolio-grid {
                grid-template-columns: minmax(0,1fr);
            }
            .footer-grid {
                grid-template-columns: minmax(0,1fr);
            }
        }

        /* ==== Efek hover global ==== */
        .biodata-card,
        .profile-card,
        .info-card,
        .edu-card,
        .exp-card,
        .portfolio-card,
        .download-btn,
        .skill-pill {
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease, color 0.3s ease;
            cursor: pointer;
        }

        .biodata-card:hover,
        .profile-card:hover,
        .info-card:hover,
        .edu-card:hover,
        .exp-card:hover,
        .portfolio-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 12px 24px rgba(0,0,0,0.15);
        }

        .download-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            background: var(--primary);
            color: #fff;
        }

        .skill-pill:hover {
            transform: scale(1.05);
            background: rgba(15,118,110,0.3);
            border-color: rgba(15,118,110,0.5);
        }

        .nav-links a {
            transition: color 0.3s ease, opacity 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary-dark);
            opacity: 1;
        }

        .portfolio-card a,
        .info-card a,
        .timeline-item:hover {
            transition: color 0.3s ease, text-decoration 0.3s ease;
            text-decoration: underline;
        }

        .cv-section:hover {
            transform: translateY(-2px);
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body>

<!-- ========== HEADER ========== -->
<header class="header">
    <div class="nav-container">
        <div class="logo">
            <div class="logo-mark">CV</div>
            <span>SyifaH</span>
        </div>

        <!-- NAVBAR: scroll ke section di halaman yang sama -->
        <nav class="nav-links" id="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#pendidikan">Pendidikan</a>
            <a href="#pengalaman">Pengalaman</a>
            <a href="#keahlian">Keahlian</a>
            <a href="#portofolio">Portofolio</a>
            <a href="#lokasi">Lokasi</a>
        </nav>
    </div>

    <section class="hero">
        <h1 class="hero-title">Curriculum Vitae</h1>
        <p class="hero-subtitle">
            Profil lengkap <?= esc($biodata['nama_lengkap'] ?? '') ?>,
            seseorang yang mencintai desain, teknologi, dan kreativitas tanpa batas.
        </p>
    </section>
</header>

<!-- ========== MAIN CONTENT ========== -->
<main class="page-wrapper">

    <div class="brand-row">
        <span>PERSONAL BRAND</span>
        <span>EDUCATION</span>
        <span>EXPERIENCE</span>
        <span>SKILLS</span>
    </div>

    <!-- ===== HOME / BIODATA ===== -->
    <section id="home" class="cv-section">
        <div class="cv-section-title">Data Diri</div>
        <div class="cv-section-subtitle">
            Informasi dasar yang menggambarkan identitas dan kontak utama.
        </div>

        <div class="main-grid">
            <!-- kiri: biodata -->
            <div class="biodata-card">
                <div class="biodata-row">

                    <!-- Row 1 -->
                    <div class="biodata-field">
                        <span class="field-label">Nama:</span>
                        <span class="field-value"><?= esc($biodata['nama_lengkap'] ?? '-') ?></span>
                    </div>

                    <div class="biodata-field">
                        <span class="field-label">No. HP:</span>
                        <span class="field-value"><?= esc($biodata['no_hp'] ?? '-') ?></span>
                    </div>

                    <!-- Row 2 -->
                    <div class="biodata-field">
                        <span class="field-label">Jenis Kelamin:</span>
                        <span class="field-value"><?= esc($biodata['jenis_kelamin'] ?? '-') ?></span>
                    </div>

                    <div class="biodata-field">
                        <span class="field-label">Email:</span>
                        <span class="field-value"><?= esc($biodata['email'] ?? '-') ?></span>
                    </div>

                    <!-- Row 3 -->
                    <div class="biodata-field">
                        <span class="field-label">Tempat, Tanggal Lahir:</span>
                        <span class="field-value">
                            <?= esc($biodata['tempat_lahir'] ?? '-') ?>,
                            <?= esc($biodata['tanggal_lahir'] ?? '-') ?>
                        </span>
                    </div>

                    <div class="biodata-field">
                        <span class="field-label">Alamat:</span>
                        <span class="field-value"><?= esc($biodata['alamat'] ?? '-') ?></span>
                    </div>

                </div>

                <div class="biodata-field full biodata-message">
                    <span class="field-label">Deskripsi Singkat:</span>
                    <span class="field-value">
                        <?= esc($biodata['deskripsi_singkat'] ?? 'Mahasiswa yang antusias di bidang web development dan UI/UX design.') ?>
                    </span>
                </div>

                <!-- TOMBOL DOWNLOAD: LINK KE public/pdf/cvpdf.pdf -->
                <a href="<?= base_url('pdf/cvpdf.pdf'); ?>"
                   class="download-btn"
                   download="CV-Syifa-Humaira.pdf">
                    Download CV (PDF)
                </a>
            </div>

            <!-- kanan: kartu profil -->
            <aside class="profile-card">
                <div class="profile-header">
                    <div class="profile-photo">
                        <?php
                        // kalau di DB ada path foto, pakai itu; kalau tidak, pakai default images/cipa.jpg
                        $fotoPath = !empty($biodata['foto']) ? $biodata['foto'] : 'images/cipa.jpg';
                        ?>
                        <img src='images/cipa.jpg'<?= base_url($fotoPath); ?>"
                             alt="Foto"
                             id="profileImage"
                             style="cursor: zoom-in;">
                    </div>

                    <div>
                        <div class="profile-name">
                            <?= esc($biodata['nama_lengkap'] ?? '-') ?>
                        </div>
                        <div class="profile-role">
                            Mahasiswa Informatika · Web Development & UI/UX
                        </div>
                    </div>
                </div>

                <p class="profile-summary">
                    <?= esc($biodata['deskripsi_singkat'] ?? 'Mahasiswa Informatika yang antusias di bidang web development, desain UI/UX, dan pengembangan aplikasi kreatif.') ?>
                </p>

                <ul class="profile-list">
                    <?php if (!empty($keahlian)): ?>
                        <?php
                        $max = min(3, count($keahlian));
                        for ($i = 0; $i < $max; $i++):
                            $skill = $keahlian[$i];
                        ?>
                            <li>
                                <?= esc($skill['nama_keahlian']); ?>
                                <?php if (!empty($skill['tingkat'])): ?>
                                    (<?= esc($skill['tingkat']); ?>)
                                <?php endif; ?>
                            </li>
                        <?php endfor; ?>
                    <?php else: ?>
                        <li>HTML & CSS (Mahir)</li>
                        <li>JavaScript (Menengah)</li>
                        <li>UI/UX Design (Mahir)</li>
                    <?php endif; ?>
                </ul>

                <div class="profile-pill">
                    <span>Fokus saat ini</span>
                    <span>Web Dev & UI/UX</span>
                </div>
            </aside>
        </div>

        <!-- 3 kartu ringkas -->
        <section class="info-grid">
            <div class="info-card">
                <div class="info-title">Riwayat Pendidikan</div>
                <div class="info-sub">
                    <?php if (!empty($pendidikan)): ?>
                        <?= esc(($pendidikan[0]['jenjang'] ?? '') . ' - ' . ($pendidikan[0]['nama_institusi'] ?? '')); ?>
                        <?php if (!empty($pendidikan[0]['jurusan']) && $pendidikan[0]['jurusan'] !== '-'): ?>
                            (<?= esc($pendidikan[0]['jurusan']); ?>)
                        <?php endif; ?>
                    <?php else: ?>
                        Riwayat pendidikan belum diisi.
                    <?php endif; ?>
                </div>
            </div>
            <div class="info-card">
                <div class="info-title">Pengalaman Terbaru</div>
                <div class="info-sub">
                    <?php if (!empty($pengalaman)): ?>
                        <?php $lastExp = end($pengalaman); ?>
                        <?= esc(($lastExp['posisi'] ?? '-') . ' - ' . ($lastExp['nama_tempat'] ?? '-')); ?>
                    <?php else: ?>
                        Pengalaman organisasi / magang belum diisi.
                    <?php endif; ?>
                </div>
            </div>
            <div class="info-card">
                <div class="info-title">Keahlian Utama</div>
                <div class="info-sub">
                    <?php if (!empty($keahlian)): ?>
                        <?= esc($keahlian[0]['nama_keahlian']); ?>
                        <?php if (!empty($keahlian[0]['tingkat'])): ?>
                            (<?= esc($keahlian[0]['tingkat']); ?>)
                        <?php endif; ?>
                    <?php else: ?>
                        Contoh: HTML & CSS, JavaScript, UI/UX.
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- ringkasan timeline -->
        <section class="bottom-section">
            <div class="timeline-header">
                <span>Ringkasan Riwayat</span>
                <span style="font-size:11px;color:var(--muted);">Education · Experience</span>
            </div>
            <div class="timeline-body">
                <?php if (!empty($pendidikan)): ?>
                    <?php foreach ($pendidikan as $p): ?>
                        <div class="timeline-item">
                            <div class="timeline-item-title">
                                <?= esc(($p['jenjang'] ?? '') . ' - ' . ($p['nama_institusi'] ?? '')); ?>
                            </div>
                            <div class="timeline-item-meta">
                                <?= esc(($p['tahun_masuk'] ?? '') . ' - ' . ($p['tahun_lulus'] ?? '')); ?>
                                <?php if (!empty($p['jurusan']) && $p['jurusan'] !== '-'): ?>
                                    · <?= esc($p['jurusan']); ?>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($p['keterangan'])): ?>
                                <div class="timeline-item-desc">
                                    <?= esc($p['keterangan']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (!empty($pengalaman)): ?>
                    <?php foreach ($pengalaman as $exp): ?>
                        <div class="timeline-item">
                            <div class="timeline-item-title">
                                <?= esc($exp['posisi'] ?? '-'); ?> – <?= esc($exp['nama_tempat'] ?? '-'); ?>
                            </div>
                            <div class="timeline-item-meta">
                                <?= esc(($exp['tahun_mulai'] ?? '') . ' - ' . ($exp['tahun_selesai'] ?? '')); ?>
                                <?php if (!empty($exp['jenis_pengalaman'])): ?>
                                    · <?= esc($exp['jenis_pengalaman']); ?>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($exp['deskripsi'])): ?>
                                <div class="timeline-item-desc">
                                    <?= esc($exp['deskripsi']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (empty($pendidikan) && empty($pengalaman)): ?>
                    <div class="timeline-item">
                        <div class="timeline-item-title">Belum ada data</div>
                        <div class="timeline-item-desc">
                            Isi tabel <strong>pendidikan</strong> dan <strong>pengalaman</strong> di database untuk menampilkan ringkasan di sini.
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </section>

    <!-- ===== SECTION PENDIDIKAN ===== -->
    <section id="pendidikan" class="cv-section">
        <div class="cv-section-title">Riwayat Pendidikan</div>
        <div class="cv-section-subtitle">
            Riwayat pendidikan formal yang pernah ditempuh.
        </div>

        <?php if (!empty($pendidikan)): ?>
            <div class="cards-grid">
                <?php foreach ($pendidikan as $p): ?>
                    <article class="edu-card">
                        <div class="edu-title">
                            <?= esc(($p['jenjang'] ?? '') . ' - ' . ($p['nama_institusi'] ?? '')); ?>
                        </div>
                        <div class="edu-meta">
                            <?= esc(($p['tahun_masuk'] ?? '') . ' - ' . ($p['tahun_lulus'] ?? '')); ?>
                            <?php if (!empty($p['jurusan']) && $p['jurusan'] !== '-'): ?>
                                · <?= esc($p['jurusan']); ?>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($p['keterangan'])): ?>
                            <div class="edu-desc">
                                <?= esc($p['keterangan']); ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="cv-section-subtitle">Data pendidikan belum diisi di database.</p>
        <?php endif; ?>
    </section>

    <!-- ===== SECTION PENGALAMAN ===== -->
    <section id="pengalaman" class="cv-section">
        <div class="cv-section-title">Riwayat Pengalaman</div>
        <div class="cv-section-subtitle">
            Pengalaman organisasi, magang, proyek, dan pekerjaan yang relevan.
        </div>

        <?php if (!empty($pengalaman)): ?>
            <div class="cards-grid">
                <?php foreach ($pengalaman as $exp): ?>
                    <article class="exp-card">
                        <div class="exp-title">
                            <?= esc($exp['posisi'] ?? '-'); ?> – <?= esc($exp['nama_tempat'] ?? '-'); ?>
                        </div>
                        <div class="exp-meta">
                            <?= esc(($exp['tahun_mulai'] ?? '') . ' - ' . ($exp['tahun_selesai'] ?? '')); ?>
                            <?php if (!empty($exp['jenis_pengalaman'])): ?>
                                · <?= esc($exp['jenis_pengalaman']); ?>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($exp['deskripsi'])): ?>
                            <div class="exp-desc">
                                <?= esc($exp['deskripsi']); ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="cv-section-subtitle">Data pengalaman belum diisi di database.</p>
        <?php endif; ?>
    </section>

    <!-- ===== SECTION KEAHLIAN ===== -->
    <section id="keahlian" class="cv-section">
        <div class="cv-section-title">Keahlian (Skills)</div>
        <div class="cv-section-subtitle">
            Daftar kemampuan teknis dan non-teknis yang dikuasai.
        </div>

        <?php if (!empty($keahlian)): ?>
            <div class="skill-category">
                <div class="skill-category-title">Semua Keahlian</div>
                <div class="skill-tags">
                    <?php foreach ($keahlian as $skill): ?>
                        <span class="skill-pill">
                            <?= esc($skill['nama_keahlian']); ?>
                            <?php if (!empty($skill['tingkat'])): ?>
                                (<?= esc($skill['tingkat']); ?>)
                            <?php endif; ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <p class="cv-section-subtitle">Data keahlian belum diisi di database.</p>
        <?php endif; ?>
    </section>

    <!-- ===== SECTION PORTOFOLIO ===== -->
    <section id="portofolio" class="cv-section">
        <div class="cv-section-title">Portofolio / Karya</div>
        <div class="cv-section-subtitle">
            Kumpulan proyek, aplikasi, dan karya lain yang pernah dikerjakan.
        </div>

        <?php if (!empty($portofolio)): ?>
            <div class="portfolio-grid">
                <?php foreach ($portofolio as $pf): ?>
                    <article class="portfolio-card">
                        <div class="portfolio-title">
                            <?= esc($pf['judul'] ?? '-'); ?>
                        </div>
                        <div class="portfolio-meta">
                            <?php if (!empty($pf['link_karya'])): ?>
                                <a href="<?= esc($pf['link_karya']); ?>" target="_blank">Lihat Karya</a>
                            <?php else: ?>
                                Link tidak tersedia
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($pf['deskripsi'])): ?>
                            <div class="portfolio-desc">
                                <?= esc($pf['deskripsi']); ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="cv-section-subtitle">
                Belum ada data portofolio di database. Bagian ini opsional, tapi sangat membantu menampilkan karya terbaik.
            </p>
        <?php endif; ?>
    </section>

    <!-- ===== SECTION LOKASI / PETA ===== -->
    <section id="lokasi" class="cv-section">
        <div class="cv-section-title">Lokasi Tempat Tinggal</div>
        <div class="cv-section-subtitle">
            Perkiraan lokasi domisili berdasarkan alamat yang tertera di biodata.
        </div>

        <div class="map-wrapper">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.364058835433!2d106.92260557499594!3d-6.605346393397462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6835d7b5f89d3d%3A0x89f4f1f9e94c672e!2sJl.%20Rancakadu%2C%20Kec.%20Cibeureum%2C%20Kota%20Sukabumi%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1731511400000!5m2!1sid!2sid"
                loading="lazy"
                allowfullscreen=""
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>

</main>

<!-- ========== FOOTER ========== -->
<footer class="footer">
    <div class="footer-grid">
        <div>
            <div class="logo">
                <div class="logo-mark">CV</div>
                <span>SyifaH</span>
            </div>
            <p style="margin-top:10px;line-height:1.6;">
                <?= esc($biodata['deskripsi_singkat'] ?? 'Personal website sederhana sebagai media portofolio dan profil profesional.'); ?>
            </p>
        </div>

        <div>
            <div class="footer-title">Navigation</div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#pendidikan">Pendidikan</a></li>
                <li><a href="#pengalaman">Pengalaman</a></li>
                <li><a href="#keahlian">Keahlian</a></li>
                <li><a href="#portofolio">Portofolio</a></li>
                <li><a href="#lokasi">Lokasi</a></li>
            </ul>
        </div>

        <div>
            <div class="footer-title">Kontak</div>
            <ul>
                <li><?= esc($biodata['email'] ?? 'email@contoh.com'); ?></li>
                <li><?= esc($biodata['no_hp'] ?? '+62 xxx-xxxx'); ?></li>
                <li><?= esc($biodata['alamat'] ?? 'Alamat lengkap'); ?></li>
            </ul>
        </div>

        <div>
            <div class="footer-title">Media Sosial</div>
            <ul>
                <li><a href="https://www.instagram.com/syifahmra/" target="_blank">Instagram</a></li>
                <li><a href="https://www.linkedin.com/in/syifa-humaira-74a159294/" target="_blank">LinkedIn</a></li>
                <li><a href="https://github.com/syifahumaira17" target="_blank">GitHub</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <span>© <?= date('Y'); ?> Syifa Template – All Rights Reserved</span>
        <span><?= esc($biodata['nama_lengkap'] ?? 'Nama Kamu'); ?></span>
    </div>
</footer>

<!-- ========== JS: navbar + animasi scroll ========== -->
<script>
    // aktifkan CSS animasi
    document.body.classList.add('js-animate');

    const sections = document.querySelectorAll('main section[id]');
    const navLinks = document.querySelectorAll('#navbar a');

    // highlight nav sesuai section yang kelihatan
    function onScroll() {
        let current = '';
        const scrollY = window.scrollY + 140;

        sections.forEach(sec => {
            const top = sec.offsetTop;
            const height = sec.offsetHeight;
            if (scrollY >= top && scrollY < top + height) {
                current = sec.getAttribute('id');
            }
        });

        navLinks.forEach(a => {
            a.classList.remove('active');
            if (a.getAttribute('href') === '#' + current) {
                a.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', onScroll);

    // animasi fade-in tiap section
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, {
        threshold: 0.15
    });

    sections.forEach(sec => observer.observe(sec));

    // section pertama langsung kelihatan
    if (sections.length > 0) {
        sections[0].classList.add('visible');
    }
</script>

<!-- Modal Foto Besar -->
<div id="imgModal" class="img-modal">
    <span class="close-modal">&times;</span>
    <img class="img-modal-content" id="modalImg">
</div>

<style>
.img-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    padding-top: 60px;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.8);
}

.img-modal-content {
    margin: auto;
    display: block;
    max-width: 80%;
    max-height: 80vh;
    border-radius: 18px;
    animation: zoomIn 0.3s ease;
}

@keyframes zoomIn {
    from { transform: scale(0.5); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
}

.close-modal {
    position: absolute;
    top: 25px;
    right: 45px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
}
</style>

<script>
const img = document.getElementById("profileImage");
const modal = document.getElementById("imgModal");
const modalImg = document.getElementById("modalImg");
const closeBtn = document.querySelector(".close-modal");

img.onclick = function () {
    modal.style.display = "block";
    modalImg.src = this.src;
};

closeBtn.onclick = function () {
    modal.style.display = "none";
};

modal.onclick = function (e) {
    if (e.target === modal) modal.style.display = "none";
};
</script>

</body>
</html>