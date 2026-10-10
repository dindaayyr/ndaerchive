<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Our Anniversary 💕' ?></title>
    <!-- Tailwind CSS & Icons -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@hotwired/turbo@7.3.0/dist/turbo.es2017-umd.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&family=Caveat:wght@500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400;1,600&family=Syne:wght@500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        syne: ['Syne', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                        cinzel: ['Cinzel', 'serif'],
                        accent: ['Cormorant Garamond', 'serif'],
                        hand: ['Caveat', 'cursive'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        rosepink: {
                            50: '#fff1f2',
                            100: '#ffe4e6',
                            200: '#fecdd3',
                            300: '#e8a0a8',
                            400: '#c4505e',
                            500: '#8b1a2b',
                            600: '#6b0f1e',
                            900: '#2d080e',
                            950: '#1a050a',
                        },
                        warmbg: '#1c0d13'
                    },
                    animation: {
                        'glow-pulse': 'glowPulse 2s ease-in-out infinite',
                        'float': 'floatY 3s ease-in-out infinite',
                    },
                    keyframes: {
                        glowPulse: {
                            '0%, 100%': { boxShadow: '0 0 20px -5px rgba(139, 26, 43, 0.3)' },
                            '50%': { boxShadow: '0 0 35px -5px rgba(139, 26, 43, 0.6)' },
                        },
                        floatY: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-6px)' },
                        },
                    }
                }
            }
        }
    </script>
    <style>
        /* ── Base ── */
        body { 
            background: linear-gradient(180deg, #4a1525 0%, #3b121a 42%, #1c0d13 100%);
            color: #ffe4e6; 
            font-family: 'Plus Jakarta Sans', 'Apple Color Emoji', 'Segoe UI Emoji', 'Noto Color Emoji', sans-serif; 
            font-size: 1.0625rem;
            line-height: 1.65;
            min-height: 100vh;
        }

        /* ── Glassmorphic Cards ── */
        .glass-card { 
            background: linear-gradient(135deg, rgba(42, 18, 29, 0.68) 0%, rgba(28, 13, 19, 0.64) 100%);
            backdrop-filter: blur(24px); 
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(254, 205, 211, 0.2); 
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .glass-card:hover { 
            border-color: rgba(254, 205, 211, 0.34);
            box-shadow: 0 8px 40px -12px rgba(139, 26, 43, 0.35),
                        inset 0 1px 0 rgba(254, 205, 211, 0.06);
            transform: translateY(-2px);
        }

        /* ── Glassmorphic Navbar ── */
        .glass-nav { 
            background: linear-gradient(135deg, rgba(59, 18, 26, 0.78) 0%, rgba(28, 13, 19, 0.86) 100%);
            backdrop-filter: blur(30px); 
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(254, 205, 211, 0.22); 
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4),
                        inset 0 1px 0 rgba(254, 205, 211, 0.05);
        }

        /* ── Glow Effects ── */
        .glow-pink { 
            box-shadow: 0 0 50px -10px rgba(139, 26, 43, 0.45),
                        0 0 100px -20px rgba(74, 14, 23, 0.2); 
        }
        .text-gradient {
            background: linear-gradient(135deg, #ffffff 0%, #fecdd3 50%, #c4505e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ── Nav Link Hover Glow ── */
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            text-shadow: 0 0 12px rgba(254, 205, 211, 0.4);
        }
        .nav-link::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 3px;
            width: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #fecdd3, transparent);
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after,
        .nav-link-active::after {
            width: 52%;
        }
        .brand-glow {
            text-shadow: 0 0 12px rgba(232, 160, 168, 0.32), 0 0 24px rgba(139, 26, 43, 0.25);
        }
        .nav-link-active {
            background: rgba(139, 26, 43, 0.25);
            border: 1px solid rgba(139, 26, 43, 0.4);
            color: #fecdd3;
            box-shadow: 0 0 15px -3px rgba(139, 26, 43, 0.3);
        }

        /* ── Button Glow Micro-Interaction ── */
        .btn-glow {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .btn-glow::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.3s ease;
            box-shadow: 0 0 25px rgba(139, 26, 43, 0.5),
                        inset 0 0 25px rgba(139, 26, 43, 0.1);
        }
        .btn-glow:hover::after { opacity: 1; }
        .btn-glow:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 25px -5px rgba(139, 26, 43, 0.4);
        }
        .btn-glow:active { transform: translateY(0px) scale(0.98); }

        /* ── Floating Music Player ── */
        .music-player {
            background: linear-gradient(135deg, rgba(59, 18, 26, 0.76) 0%, rgba(28, 13, 19, 0.84) 100%);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(254, 205, 211, 0.2);
            transition: all 0.4s ease;
        }
        .music-player:hover {
            border-color: rgba(254, 205, 211, 0.34);
            box-shadow: 0 4px 30px -8px rgba(139, 26, 43, 0.3);
        }
        .music-playing {
            border-color: rgba(139, 26, 43, 0.4) !important;
            box-shadow: 0 0 30px -8px rgba(139, 26, 43, 0.4) !important;
        }

        /* ── Vinyl Spin (BGM) ── */
        @keyframes vinylSpin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .vinyl-spin { animation: vinylSpin 3s linear infinite; }

        /* ── Smooth scroll ── */
        html { scroll-behavior: smooth; }

        /* ── Global Typography Scale ── */
        main .text-xs { font-size: 0.825rem; line-height: 1.55; }
        main .text-sm { font-size: 0.9625rem; line-height: 1.6; }
        main .text-base { font-size: 1.1rem; line-height: 1.65; }
        main .text-lg { font-size: 1.25rem; line-height: 1.6; }
        main .text-xl { font-size: 1.375rem; line-height: 1.5; }
        main .text-2xl { font-size: 1.65rem; line-height: 1.35; }
        main .text-3xl { font-size: 2rem; line-height: 1.25; }
        main .text-4xl { font-size: 2.5rem; line-height: 1.15; }
        main .text-5xl { font-size: 3.3rem; line-height: 1.1; }
        main [class~="text-[9px]"] { font-size: 0.65625rem; line-height: 1.5; }
        main [class~="text-[10px]"] { font-size: 0.75rem; line-height: 1.5; }
        main [class~="text-[11px]"] { font-size: 0.825rem; line-height: 1.55; }
        main p { font-weight: 500; }
        main button,
        main label,
        main input,
        main textarea { font-weight: 500; }
        main button { line-height: 1.5; }
        #bgmText { font-size: 0.825rem; line-height: 1.5; }
        footer p { font-size: 1rem; line-height: 1.5; }
        main .glass-card { border-color: rgba(254, 205, 211, 0.2); }
        main .btn-glow,
        main .cam-btn,
        main .choice-btn,
        main .template-btn { border-color: rgba(254, 205, 211, 0.28); }

        @media (min-width: 640px) {
            main .sm\:text-5xl { font-size: 3.3rem; line-height: 1.1; }
            main .sm\:text-6xl { font-size: 3.5rem; line-height: 1.08; }
            main .sm\:text-4xl { font-size: 2.5rem; line-height: 1.15; }
            main .sm\:text-3xl { font-size: 2rem; line-height: 1.25; }
            main .sm\:text-2xl { font-size: 1.65rem; line-height: 1.35; }
        }

        /* ── Selection ── */
        ::selection {
            background: rgba(139, 26, 43, 0.5);
            color: #fff;
        }
    </style>
</head>
<body class="flex flex-col justify-between">

    <!-- Navbar Floating Pill -->
    <header class="fixed top-5 inset-x-0 z-50 px-4 max-w-4xl mx-auto">
        <nav class="glass-nav rounded-full px-5 sm:px-6 py-2.5 flex items-center justify-between">
            <a href="<?= base_url('/') ?>" class="flex items-center space-x-2 group">
                <span class="text-xl group-hover:scale-110 transition-transform duration-300">💖</span>
                <span class="brand-glow font-accent text-xl sm:text-2xl font-semibold italic tracking-[0.08em] text-white">nda &amp; er</span>
            </a>

            <div class="flex items-center space-x-0.5 sm:space-x-1.5 font-syne text-[0.62rem] sm:text-xs font-semibold tracking-[0.08em] sm:tracking-[0.12em]">
                <a href="<?= base_url('/') ?>" class="nav-link px-2 sm:px-3 py-1.5 rounded-full <?= url_is('/') ? 'nav-link-active text-rosepink-200' : 'text-rosepink-200/75 hover:text-rosepink-300' ?>">Home</a>
                <a href="<?= base_url('timeline') ?>" class="nav-link px-2 sm:px-3 py-1.5 rounded-full <?= url_is('timeline') ? 'nav-link-active text-rosepink-200' : 'text-rosepink-200/75 hover:text-rosepink-300' ?>">Our Story</a>
                <a href="<?= base_url('cinema') ?>" class="nav-link px-2 sm:px-3 py-1.5 rounded-full <?= url_is('cinema') ? 'nav-link-active text-rosepink-200' : 'text-rosepink-200/75 hover:text-rosepink-300' ?>">Cinema</a>
                <a href="<?= base_url('photobooth') ?>" class="nav-link px-2 sm:px-3 py-1.5 rounded-full <?= url_is('photobooth') ? 'nav-link-active text-rosepink-200' : 'text-rosepink-200/75 hover:text-rosepink-300' ?>">Photobooth</a>
                <a href="<?= base_url('wishes') ?>" class="nav-link px-2 sm:px-3 py-1.5 rounded-full <?= url_is('wishes') ? 'nav-link-active text-rosepink-200' : 'text-rosepink-200/75 hover:text-rosepink-300' ?>">Wishes</a>
            </div>
        </nav>
    </header>

    <main class="pt-28 pb-16 flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Floating Music Player Widget -->
    <div id="audio-player-container" data-turbo-permanent class="fixed bottom-5 left-5 z-50">
        <button id="bgmBtn" onclick="toggleBGM()" class="music-player p-2.5 rounded-full flex items-center space-x-2.5 group" aria-pressed="false">
            <div id="bgmCircle" class="w-9 h-9 rounded-full bg-rosepink-900/60 border border-rosepink-500/30 text-rosepink-300 flex items-center justify-center text-sm">
                <i id="bgmIcon" class="fa-solid fa-music"></i>
            </div>
            <span id="bgmText" class="text-[11px] font-medium text-rosepink-200/70 pr-2 hidden sm:inline tracking-wide">Play "Ini Abadi" 🎵</span>
        </button>
        <audio id="bgmAudio" loop>
            <source src="<?= base_url('audio/ini-abadi.mp3') ?>" type="audio/mpeg">
        </audio>
    </div>

    <footer class="text-center py-8 border-t border-rosepink-900/20">
        <p class="font-accent italic text-sm text-rosepink-300/40 tracking-wide">Made with Love • @ndaerchive</p>
    </footer>

    <script data-turbo-eval="false">
        const bgm = document.getElementById('bgmAudio');
        const bgmBtn = document.getElementById('bgmBtn');
        const bgmCircle = document.getElementById('bgmCircle');
        const bgmText = document.getElementById('bgmText');
        let isLeavingPage = false;
        let userInteractedWithBgm = false;
        let resumeBgmOnLoad = false;
        let bgmRestoreHandled = false;
        let savedBgmTime = 0;

        try {
            resumeBgmOnLoad = localStorage.getItem('bgm_playing') === 'true';
            const storedTime = Number(localStorage.getItem('bgm_time'));
            if (Number.isFinite(storedTime) && storedTime >= 0) {
                savedBgmTime = storedTime;
            }
        } catch (error) {
            console.error('Tidak dapat membaca status pemutar musik dari localStorage.', error);
        }

        function saveBgmState(isPlaying = !bgm.paused) {
            try {
                localStorage.setItem('bgm_playing', String(isPlaying));
                localStorage.setItem('bgm_time', String(bgm.currentTime));
            } catch (error) {
                console.error('Tidak dapat menyimpan status pemutar musik ke localStorage.', error);
            }
        }

        function syncBgmPlayer() {
            const isPlaying = !bgm.paused;
            bgmBtn.setAttribute('aria-pressed', String(isPlaying));

            if (isPlaying) {
                bgmCircle.className = 'w-9 h-9 rounded-full bg-rosepink-500 border border-rosepink-400/50 text-white flex items-center justify-center text-sm vinyl-spin';
                bgmText.innerText = 'Playing "Ini Abadi - Perunggu" 💖';
                bgmBtn.classList.add('music-playing');
            } else {
                bgmCircle.className = 'w-9 h-9 rounded-full bg-rosepink-900/60 border border-rosepink-500/30 text-rosepink-300 flex items-center justify-center text-sm';
                bgmText.innerText = 'Play "Ini Abadi" 🎵';
                bgmBtn.classList.remove('music-playing');
            }
        }

        bgm.addEventListener('play', () => {
            syncBgmPlayer();
            saveBgmState(true);
        });

        bgm.addEventListener('pause', () => {
            syncBgmPlayer();
            if (!isLeavingPage) {
                saveBgmState(false);
            }
        });

        bgm.addEventListener('timeupdate', () => {
            if (!isLeavingPage) {
                saveBgmState();
            }
        });

        async function restoreBgmPlayback() {
            if (bgmRestoreHandled || !resumeBgmOnLoad || userInteractedWithBgm) {
                return;
            }

            bgmRestoreHandled = true;
            bgm.currentTime = Number.isFinite(bgm.duration) && bgm.duration > 0
                ? savedBgmTime % bgm.duration
                : savedBgmTime;
            try {
                await bgm.play();
            } catch (error) {
                console.error('Pemutaran ulang otomatis BGM tidak berhasil.', error);
                saveBgmState(false);
                await Swal.fire('Lagu tidak dapat diputar', 'Tekan tombol musik untuk melanjutkan lagu.', 'info');
            }
        }

        bgm.addEventListener('loadedmetadata', restoreBgmPlayback, { once: true });
        if (bgm.readyState >= 1) {
            restoreBgmPlayback();
        }

        window.addEventListener('beforeunload', () => {
            isLeavingPage = true;
            saveBgmState(!bgm.paused);
        });

        syncBgmPlayer();

        async function toggleBGM() {
            userInteractedWithBgm = true;
            if (!bgm.paused) {
                bgm.pause();
            } else {
                bgmBtn.disabled = true;
                try {
                    await bgm.play();
                } catch (error) {
                    console.error('Pemutaran BGM tidak berhasil.', error);
                    saveBgmState(false);
                    await Swal.fire('Lagu tidak dapat diputar', 'Pastikan file audio tersedia lalu coba lagi.', 'error');
                } finally {
                    bgmBtn.disabled = false;
                }
            }
        }
    </script>
</body>
</html>