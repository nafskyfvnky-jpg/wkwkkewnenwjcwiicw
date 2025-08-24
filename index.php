<?php
session_start();

// --- KONFIGURASI ---
define('ADMIN_WHATSAPP', '6282225552900'); // Ganti dengan nomor WhatsApp Admin Anda
define('USERS_FILE', 'users.json');
define('LOG_FILE', 'login_logs.json');

// --- Translation & Language Logic ---
$translations = [
    'id' => [
        'nav_features' => 'Fitur',
        'nav_pricing' => 'Harga',
        'nav_faq' => 'FAQ',
        'nav_start' => 'Login / Daftar',
        'hero_title' => 'AI Video Generator: <br> Ubah <span class="gradient-text">Teks Jadi Video</span> Sinematik',
        'hero_subtitle' => 'Selamat datang di masa depan pembuatan konten. Dengan VEO 3, imajinasi Anda adalah satu-satunya batasan. Ubah ide, cerita, atau bahkan mimpi Anda menjadi video berkualitas tinggi hanya dengan beberapa ketukan.',
        'hero_cta' => 'Mulai Gratis Sekarang',
        'features_title' => 'Gerbang Menuju Kreativitas Tanpa Batas',
        'features_subtitle' => 'Kami menyediakan serangkaian alat canggih yang dirancang untuk memberdayakan setiap kreator, dari pemula hingga profesional.',
        'feature_free' => 'Gratis',
        'feature_1_title' => 'VEO 3 GENERATOR',
        'feature_1_desc' => 'Inti dari platform kami. Hasilkan video standar berkualitas tinggi dari teks apa pun.',
        'feature_2_title' => 'Prompt Generator',
        'feature_2_desc' => 'Kehabisan ide? Biarkan AI kami memicu inspirasi Anda dengan prompt yang unik dan kreatif.',
        'feature_3_title' => 'Image Generator',
        'feature_3_desc' => 'Butuh gambar thumbnail atau aset? Hasilkan gambar memukau dengan Turbo Model kami.',
        'svip_features_title' => 'Fitur Khusus VIP',
        'svip_feature_1_title' => 'Premium Suite',
        'svip_feature_1_desc' => 'Tingkatkan produktivitas dengan kemampuan menghasilkan dua video secara bersamaan.',
        'svip_feature_2_title' => 'Premium Image Generator',
        'svip_feature_2_desc' => 'Akses semua model AI gambar premium untuk hasil visual berkualitas Full HD.',
        'svip_feature_3_title' => 'Music Generator',
        'svip_feature_3_desc' => 'Ciptakan musik latar yang sempurna dan bebas royalti untuk video Anda dengan AI.',
        'svip_feature_4_title' => 'Image Upscaler',
        'svip_feature_4_desc' => 'Perbesar dan tingkatkan resolusi gambar Anda tanpa kehilangan kualitas sedikit pun.',
        'pricing_title' => 'Investasi Terbaik untuk Kreativitas Anda',
        'pricing_subtitle' => 'Pilih paket yang paling sesuai dengan kebutuhan Anda. Mulai gratis atau buka potensi penuh dengan paket VIP kami.',
        'plan_starter_title' => 'Starter',
        'plan_starter_desc' => 'Ideal untuk mencoba dan proyek pribadi.',
        'plan_starter_price' => 'Gratis',
        'plan_starter_feature_1' => 'Video Tanpa Batas',
        'plan_starter_feature_2' => 'Tanpa Watermark',
        'plan_starter_feature_3' => 'Kualitas Video hingga 1080p',
        'plan_starter_feature_4' => 'Akses Prompt & Image Generator',
        'plan_starter_cta' => 'Mulai Sekarang',
        'plan_vip_title' => 'VIP',
        'plan_vip_desc' => 'Untuk kreator profesional dan tim.',
        'plan_vip_price_period' => '/ bulan',
        'plan_vip_feature_1' => 'Video Tanpa Batas',
        'plan_vip_feature_2' => 'Gambar ke Video',
        'plan_vip_feature_3' => 'Kualitas Video hingga 1080p',
        'plan_vip_feature_4' => 'Tanpa Watermark',
        'plan_vip_feature_5' => 'Akses Semua Fitur VIP',
        'plan_vip_feature_6' => 'Dukungan Prioritas',
        'plan_vip_cta' => 'Pilih Paket',
        'faq_title' => 'Masih Ragu? Kami Punya Jawaban',
        'faq_subtitle' => 'Beberapa pertanyaan yang paling sering diajukan untuk membantu Anda memulai.',
        'faq_1_q' => 'Apa itu VEO 3 Unlimited?',
        'faq_1_a' => 'VEO 3 Unlimited adalah platform web inovatif yang menggunakan teknologi AI untuk memungkinkan Anda membuat video berkualitas tinggi hanya dari deskripsi teks.',
        'faq_2_q' => 'Mengapa saya harus menunggu persetujuan admin?',
        'faq_2_a' => 'Proses persetujuan manual kami lakukan untuk menjaga kualitas komunitas dan mencegah penyalahgunaan platform. Kami berusaha menyetujui akun baru secepat mungkin.',
        'faq_3_q' => 'Video seperti apa yang bisa saya buat?',
        'faq_3_a' => 'Anda bisa membuat berbagai jenis video, mulai dari klip sinematik, video promosi produk, visualisasi cerita, hingga konten media sosial yang menarik. Kreativitas Anda adalah satu-satunya batasan!',
        'faq_4_q' => 'Apakah platform ini cocok untuk pemula?',
        'faq_4_a' => 'Tentu saja! Antarmuka kami dirancang agar intuitif dan mudah digunakan. Anda tidak memerlukan pengalaman editing video sebelumnya untuk mulai menciptakan karya yang luar biasa.',
        'form_login_tab' => 'Login',
        'form_register_tab' => 'Daftar',
        'form_login_title' => 'Selamat Datang Kembali!',
        'form_login_desc' => 'Masuk untuk melanjutkan petualangan kreatif Anda dan ciptakan video-video luar biasa dengan kekuatan AI.',
        'form_register_title' => 'Bergabung dengan Komunitas Kreator',
        'form_register_desc' => 'Daftar sekarang dan mulailah mengubah ide cemerlang Anda menjadi video sinematik yang memukau.',
        'form_username_placeholder' => 'Nama Pengguna',
        'form_password_placeholder' => 'Kata Sandi',
        'form_password_register_placeholder' => 'Kata Sandi (min. 6 karakter)',
        'form_login_button' => 'Login',
        'form_register_button' => 'Daftar Akun',
        'footer_brand_desc' => 'Ubah teks menjadi video sinematik dengan kekuatan AI.',
        'footer_nav_title' => 'Navigasi',
        'footer_social_title' => 'Ikuti Kami',
        'footer_copyright' => 'All rights reserved.',
    ],
    'en' => [
        'nav_features' => 'Features',
        'nav_pricing' => 'Pricing',
        'nav_faq' => 'FAQ',
        'nav_start' => 'Login / Register',
        'hero_title' => 'AI Video Generator: <br> Turn <span class="gradient-text">Text into Cinematic</span> Video',
        'hero_subtitle' => 'Welcome to the future of content creation. With VEO 3, your imagination is the only limit. Turn your ideas, stories, or even dreams into high-quality videos with just a few taps.',
        'hero_cta' => 'Start for Free Now',
        'features_title' => 'Gateway to Limitless Creativity',
        'features_subtitle' => 'We provide a suite of powerful tools designed to empower every creator, from beginners to professionals.',
        'feature_free' => 'Free',
        'feature_1_title' => 'VEO 3 GENERATOR',
        'feature_1_desc' => 'The core of our platform. Generate standard high-quality videos from any text.',
        'feature_2_title' => 'Prompt Generator',
        'feature_2_desc' => 'Running out of ideas? Let our AI spark your inspiration with unique and creative prompts.',
        'feature_3_title' => 'Image Generator',
        'feature_3_desc' => 'Need a thumbnail or asset image? Generate stunning visuals with our Turbo Model.',
        'svip_features_title' => 'Exclusive VIP Features',
        'svip_feature_1_title' => 'Premium Suite',
        'svip_feature_1_desc' => 'Boost your productivity by generating two videos simultaneously.',
        'svip_feature_2_title' => 'Premium Image Generator',
        'svip_feature_2_desc' => 'Access all premium AI image models for Full HD quality visuals.',
        'svip_feature_3_title' => 'Music Generator',
        'svip_feature_3_desc' => 'Create the perfect, royalty-free background music for your videos with AI.',
        'svip_feature_4_title' => 'Image Upscaler',
        'svip_feature_4_desc' => 'Enlarge and enhance your image resolution without losing a bit of quality.',
        'pricing_title' => 'The Best Investment for Your Creativity',
        'pricing_subtitle' => 'Choose the plan that best suits your needs. Start for free or unlock full potential with our VIP plan.',
        'plan_starter_title' => 'Starter',
        'plan_starter_desc' => 'Ideal for trying out and personal projects.',
        'plan_starter_price' => 'Free',
        'plan_starter_feature_1' => 'Unlimited Videos',
        'plan_starter_feature_2' => 'No Watermark',
        'plan_starter_feature_3' => 'Up to 1080p Video Quality',
        'plan_starter_feature_4' => 'Access to Prompt & Image Generator',
        'plan_starter_cta' => 'Get Started',
        'plan_vip_title' => 'VIP',
        'plan_vip_desc' => 'For professional creators and teams.',
        'plan_vip_price_period' => '/ month',
        'plan_vip_feature_1' => 'Unlimited Videos',
        'plan_vip_feature_2' => 'Image to Video',
        'plan_vip_feature_3' => 'Up to 1080p Video Quality',
        'plan_vip_feature_4' => 'No Watermark',
        'plan_vip_feature_5' => 'Access to All VIP Features',
        'plan_vip_feature_6' => 'Priority Support',
        'plan_vip_cta' => 'Choose Plan',
        'faq_title' => 'Still Have Questions? We Have Answers',
        'faq_subtitle' => 'Some of the most frequently asked questions to help you get started.',
        'faq_1_q' => 'What is VEO 3 Unlimited?',
        'faq_1_a' => 'VEO 3 Unlimited is an innovative web platform that uses AI technology to allow you to create high-quality videos just from text descriptions.',
        'faq_2_q' => 'Why do I have to wait for admin approval?',
        'faq_2_a' => 'We perform manual approval to maintain community quality and prevent platform abuse. We strive to approve new accounts as quickly as possible.',
        'faq_3_q' => 'What kind of videos can I create?',
        'faq_3_a' => 'You can create various types of videos, from cinematic clips, product promotion videos, story visualizations, to engaging social media content. Your creativity is the only limit!',
        'faq_4_q' => 'Is this platform suitable for beginners?',
        'faq_4_a' => 'Absolutely! Our interface is designed to be intuitive and easy to use. You don\'t need any prior video editing experience to start creating amazing work.',
        'form_login_tab' => 'Login',
        'form_register_tab' => 'Register',
        'form_login_title' => 'Welcome Back!',
        'form_login_desc' => 'Log in to continue your creative adventure and create amazing videos with the power of AI.',
        'form_register_title' => 'Join the Creator Community',
        'form_register_desc' => 'Sign up now and start turning your brilliant ideas into stunning cinematic videos.',
        'form_username_placeholder' => 'Username',
        'form_password_placeholder' => 'Password',
        'form_password_register_placeholder' => 'Password (min. 6 characters)',
        'form_login_button' => 'Login',
        'form_register_button' => 'Create Account',
        'footer_brand_desc' => 'Turn text into cinematic video with the power of AI.',
        'footer_nav_title' => 'Navigation',
        'footer_social_title' => 'Follow Us',
        'footer_copyright' => 'All rights reserved.',
    ]
];

// --- Language Detection & Selection ---
$available_langs = ['id', 'en'];
$lang = 'id'; // Default language

if (isset($_GET['lang']) && in_array($_GET['lang'], $available_langs)) {
    $_SESSION['lang'] = $_GET['lang'];
    header("Location: " . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}

if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {
    // Auto-detect language based on IP
    $ip = $_SERVER['REMOTE_ADDR'] ?? null;
    if ($ip) {
        $geo_data = @json_decode(@file_get_contents("http://ip-api.com/json/{$ip}"), true);
        if (isset($geo_data['countryCode']) && strtolower($geo_data['countryCode']) !== 'id') {
            $lang = 'en';
        }
    }
    $_SESSION['lang'] = $lang;
}

// --- Translation Function ---
function t($key) {
    global $translations, $lang;
    return $translations[$lang][$key] ?? $key;
}


// --- Logika Logout ---
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Jika pengguna sudah login, langsung arahkan ke area anggota
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Cek apakah ada redirect setelah login
    if (isset($_SESSION['redirect_to'])) {
        $redirect_url = $_SESSION['redirect_to'];
        unset($_SESSION['redirect_to']);
        header("Location: " . $redirect_url);
        exit;
    }
    header("Location: member_area.php");
    exit;
}

define('USERS_FILE', 'users.json');
define('LOG_FILE', 'login_logs.json');

// --- Fungsi Bantuan ---
function getUsers() {
    if (!file_exists(USERS_FILE)) return [];
    $json = file_get_contents(USERS_FILE);
    return json_decode($json, true) ?: [];
}

function saveUsers($users) {
    $json = json_encode(array_values($users), JSON_PRETTY_PRINT);
    return file_put_contents(USERS_FILE, $json) !== false;
}

function getLoginLogs() {
    if (!file_exists(LOG_FILE)) return [];
    $json = file_get_contents(LOG_FILE);
    return json_decode($json, true) ?: [];
}

function saveLoginLogs($logs) {
    $json = json_encode(array_values($logs), JSON_PRETTY_PRINT);
    return file_put_contents(LOG_FILE, $json) !== false;
}

function addLoginAttempt($username, $status) {
    $logs = getLoginLogs();
    if (count($logs) > 100) {
        $logs = array_slice($logs, -100);
    }
    $logs[] = [
        'username'  => $username,
        'status'    => $status,
        'ip'        => $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN',
        'time'      => date('Y-m-d H:i:s')
    ];
    saveLoginLogs($logs);
}


$login_error = '';
$register_error = '';
$register_success = '';
$active_form = 'login'; // Default form

// Cek apakah ada permintaan untuk upgrade
if (isset($_GET['action']) && $_GET['action'] === 'upgrade') {
    $_SESSION['redirect_to'] = 'payment.php';
    // Jika tidak ada error login sebelumnya, tampilkan pesan
    if (empty($_SESSION['login_error'])) {
        $login_error = 'Silakan login terlebih dahulu untuk melanjutkan ke pembayaran.';
    }
}

// --- Logika Registrasi ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $active_form = 'register';
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $register_error = 'Nama pengguna dan kata sandi tidak boleh kosong.';
    } elseif (strlen($password) < 6) {
        $register_error = 'Kata sandi minimal harus 6 karakter.';
    } else {
        $users = getUsers();
        $userExists = false;
        foreach ($users as $user) {
            if (strtolower($user['username']) === strtolower($username)) {
                $userExists = true;
                break;
            }
        }

        if ($userExists) {
            $register_error = 'Nama pengguna sudah terdaftar.';
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $users[] = [
                'username' => $username, 
                'password' => $hashed_password, 
                'approved' => false, 
                'plan' => 'Free',
                'registered_at' => date('Y-m-d H:i:s')
            ];
            if (saveUsers($users)) {
                header("Location: " . $_SERVER['PHP_SELF'] . "?registered=true");
                exit;
            } else {
                $register_error = 'Gagal menyimpan data.';
            }
        }
    }
}

// --- Logika Login ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $active_form = 'login';
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $users = getUsers();
    $loggedIn = false;
    $userFound = false;

    foreach ($users as $user) {
        if (strtolower($user['username']) === strtolower($username)) {
            $userFound = true;
            if (password_verify($password, $user['password'])) {
                if (isset($user['approved']) && $user['approved'] === true) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $user['username'];
                    $loggedIn = true;
                    addLoginAttempt($username, 'Success');
                    break;
                } else {
                    $login_error = 'Akun Anda sedang menunggu persetujuan admin.';
                    addLoginAttempt($username, 'Pending Approval');
                    break;
                }
            }
            break; 
        }
    }

    if ($loggedIn) {
        // Cek redirect setelah login berhasil
        if (isset($_SESSION['redirect_to'])) {
            $redirect_url = $_SESSION['redirect_to'];
            unset($_SESSION['redirect_to']);
            header("Location: " . $redirect_url);
        } else {
            header("Location: member_area.php");
        }
        exit;
    } elseif (empty($login_error)) {
        $login_error = 'Nama pengguna atau kata sandi salah.';
        $logStatus = $userFound ? 'Incorrect Password' : 'User Not Found';
        addLoginAttempt($username, $logStatus);
    }
    // Simpan error di session agar bisa ditampilkan setelah redirect
    $_SESSION['login_error'] = $login_error;
}


// Cek jika pendaftaran berhasil
if (isset($_GET['registered'])) {
    $register_success = 'Pendaftaran berhasil! <a href="https://api.whatsapp.com/send?phone=6287777600029&text=Halo%2C%20mohon%20persetujuan%20akun%20VEO%203%20Unlimited%20saya.%20Dengan%20Username%20%3A%20" target="_blank" class="font-bold underline hover:text-white">Hubungi admin via WhatsApp</a> untuk persetujuan.';
    $active_form = 'login';
}

/* ===========================
    SEO HELPERS
   =========================== */
$site_name     = 'VEO 3 Unlimited';
$brand_domain  = 'https://earthmotion.my.id';
$site_tagline  = 'AI Video Generator: Ubah Teks Jadi Video Sinematik';
$site_desc     = 'Buat video dari teks dengan VEO 3 Unlimited, AI video generator canggih untuk menghasilkan video sinematik berkualitas tinggi. Coba gratis sekarang dan ubah ide Anda menjadi karya visual memukau.';
$site_keywords = 'text to video, ai video generator, buat video dari teks, video sinematik ai, generator video ai, prompt video ai, konten video otomatis, veo 3';
$site_locale   = 'id_ID';
$scheme    = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host      = $_SERVER['HTTP_HOST'] ?? 'localhost';
$uri       = strtok($_SERVER['REQUEST_URI'] ?? '/', '#');
$canonical_url = $scheme . '://' . $host . $uri;
$og_image_url  = $brand_domain . '/data/image/og-image.jpg';

?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($site_name) ?> - <?= htmlspecialchars($site_tagline) ?></title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?= htmlspecialchars($site_desc) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($site_keywords) ?>">
    <meta name="author" content="Earthmotion.my.id">
    <link rel="canonical" href="<?= htmlspecialchars($canonical_url) ?>">
    <link rel="icon" href="/data/image/favicon.ico" type="image/x-icon" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= htmlspecialchars($canonical_url) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($site_name . ' - ' . $site_tagline) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($site_desc) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($og_image_url) ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($site_name) ?>">
    <meta property="og:locale" content="<?= htmlspecialchars($site_locale) ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= htmlspecialchars($canonical_url) ?>">
    <meta property="twitter:title" content="<?= htmlspecialchars($site_name . ' - ' . $site_tagline) ?>">
    <meta property="twitter:description" content="<?= htmlspecialchars($site_desc) ?>">
    <meta property="twitter:image" content="<?= htmlspecialchars($og_image_url) ?>">
    
    <!-- Styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --ring: rgba(168, 85, 247, .35);
            --purple-glow: rgba(168, 85, 247, .6);
            --blue-glow: rgba(59, 130, 246, .5);
        }
        html, body { font-family: Inter, ui-sans-serif, system-ui; }
        body { 
            background-color: #0F172A; 
            color: #cbd5e1;
            background-image: radial-gradient(circle at top right, var(--purple-glow), transparent 40%), radial-gradient(circle at bottom left, var(--blue-glow), transparent 50%);
            background-repeat: no-repeat;
        }
        .neo-card { 
            position: relative; 
            background-color: rgba(30, 41, 59, 0.6); 
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
        }
        .form-input-wrapper { position: relative; }
        .form-input {
            background-color: #1E293B; border: 1px solid #334155; 
            outline: none; transition: all 0.2s;
        }
        .form-input:focus { box-shadow: 0 0 0 2px var(--ring); border-color: #a855f7; }
        .input-icon {
            position: absolute; left: 0.75rem; top: 50%;
            transform: translateY(-50%); color: #64748b;
            pointer-events: none;
        }
        .action-btn { background: linear-gradient(to right, #a855f7, #3b82f6); }
        .gradient-text {
            background: linear-gradient(to right, #a855f7, #60a5fa);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        details > summary { list-style: none; }
        details > summary::-webkit-details-marker { display: none; }
        
        .form-content { transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out; }
        .form-content.hidden { opacity: 0; transform: translateY(10px); pointer-events: none; position: absolute; }
        .tab-btn.active { color: white; border-color: #a855f7; }
        
        .form-input::placeholder {
            color: #64748b;
            transition: color 0.2s ease-in-out;
        }
        .form-input:focus::placeholder {
            color: transparent;
        }

        .feature-card {
            background-color: #1e293b;
            border: 1px solid #334155;
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-color: #a855f7;
        }
    </style>

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SoftwareApplication",
      "name": "VEO 3 Unlimited",
      "applicationCategory": "MultimediaApplication",
      "operatingSystem": "Web",
      "description": "AI Video Generator untuk mengubah teks menjadi video sinematik berkualitas tinggi. Coba gratis dan buat konten video otomatis dengan mudah.",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "IDR"
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "reviewCount": "250"
      },
      "mainEntityOfPage": {
         "@type": "WebPage",
         "@id": "<?= htmlspecialchars($canonical_url) ?>"
      }
    }
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [{
        "@type": "Question",
        "name": "Apa itu VEO 3 Unlimited?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "VEO 3 Unlimited adalah platform AI Video Generator yang memungkinkan Anda membuat video berkualitas tinggi dari deskripsi teks. Ini adalah alat untuk mengubah teks menjadi video secara otomatis dan cepat."
        }
      },{
        "@type": "Question",
        "name": "Video seperti apa yang bisa saya buat?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Anda bisa membuat berbagai jenis video, mulai dari klip sinematik, video promosi produk, visualisasi cerita, hingga konten media sosial yang menarik. Kreativitas Anda adalah satu-satunya batasan!"
        }
      },{
        "@type": "Question",
        "name": "Apakah platform ini cocok untuk pemula?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Tentu saja! Antarmuka kami dirancang agar intuitif dan mudah digunakan. Anda tidak memerlukan pengalaman editing video sebelumnya untuk mulai menciptakan karya yang luar biasa dengan AI."
        }
      }]
    }
    </script>
</head>
<body class="min-h-screen">
    <div class="w-full max-w-6xl mx-auto p-4">
        
        <header class="flex items-center justify-between py-4">
            <a href="<?= htmlspecialchars($canonical_url) ?>" class="flex items-center gap-3" aria-label="Homepage">
                <svg class="w-8 h-8 text-fuchsia-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 18L14 18"></path>
                    <path d="M4 12L12 12"></path>
                    <path d="M4 6L14 6"></path>
                </svg>
                <span class="text-2xl font-bold text-white">VEO 3 <span class="text-fuchsia-400">Unlimited</span></span>
            </a>
            <nav class="hidden md:flex items-center gap-6">
                <a href="#fitur" class="text-slate-300 hover:text-white transition"><?= t('nav_features') ?></a>
                <a href="#harga" class="text-slate-300 hover:text-white transition"><?= t('nav_pricing') ?></a>
                <a href="#faq" class="text-slate-300 hover:text-white transition"><?= t('nav_faq') ?></a>
            </nav>
            <div class="flex items-center gap-4">
                <div id="lang-switcher" class="relative">
                    <button id="lang-switcher-btn" class="flex items-center gap-2 text-slate-300 hover:text-white transition">
                        <span><?= $lang === 'id' ? '🇮🇩' : '🇬🇧' ?></span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="lang-dropdown" class="absolute top-full right-0 mt-2 bg-slate-800 border border-slate-700 rounded-lg shadow-lg z-10 w-36 hidden">
                        <a href="?lang=id" class="flex items-center gap-3 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700"><span>🇮🇩</span> Indonesia</a>
                        <a href="?lang=en" class="flex items-center gap-3 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700"><span>🇬🇧</span> English</a>
                    </div>
                </div>
                <a href="#login-register" class="action-btn text-white font-semibold py-2 px-5 rounded-lg transition"><?= t('nav_start') ?></a>
            </div>
        </header>

        
        <main>
            <section class="text-center py-20">
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight">
                    <?= t('hero_title') ?>
                </h1>
                <p class="mt-6 text-lg text-slate-300 max-w-2xl mx-auto">
                    <?= t('hero_subtitle') ?>
                </p>
                <a href="#login-register" class="mt-10 inline-block action-btn text-white font-bold py-4 px-8 rounded-lg text-lg transition-transform transform hover:scale-105">
                    <?= t('hero_cta') ?>
                </a>
            </section>

            <section id="fitur" class="py-24">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-white"><?= t('features_title') ?></h2>
                    <p class="text-slate-400 mt-4 max-w-2xl mx-auto"><?= t('features_subtitle') ?></p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                    <div class="feature-card p-6 rounded-lg text-left relative">
                        <span class="absolute top-4 right-4 text-xs font-semibold bg-blue-500 text-white py-1 px-3 rounded-full"><?= t('feature_free') ?></span>
                        <div class="flex items-center gap-4 mb-4">
                            <svg class="w-10 h-10 text-fuchsia-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="text-xl font-bold text-white"><?= t('feature_1_title') ?></h3>
                        </div>
                        <p class="text-slate-400"><?= t('feature_1_desc') ?></p>
                    </div>
                    <div class="feature-card p-6 rounded-lg text-left relative">
                        <span class="absolute top-4 right-4 text-xs font-semibold bg-blue-500 text-white py-1 px-3 rounded-full"><?= t('feature_free') ?></span>
                        <div class="flex items-center gap-4 mb-4">
                           <svg class="w-10 h-10 text-fuchsia-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                            <h3 class="text-xl font-bold text-white"><?= t('feature_2_title') ?></h3>
                        </div>
                        <p class="text-slate-400"><?= t('feature_2_desc') ?></p>
                    </div>
                    <div class="feature-card p-6 rounded-lg text-left relative">
                        <span class="absolute top-4 right-4 text-xs font-semibold bg-blue-500 text-white py-1 px-3 rounded-full"><?= t('feature_free') ?></span>
                        <div class="flex items-center gap-4 mb-4">
                            <svg class="w-10 h-10 text-fuchsia-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <h3 class="text-xl font-bold text-white"><?= t('feature_3_title') ?></h3>
                        </div>
                        <p class="text-slate-400"><?= t('feature_3_desc') ?></p>
                    </div>
                </div>

                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-white"><?= t('svip_features_title') ?></h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="feature-card p-6 rounded-lg text-left relative">
                        <div class="flex items-center gap-4 mb-4">
                            <svg class="w-10 h-10 text-fuchsia-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            <h3 class="text-xl font-bold text-white"><?= t('svip_feature_1_title') ?></h3>
                        </div>
                        <p class="text-slate-400"><?= t('svip_feature_1_desc') ?></p>
                    </div>
                    <div class="feature-card p-6 rounded-lg text-left relative">
                        <div class="flex items-center gap-4 mb-4">
                            <svg class="w-10 h-10 text-fuchsia-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.293 2.293a1 1 0 010 1.414L11 12l4.293 4.293a1 1 0 010 1.414L13 20m5-15l2.293 2.293a1 1 0 000 1.414L16 12l4.293 4.293a1 1 0 000 1.414L18 20M9 3l2.293 2.293a1 1 0 010 1.414L7 12l4.293 4.293a1 1 0 010 1.414L9 20"></path></svg>
                            <h3 class="text-xl font-bold text-white"><?= t('svip_feature_2_title') ?></h3>
                        </div>
                        <p class="text-slate-400"><?= t('svip_feature_2_desc') ?></p>
                    </div>
                    <div class="feature-card p-6 rounded-lg text-left relative">
                        <div class="flex items-center gap-4 mb-4">
                            <svg class="w-10 h-10 text-fuchsia-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z"></path></svg>
                            <h3 class="text-xl font-bold text-white"><?= t('svip_feature_3_title') ?></h3>
                        </div>
                        <p class="text-slate-400"><?= t('svip_feature_3_desc') ?></p>
                    </div>
                    <div class="feature-card p-6 rounded-lg text-left relative">
                        <div class="flex items-center gap-4 mb-4">
                            <svg class="w-10 h-10 text-fuchsia-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5v-4m0 0h-4m4 0l-5-5"></path></svg>
                            <h3 class="text-xl font-bold text-white"><?= t('svip_feature_4_title') ?></h3>
                        </div>
                        <p class="text-slate-400"><?= t('svip_feature_4_desc') ?></p>
                    </div>
                </div>
            </section>
            
            <section id="harga" class="py-24">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-white"><?= t('pricing_title') ?></h2>
                    <p class="text-slate-400 mt-4 max-w-xl mx-auto"><?= t('pricing_subtitle') ?></p>
                </div>
                <div class="flex flex-col md:flex-row justify-center items-stretch gap-8 max-w-4xl mx-auto">
                    <div class="neo-card p-8 rounded-2xl w-full md:w-1/2 flex flex-col">
                        <h3 class="text-2xl font-bold text-white"><?= t('plan_starter_title') ?></h3>
                        <p class="text-slate-400 mt-2"><?= t('plan_starter_desc') ?></p>
                        <div class="text-5xl font-extrabold text-white my-6"><?= t('plan_starter_price') ?></div>
                        <ul class="space-y-3 text-slate-300 text-left flex-grow">
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span><?= t('plan_starter_feature_1') ?></span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span><?= t('plan_starter_feature_2') ?></span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span><?= t('plan_starter_feature_3') ?></span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span><?= t('plan_starter_feature_4') ?></span></li>
                        </ul>
                        <a href="#login-register" class="mt-8 block w-full text-center bg-slate-700 hover:bg-slate-600 text-white font-bold py-3 px-6 rounded-lg transition"><?= t('plan_starter_cta') ?></a>
                    </div>
                    <div class="neo-card p-8 rounded-2xl w-full md:w-1/2 flex flex-col border-2 border-fuchsia-500/50">
                        <h3 class="text-2xl font-bold text-white"><?= t('plan_vip_title') ?></h3>
                        <p class="text-slate-400 mt-2"><?= t('plan_vip_desc') ?></p>
                        <div class="my-6">
                            <span class="text-5xl font-extrabold text-white">Rp 50.000</span>
                            <span class="text-slate-400"><?= t('plan_vip_price_period') ?></span>
                        </div>
                        <ul class="space-y-3 text-slate-300 text-left flex-grow">
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span><?= t('plan_vip_feature_1') ?></span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span><?= t('plan_vip_feature_2') ?></span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span><?= t('plan_vip_feature_3') ?></span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span><?= t('plan_vip_feature_4') ?></span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span><?= t('plan_vip_feature_5') ?></span></li>
                        </ul>
                        <a href="index.php?action=upgrade#login-register" class="mt-8 block w-full text-center action-btn text-white font-bold py-3 px-6 rounded-lg transition"><?= t('plan_vip_cta') ?></a>
                    </div>
                </div>
            </section>

            
            <section id="faq" class="py-24">
                <div class="max-w-3xl mx-auto">
                    <h2 class="text-4xl font-bold text-white text-center mb-12"><?= t('faq_title') ?></h2>
                     <p class="text-slate-400 mt-4 max-w-xl mx-auto text-center mb-12"><?= t('faq_subtitle') ?></p>
                    <div class="space-y-4">
                        <details class="neo-card p-6 rounded-lg group">
                            <summary class="flex justify-between items-center font-semibold text-white text-lg cursor-pointer">
                                <?= t('faq_1_q') ?>
                                <svg class="w-5 h-5 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </summary>
                            <p class="text-slate-400 mt-4"><?= t('faq_1_a') ?></p>
                        </details>
                        <details class="neo-card p-6 rounded-lg group">
                            <summary class="flex justify-between items-center font-semibold text-white text-lg cursor-pointer">
                                <?= t('faq_2_q') ?>
                                <svg class="w-5 h-5 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </summary>
                            <p class="text-slate-400 mt-4"><?= t('faq_2_a') ?></p>
                        </details>
                        <details class="neo-card p-6 rounded-lg group">
                            <summary class="flex justify-between items-center font-semibold text-white text-lg cursor-pointer">
                                <?= t('faq_3_q') ?>
                                <svg class="w-5 h-5 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </summary>
                            <p class="text-slate-400 mt-4"><?= t('faq_3_a') ?></p>
                        </details>
                        <details class="neo-card p-6 rounded-lg group">
                            <summary class="flex justify-between items-center font-semibold text-white text-lg cursor-pointer">
                                <?= t('faq_4_q') ?>
                                <svg class="w-5 h-5 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </summary>
                            <p class="text-slate-400 mt-4"><?= t('faq_4_a') ?></p>
                        </details>
                    </div>
                </div>
            </section>

            <section id="login-register" class="py-20 flex items-center justify-center">
                <div class="w-full max-w-4xl mx-auto bg-slate-800/50 backdrop-blur-lg rounded-2xl shadow-2xl overflow-hidden grid md:grid-cols-2">
                    <div class="hidden md:flex flex-col justify-center p-12 bg-gradient-to-br from-fuchsia-600 to-blue-600 text-white">
                        <h2 id="form-title" class="text-3xl font-bold mb-4"></h2>
                        <p id="form-description" class="text-fuchsia-200"></p>
                    </div>
                    <div class="p-8 md:p-12">
                        <div class="flex gap-6 border-b border-slate-700 mb-8">
                            <button id="show-login" data-tab="login" class="tab-btn pb-3 text-lg font-semibold border-b-2 transition-colors duration-300 <?php echo $active_form === 'login' ? 'active' : 'text-slate-500 border-transparent hover:text-slate-300'; ?>">
                                <?= t('form_login_tab') ?>
                            </button>
                            <button id="show-register" data-tab="register" class="tab-btn pb-3 text-lg font-semibold border-b-2 transition-colors duration-300 <?php echo $active_form === 'register' ? 'active' : 'text-slate-500 border-transparent hover:text-slate-300'; ?>">
                                <?= t('form_register_tab') ?>
                            </button>
                        </div>

                        <div class="relative min-h-[280px]">
                            <div id="login-form" class="form-content w-full <?php echo $active_form === 'register' ? 'hidden' : ''; ?>">
                                <form method="POST" action="#login-register" class="space-y-6">
                                    <input type="hidden" name="login" value="1">
                                    <div class="form-input-wrapper">
                                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        <input type="text" name="username" placeholder="<?= t('form_username_placeholder') ?>" class="form-input w-full rounded-lg py-3 pr-3 pl-11" required>
                                    </div>
                                    <div class="form-input-wrapper">
                                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                        <input type="password" name="password" placeholder="<?= t('form_password_placeholder') ?>" class="form-input w-full rounded-lg py-3 pr-3 pl-11" required>
                                    </div>
                                    <?php if ($login_error): ?><p class="text-red-400 text-sm text-center"><?= htmlspecialchars($login_error); ?></p><?php endif; ?>
                                    <?php if ($register_success): ?><p class="text-green-400 text-sm text-center"><?= $register_success; ?></p><?php endif; ?>
                                    <button type="submit" class="w-full action-btn text-white font-bold py-3 px-4 rounded-lg transition transform hover:scale-105"><?= t('form_login_button') ?></button>
                                </form>
                            </div>

                            <div id="register-form" class="form-content w-full <?php echo $active_form === 'login' ? 'hidden' : ''; ?>">
                                <form method="POST" action="#login-register" class="space-y-6">
                                    <input type="hidden" name="register" value="1">
                                     <div class="form-input-wrapper">
                                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        <input type="text" name="username" placeholder="<?= t('form_username_placeholder') ?>" class="form-input w-full rounded-lg py-3 pr-3 pl-11" required>
                                    </div>
                                    <div class="form-input-wrapper">
                                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                        <input type="password" name="password" placeholder="<?= t('form_password_register_placeholder') ?>" class="form-input w-full rounded-lg py-3 pr-3 pl-11" required>
                                    </div>
                                    <?php if ($register_error): ?><p class="text-red-400 text-sm text-center"><?= htmlspecialchars($register_error); ?></p><?php endif; ?>
                                    <button type="submit" class="w-full action-btn text-white font-bold py-3 px-4 rounded-lg transition transform hover:scale-105"><?= t('form_register_button') ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="bg-slate-900/50 border-t border-slate-700 mt-24 py-12">
            <div class="w-full max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <div>
                    <h3 class="text-xl font-bold text-white">VEO 3 <span class="text-fuchsia-400">Unlimited</span></h3>
                    <p class="text-slate-400 mt-2 text-sm"><?= t('footer_brand_desc') ?></p>
                </div>
                <div>
                    <h4 class="font-semibold text-white"><?= t('footer_nav_title') ?></h4>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#fitur" class="text-slate-400 hover:text-white transition text-sm"><?= t('nav_features') ?></a></li>
                        <li><a href="#harga" class="text-slate-400 hover:text-white transition text-sm"><?= t('nav_pricing') ?></a></li>
                        <li><a href="#faq" class="text-slate-400 hover:text-white transition text-sm"><?= t('nav_faq') ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-white"><?= t('footer_social_title') ?></h4>
                    <div class="flex justify-center md:justify-start gap-4 mt-4">
                        <a href="#" aria-label="Twitter" class="text-slate-400 hover:text-white transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16.03 6.02,17.25 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z"></path></svg></a>
                        <a href="#" aria-label="Github" class="text-slate-400 hover:text-white transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.75 9.5,20.05 9.5,19.24C7.5,19.64 6.95,18.45 6.95,18.45C6.5,17.35 5.9,17.1 5.9,17.1C4.95,16.4 6,16.45 6,16.45C7.05,16.5 7.5,17.45 7.5,17.45C8.45,19 9.95,18.5 10.5,18.25C10.55,17.65 10.8,17.25 11.1,17C8.85,16.75 6.5,15.9 6.5,12.5C6.5,11.55 6.85,10.75 7.4,10.15C7.3,9.9 7,8.95 7.5,7.75C7.5,7.75 8.35,7.5 10.5,9C11.3,8.75 12.2,8.65 13,8.65C13.8,8.65 14.7,8.75 15.5,9C17.65,7.5 18.5,7.75 18.5,7.75C19,8.95 18.7,9.9 18.6,10.15C19.15,10.75 19.5,11.55 19.5,12.5C19.5,15.9 17.15,16.75 14.9,17C15.25,17.3 15.5,18.05 15.5,19.25C15.5,20.95 15.5,22.25 15.5,22.5C15.5,22.75 15.65,23.05 16.15,22.95C20.12,21.55 23,17.8 23,13A11,11 0 0,0 12,2Z"></path></svg></a>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-slate-800 pt-6 text-center">
                <p class="text-sm text-slate-500">&copy; <?php echo date("Y"); ?> Earthmotion.my.id <?= t('footer_copyright') ?></p>
            </div>
        </footer>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab-btn');
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const formTitle = document.getElementById('form-title');
        const formDescription = document.getElementById('form-description');
        const langSwitcherBtn = document.getElementById('lang-switcher-btn');
        const langDropdown = document.getElementById('lang-dropdown');
        
        const translations = {
            loginTitle: {
                id: "<?= t('form_login_title') ?>",
                en: "<?= $translations['en']['form_login_title'] ?>"
            },
            loginDesc: {
                id: "<?= t('form_login_desc') ?>",
                en: "<?= $translations['en']['form_login_desc'] ?>"
            },
            registerTitle: {
                id: "<?= t('form_register_title') ?>",
                en: "<?= $translations['en']['form_register_title'] ?>"
            },
            registerDesc: {
                id: "<?= t('form_register_desc') ?>",
                en: "<?= $translations['en']['form_register_desc'] ?>"
            }
        };

        const currentLang = "<?= $lang ?>";

        const setActiveTab = (tab) => {
            const isLogin = tab.dataset.tab === 'login';
            
            if (isLogin) {
                formTitle.textContent = translations.loginTitle[currentLang];
                formDescription.textContent = translations.loginDesc[currentLang];
            } else {
                formTitle.textContent = translations.registerTitle[currentLang];
                formDescription.textContent = translations.registerDesc[currentLang];
            }

            tabs.forEach(t => {
                t.classList.remove('active', 'text-white', 'border-fuchsia-500');
                t.classList.add('text-slate-500', 'border-transparent', 'hover:text-slate-300');
            });
            tab.classList.add('active', 'text-white', 'border-fuchsia-500');
            tab.classList.remove('text-slate-500', 'border-transparent', 'hover:text-slate-300');

            loginForm.classList.toggle('hidden', !isLogin);
            registerForm.classList.toggle('hidden', isLogin);
        };

        tabs.forEach(tab => {
            tab.addEventListener('click', () => setActiveTab(tab));
        });

        const activeTab = document.querySelector('.tab-btn.active');
        if (activeTab) {
            setActiveTab(activeTab);
        }

        langSwitcherBtn.addEventListener('click', () => {
            langDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!langSwitcherBtn.contains(event.target) && !langDropdown.contains(event.target)) {
                langDropdown.classList.add('hidden');
            }
        });
    });
    </script>
</body>
</html>
