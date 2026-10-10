<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500;1,600&family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .template-btn {
        transition: all 0.3s ease;
    }
    .template-btn:hover {
        transform: translateY(-1px);
    }
    .template-btn-active {
        background: rgba(139, 26, 43, 0.25);
        border-color: rgba(196, 80, 94, 0.5);
        color: #fff;
        box-shadow: 0 0 20px -5px rgba(139, 26, 43, 0.35);
    }
    .template-btn-inactive {
        background: rgba(26, 5, 10, 0.5);
        border-color: rgba(254, 205, 211, 0.1);
        color: rgba(254, 205, 211, 0.5);
    }
    .choice-btn {
        border: 1px solid rgba(254, 205, 211, 0.12);
        background: rgba(26, 5, 10, 0.42);
        color: rgba(254, 205, 211, 0.68);
        transition: all 0.2s ease;
    }
    .choice-btn:hover, .choice-btn-active {
        border-color: rgba(196, 80, 94, 0.55);
        background: rgba(139, 26, 43, 0.22);
        color: #fff;
    }
    .theme-dot {
        width: 1rem;
        height: 1rem;
        border-radius: 9999px;
        border: 1px solid rgba(254, 205, 211, 0.3);
        display: inline-block;
    }
    .sticker-item {
        cursor: grab;
        touch-action: none;
        user-select: none;
    }
    .placed-sticker {
        position: absolute;
        transform: translate(-50%, -50%);
        cursor: grab;
        touch-action: none;
        user-select: none;
        line-height: 1;
    }
    .cam-btn {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .cam-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 20px -5px rgba(139, 26, 43, 0.3);
    }
    .cam-btn:active { transform: translateY(0) scale(0.98); }
</style>

<div class="max-w-6xl mx-auto px-4 space-y-10">
    <div class="text-center space-y-3">
        <h1 class="font-cinzel text-4xl sm:text-5xl font-bold text-gradient">Photobooth Studio</h1>
        <p class="font-accent italic text-xl text-rosepink-200/50 tracking-wide">Abadikan momen terbaikmu dalam bingkai kenangan.</p>
        <p class="text-[11px] text-rosepink-200/40">Pilih desain frame milikmu dan bergayalah dengan foto berbeda di setiap kotaknya! 📸</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
        
        <!-- Controls & Camera Panel -->
        <div class="glass-card p-6 rounded-3xl space-y-5">
            <div>
                <label class="text-[10px] font-sans font-bold text-rosepink-200/60 block mb-2.5 uppercase tracking-[0.15em]">Pilih Desain Frame</label>
                <div class="grid grid-cols-2 gap-2">
                    <button type="button" onclick="selectTemplate('ticket')" data-template="ticket" class="template-btn template-btn-active py-3 px-3 rounded-2xl border font-semibold text-xs">Classic Strip <span class="block mt-1 text-[10px] opacity-60">3 shots · vertical ticket</span></button>
                    <button type="button" onclick="selectTemplate('grid')" data-template="grid" class="template-btn template-btn-inactive py-3 px-3 rounded-2xl border font-semibold text-xs">Studio Grid <span class="block mt-1 text-[10px] opacity-60">8 shots · 2 × 4</span></button>
                    <button type="button" onclick="selectTemplate('square')" data-template="square" class="template-btn template-btn-inactive py-3 px-3 rounded-2xl border font-semibold text-xs">Classic Square <span class="block mt-1 text-[10px] opacity-60">4 shots · 2 × 2</span></button>
                    <button type="button" onclick="selectTemplate('dual')" data-template="dual" class="template-btn template-btn-inactive py-3 px-3 rounded-2xl border font-semibold text-xs">Minimalist Dual <span class="block mt-1 text-[10px] opacity-60">2 shots · vertical</span></button>
                </div>
            </div>

            <div>
                <label class="text-[10px] font-sans font-bold text-rosepink-200/60 block mb-2.5 uppercase tracking-[0.15em]">Frame Theme</label>
                <div class="grid grid-cols-2 gap-2">
                    <button type="button" onclick="selectTheme('maroon')" data-theme="maroon" class="choice-btn choice-btn-active rounded-xl px-3 py-2 text-left text-[10px]"><span class="theme-dot mr-2 align-middle" style="background:#261318"></span>Deep Maroon</button>
                    <button type="button" onclick="selectTheme('white')" data-theme="white" class="choice-btn rounded-xl px-3 py-2 text-left text-[10px]"><span class="theme-dot mr-2 align-middle" style="background:#f7f4f2"></span>Minimalist White</button>
                    <button type="button" onclick="selectTheme('champagne')" data-theme="champagne" class="choice-btn rounded-xl px-3 py-2 text-left text-[10px]"><span class="theme-dot mr-2 align-middle" style="background:#e9dcc5"></span>Cream / Champagne</button>
                    <button type="button" onclick="selectTheme('noir')" data-theme="noir" class="choice-btn rounded-xl px-3 py-2 text-left text-[10px]"><span class="theme-dot mr-2 align-middle" style="background:#161719"></span>Vintage Noir</button>
                </div>
            </div>

            <div>
                <label class="text-[10px] font-sans font-bold text-rosepink-200/60 block mb-2.5 uppercase tracking-[0.15em]">Photo Filter</label>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                    <button type="button" onclick="selectFilter('normal')" data-filter="normal" class="choice-btn choice-btn-active rounded-xl px-3 py-2 text-[10px]">Original</button>
                    <button type="button" onclick="selectFilter('bw')" data-filter="bw" class="choice-btn rounded-xl px-3 py-2 text-[10px]">B&W Vintage</button>
                    <button type="button" onclick="selectFilter('rose')" data-filter="rose" class="choice-btn rounded-xl px-3 py-2 text-[10px]">Soft Rose Glow</button>
                    <button type="button" onclick="selectFilter('sepia')" data-filter="sepia" class="choice-btn rounded-xl px-3 py-2 text-[10px]">Warm Sepia</button>
                    <button type="button" onclick="selectFilter('cool')" data-filter="cool" class="choice-btn rounded-xl px-3 py-2 text-[10px]">Moody Cool</button>
                </div>
            </div>

            <div>
                <label class="text-[10px] font-sans font-bold text-rosepink-200/60 block mb-2.5 uppercase tracking-[0.15em]">Stickers · drag to place</label>
                <div class="flex flex-wrap gap-2">
                    <button type="button" onclick="addSticker('💖')" class="sticker-item choice-btn rounded-xl px-3 py-2 text-lg">💖</button>
                    <button type="button" onclick="addSticker('✨')" class="sticker-item choice-btn rounded-xl px-3 py-2 text-lg">✨</button>
                    <button type="button" onclick="addSticker('🎀')" class="sticker-item choice-btn rounded-xl px-3 py-2 text-lg">🎀</button>
                    <button type="button" onclick="addSticker('🧸')" class="sticker-item choice-btn rounded-xl px-3 py-2 text-lg">🧸</button>
                    <button type="button" onclick="addSticker('🍷')" class="sticker-item choice-btn rounded-xl px-3 py-2 text-lg">🍷</button>
                    <button type="button" onclick="addSticker('💌')" class="sticker-item choice-btn rounded-xl px-3 py-2 text-lg">💌</button>
                    <button type="button" onclick="addSticker('📸')" class="sticker-item choice-btn rounded-xl px-3 py-2 text-lg">📸</button>
                    <button type="button" onclick="addSticker('👑')" class="sticker-item choice-btn rounded-xl px-3 py-2 text-lg">👑</button>
                    <button type="button" onclick="addSticker('🤍')" class="sticker-item choice-btn rounded-xl px-3 py-2 text-lg">🤍</button>
                </div>
            </div>

            <div class="h-px bg-gradient-to-r from-transparent via-rosepink-500/20 to-transparent"></div>

            <div class="space-y-3">
                <label class="text-[10px] font-sans font-bold text-rosepink-200/60 block uppercase tracking-[0.15em]">Kontrol Kamera</label>
                <div class="flex gap-2">
                    <button type="button" onclick="initCam()" class="cam-btn flex-1 py-2.5 bg-rosepink-900/40 hover:bg-rosepink-900/60 border border-rosepink-500/20 hover:border-rosepink-500/30 text-xs font-bold text-rosepink-100 rounded-xl">
                        Aktifkan Kamera
                    </button>
                    <button type="button" id="snapBtn" onclick="startCaptureSeries()" disabled class="cam-btn flex-1 py-2.5 bg-rosepink-500 hover:bg-rosepink-600 disabled:opacity-30 disabled:hover:transform-none text-xs font-bold text-white rounded-xl shadow-lg shadow-rosepink-500/20">
                        Mulai Sesi Foto 📸
                    </button>
                </div>
            </div>

            <!-- Preview Live WebCam -->
            <div class="relative overflow-hidden rounded-2xl bg-rosepink-950/40 border border-rosepink-500/10 aspect-video flex items-center justify-center">
                <video id="video" autoplay playsinline class="w-full h-full object-cover hidden" style="transform: scaleX(-1); -webkit-transform: scaleX(-1);"></video>
                <p id="camPlaceholder" class="text-xs text-rosepink-200/30 font-accent italic text-lg">Kamera belum aktif</p>
                
                <!-- Overlay Countdown & Slot Indicator -->
                <div id="countdownOverlay" class="absolute inset-0 bg-black/75 flex flex-col items-center justify-center hidden backdrop-blur-md space-y-3">
                    <span id="slotInfo" class="text-[10px] font-sans font-bold text-rosepink-200/70 uppercase tracking-[0.2em]">Foto 1 dari 3</span>
                    <span id="countdownText" class="font-cinzel text-7xl font-bold text-white" style="text-shadow: 0 0 30px rgba(139,26,43,0.5)">3</span>
                    <span class="text-[10px] text-rosepink-200/40 font-accent italic text-base">Bersiap ganti gaya!</span>
                </div>
            </div>
        </div>

        <!-- Canvas & Result Output -->
        <div class="lg:sticky lg:top-24 glass-card p-6 rounded-3xl text-center space-y-5">
            <div>
                <h3 class="text-[10px] font-sans font-bold text-rosepink-200/60 uppercase tracking-[0.2em]">Real-Time Frame Preview</h3>
                <p id="previewStatus" class="mt-1 text-xs text-rosepink-200/50">0 dari 3 foto terisi</p>
            </div>
            
            <canvas id="stripCanvas" class="hidden"></canvas>
            
            <div class="flex justify-center">
                <div id="previewWrap" class="relative mx-auto w-fit max-w-full">
                    <img id="stripResult" src="" class="block max-h-[550px] max-w-full rounded-2xl shadow-2xl border border-rosepink-500/15">
                    <div id="stickerOverlay" class="absolute inset-0 overflow-hidden"></div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <button type="button" id="downloadBtn" onclick="downloadImage()" disabled class="cam-btn w-full py-3 bg-rosepink-500 hover:bg-rosepink-600 disabled:opacity-30 text-white font-bold text-xs rounded-xl shadow-lg shadow-rosepink-500/20">
                    Download High Quality PNG 📥
                </button>
                <button type="button" id="saveBtn" onclick="savePhoto()" disabled class="cam-btn w-full py-3 bg-rosepink-900/40 hover:bg-rosepink-900/60 disabled:opacity-30 border border-rosepink-500/20 text-rosepink-100 font-bold text-xs rounded-xl">
                    Simpan ke Galeri 💾
                </button>
            </div>
        </div>

    </div>
</div>

<script>
    const layouts = {
        ticket: {
            shots: 3, width: 420, height: 1100,
            boxes: [{x: 40, y: 205, w: 340, h: 190}, {x: 40, y: 415, w: 340, h: 190}, {x: 40, y: 625, w: 340, h: 190}]
        },
        grid: {
            shots: 8, width: 560, height: 1300,
            boxes: Array.from({length: 8}, (_, i) => ({x: 30 + (i % 2) * 255, y: 145 + Math.floor(i / 2) * 260, w: 245, h: 230}))
        },
        square: {
            shots: 4, width: 900, height: 1120,
            boxes: Array.from({length: 4}, (_, i) => ({x: 50 + (i % 2) * 425, y: 150 + Math.floor(i / 2) * 405, w: 375, h: 375}))
        },
        dual: {
            shots: 2, width: 560, height: 1050,
            boxes: [{x: 40, y: 195, w: 480, h: 300}, {x: 40, y: 525, w: 480, h: 300}]
        }
    };
    const themes = {
        maroon: { background: '#261318', foreground: '#f7e9eb', muted: '#d7aeb5', line: '#a96873', photoLine: '#d7aeb5' },
        white: { background: '#f7f4f2', foreground: '#292426', muted: '#776c6e', line: '#d5c9c8', photoLine: '#e1d9d8' },
        champagne: { background: '#e9dcc5', foreground: '#3e3027', muted: '#806d58', line: '#b7a184', photoLine: '#c5b49a' },
        noir: { background: '#161719', foreground: '#f0eff0', muted: '#b7b8bd', line: '#686a70', photoLine: '#898b91' }
    };
    const filters = {
        normal: 'none',
        bw: 'grayscale(1) contrast(1.08)',
        rose: 'saturate(1.12) sepia(0.12) brightness(1.04)',
        sepia: 'sepia(0.62) saturate(0.82) contrast(1.04)',
        cool: 'saturate(0.82) contrast(1.18) hue-rotate(8deg)'
    };
    let currentTemplate = 'ticket';
    let currentTheme = 'maroon';
    let currentFilter = 'normal';
    let shots = [];
    let stickers = [];
    let camStream = null;
    let captureInProgress = false;
    let renderedShotCount = 0;
    let renderVersion = 0;
    let stickerDragging = false;

    function refreshExportButtons() {
        const complete = renderedShotCount === layouts[currentTemplate].shots;
        document.getElementById('downloadBtn').disabled = !complete || captureInProgress;
        document.getElementById('saveBtn').disabled = !complete || captureInProgress;
    }

    function selectTemplate(type) {
        if (captureInProgress || !layouts[type]) return;
        currentTemplate = type;
        document.querySelectorAll('[data-template]').forEach(button => {
            const active = button.dataset.template === type;
            button.className = `template-btn ${active ? 'template-btn-active' : 'template-btn-inactive'} py-3 px-3 rounded-2xl border font-semibold text-xs`;
        });
        refreshExportButtons();
        renderFrame().catch(showRenderError);
    }

    function selectTheme(theme) {
        if (!themes[theme]) return;
        currentTheme = theme;
        document.querySelectorAll('[data-theme]').forEach(button => button.classList.toggle('choice-btn-active', button.dataset.theme === theme));
        renderFrame().catch(showRenderError);
    }

    function selectFilter(filter) {
        if (!filters[filter]) return;
        currentFilter = filter;
        document.querySelectorAll('[data-filter]').forEach(button => button.classList.toggle('choice-btn-active', button.dataset.filter === filter));
        document.getElementById('video').style.filter = filters[filter];
        renderFrame().catch(showRenderError);
    }

    function showRenderError(error) {
        Swal.fire('Gagal membuat frame', error.message || 'Tidak dapat merender template.', 'error');
    }

    function addSticker(emoji) {
        stickers.push({ emoji, x: 0.5, y: 0.5, id: Date.now() + Math.random() });
        renderStickers();
        renderFrame().catch(showRenderError);
    }

    function renderStickers() {
        const overlay = document.getElementById('stickerOverlay');
        overlay.replaceChildren();
        stickers.forEach((sticker, index) => {
            const item = document.createElement('span');
            item.className = 'placed-sticker';
            item.textContent = sticker.emoji;
            item.dataset.index = String(index);
            item.style.left = `${sticker.x * 100}%`;
            item.style.top = `${sticker.y * 100}%`;
            item.style.fontSize = `${Math.max(22, overlay.clientWidth * 0.085)}px`;
            item.setAttribute('aria-label', `Sticker ${sticker.emoji}; seret untuk memindahkan`);
            overlay.appendChild(item);
        });
    }

    document.getElementById('stickerOverlay').addEventListener('pointerdown', event => {
        const stickerElement = event.target.closest('.placed-sticker');
        if (!stickerElement) return;
        event.preventDefault();
        const overlay = event.currentTarget;
        const index = Number(stickerElement.dataset.index);
        stickerDragging = true;
        stickerElement.setPointerCapture(event.pointerId);
        const move = moveEvent => {
            const bounds = overlay.getBoundingClientRect();
            stickers[index].x = Math.max(0.04, Math.min(0.96, (moveEvent.clientX - bounds.left) / bounds.width));
            stickers[index].y = Math.max(0.03, Math.min(0.97, (moveEvent.clientY - bounds.top) / bounds.height));
            stickerElement.style.left = `${stickers[index].x * 100}%`;
            stickerElement.style.top = `${stickers[index].y * 100}%`;
            renderFrame(false).catch(showRenderError);
        };
        const stop = () => {
            stickerDragging = false;
            stickerElement.removeEventListener('pointermove', move);
            stickerElement.removeEventListener('pointerup', stop);
            stickerElement.removeEventListener('pointercancel', stop);
            renderFrame().catch(showRenderError);
        };
        stickerElement.addEventListener('pointermove', move);
        stickerElement.addEventListener('pointerup', stop);
        stickerElement.addEventListener('pointercancel', stop);
    });

    async function initCam() {
        try {
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                throw new Error('Browser ini tidak mendukung akses kamera.');
            }
            if (camStream) {
                camStream.getTracks().forEach(track => track.stop());
            }
            camStream = await navigator.mediaDevices.getUserMedia({ video: { width: 1280, height: 720 } });
            const v = document.getElementById('video');
            v.srcObject = camStream;
            await v.play();
            v.classList.remove('hidden');
            document.getElementById('camPlaceholder').classList.add('hidden');
            document.getElementById('snapBtn').disabled = false;
        } catch (e) {
            await Swal.fire('Kamera tidak tersedia', e.message || 'Gagal mengakses kamera. Pastikan izin kamera telah diberikan.', 'error');
        }
    }

    async function startCaptureSeries() {
        if (captureInProgress) return;
        const v = document.getElementById('video');
        if (!camStream || v.readyState < HTMLMediaElement.HAVE_CURRENT_DATA) {
            await Swal.fire('Kamera belum siap', 'Aktifkan kamera dan tunggu pratinjau tampil sebelum memulai sesi foto.', 'warning');
            return;
        }

        captureInProgress = true;
        shots = [];
        renderedShotCount = 0;
        const totalShots = layouts[currentTemplate].shots;
        const overlay = document.getElementById('countdownOverlay');
        const countText = document.getElementById('countdownText');
        const slotInfo = document.getElementById('slotInfo');
        const snapButton = document.getElementById('snapBtn');
        snapButton.disabled = true;
        document.querySelectorAll('[data-template]').forEach(button => button.disabled = true);
        refreshExportButtons();

        overlay.classList.remove('hidden');

        try {
            await renderFrame();
            for (let i = 0; i < totalShots; i++) {
                slotInfo.innerText = `Foto ${i + 1} dari ${totalShots}`;
                for (let c = 3; c >= 1; c--) {
                    countText.innerText = c;
                    await new Promise(resolve => setTimeout(resolve, 1000));
                }

                const canvas = document.createElement('canvas');
                canvas.width = v.videoWidth;
                canvas.height = v.videoHeight;
                const ctx = canvas.getContext('2d');
                if (!ctx) throw new Error('Tidak dapat membuat canvas untuk foto.');
                ctx.translate(canvas.width, 0);
                ctx.scale(-1, 1);
                ctx.drawImage(v, 0, 0, canvas.width, canvas.height);
                shots.push(canvas.toDataURL('image/png'));
                renderedShotCount = shots.length;
                await renderFrame();
            }
        } catch (error) {
            await Swal.fire('Sesi foto gagal', error.message || 'Terjadi kesalahan saat mengambil foto.', 'error');
        } finally {
            overlay.classList.add('hidden');
            captureInProgress = false;
            snapButton.disabled = false;
            document.querySelectorAll('[data-template]').forEach(button => button.disabled = false);
            refreshExportButtons();
        }
    }

    async function renderFrame(syncStickers = true) {
        const version = ++renderVersion;
        const layout = layouts[currentTemplate];
        const theme = themes[currentTheme];
        const cv = document.createElement('canvas');
        const ctx = cv.getContext('2d');
        if (!ctx) throw new Error('Browser tidak dapat membuat canvas.');
        const scale = 2;
        cv.width = layout.width * scale;
        cv.height = layout.height * scale;
        ctx.scale(scale, scale);
        await Promise.all([
            document.fonts.load('italic 500 24px "Cormorant Garamond"'),
            document.fonts.load('italic 500 24px "Playfair Display"'),
            document.fonts.load('500 16px "Plus Jakarta Sans"')
        ]);
        await document.fonts.ready;
        ctx.fillStyle = theme.background;
        ctx.fillRect(0, 0, layout.width, layout.height);
        ctx.strokeStyle = theme.line;
        ctx.lineWidth = 1;
        ctx.strokeRect(18, 18, layout.width - 36, layout.height - 36);
        ctx.textAlign = 'center';
        ctx.fillStyle = theme.foreground;
        ctx.font = `600 ${Math.max(20, layout.width * 0.045)}px "Plus Jakarta Sans", sans-serif`;
        drawTrackedText(ctx, 'PHOTOBOOTH', layout.width / 2, 62, 2.2);
        ctx.fillStyle = theme.muted;
        ctx.font = `italic 600 ${Math.max(18, layout.width * 0.044)}px "Cormorant Garamond", serif`;
        ctx.fillText('nda & er', layout.width / 2, 96);
        if (currentTemplate === 'ticket') {
            ctx.font = `italic 500 ${Math.max(16, layout.width * 0.036)}px "Playfair Display", serif`;
            ctx.fillText('1st anniversary', layout.width / 2, 132);
        }

        const images = await loadImages(shots, layout.shots);
        if (version !== renderVersion) return;
        layout.boxes.forEach((box, index) => {
            ctx.strokeStyle = theme.photoLine;
            ctx.lineWidth = 1;
            ctx.strokeRect(box.x - 3, box.y - 3, box.w + 6, box.h + 6);
            if (images[index]) {
                ctx.save();
                ctx.filter = filters[currentFilter];
                drawImageCover(ctx, images[index], box.x, box.y, box.w, box.h);
                ctx.restore();
            } else {
                ctx.fillStyle = currentTheme === 'white' ? '#e8e2e0' : theme.line;
                ctx.fillRect(box.x, box.y, box.w, box.h);
            }
        });

        const footerY = layout.height - 90;
        ctx.strokeStyle = theme.line;
        ctx.beginPath();
        ctx.moveTo(layout.width * 0.12, footerY - 20);
        ctx.lineTo(layout.width * 0.88, footerY - 20);
        ctx.stroke();
        if (currentTemplate === 'grid') {
            ctx.fillStyle = theme.muted;
            ctx.font = `italic 500 ${Math.max(16, layout.width * 0.032)}px "Playfair Display", serif`;
            ctx.fillText('Still choosing you, every day', layout.width / 2, footerY - 34);
        }
        ctx.fillStyle = theme.foreground;
        ctx.font = `500 ${Math.max(11, layout.width * 0.022)}px "Plus Jakarta Sans", sans-serif`;
        drawTrackedText(ctx, '10.10.2025', layout.width / 2, footerY + 7, 2);
        ctx.fillStyle = theme.muted;
        ctx.font = `500 ${Math.max(10, layout.width * 0.019)}px "Plus Jakarta Sans", sans-serif`;
        drawTrackedText(ctx, '@ndaerchive', layout.width / 2, footerY + 28, 1.5);
        ctx.font = `italic 500 ${Math.max(11, layout.width * 0.023)}px "Cormorant Garamond", serif`;
        ctx.fillText('365 days of us', layout.width / 2, footerY + 49);

        stickers.forEach(sticker => {
            ctx.font = `${Math.max(26, layout.width * 0.085)}px "Apple Color Emoji", "Segoe UI Emoji", "Noto Color Emoji", sans-serif`;
            ctx.textAlign = 'center';
            ctx.fillText(sticker.emoji, sticker.x * layout.width, sticker.y * layout.height);
        });

        if (version !== renderVersion) return;
        const output = document.getElementById('stripCanvas');
        output.width = cv.width;
        output.height = cv.height;
        const outputContext = output.getContext('2d');
        if (!outputContext) throw new Error('Browser tidak dapat menampilkan hasil canvas.');
        outputContext.drawImage(cv, 0, 0);
        document.getElementById('stripResult').src = output.toDataURL('image/png');
        document.getElementById('previewStatus').textContent = `${Math.min(shots.length, layout.shots)} dari ${layout.shots} foto terisi`;
        if (syncStickers) renderStickers();
    }

    function drawImageCover(ctx, image, x, y, width, height) {
        const scale = Math.max(width / image.width, height / image.height);
        const sourceWidth = width / scale;
        const sourceHeight = height / scale;
        const sourceX = (image.width - sourceWidth) / 2;
        const sourceY = (image.height - sourceHeight) / 2;
        ctx.drawImage(image, sourceX, sourceY, sourceWidth, sourceHeight, x, y, width, height);
    }

    function drawTrackedText(ctx, text, centerX, y, spacing) {
        const characters = Array.from(text);
        const textWidth = characters.reduce((width, character) => width + ctx.measureText(character).width, 0)
            + Math.max(0, characters.length - 1) * spacing;
        let x = centerX - textWidth / 2;
        ctx.save();
        ctx.textAlign = 'left';
        characters.forEach(character => {
            ctx.fillText(character, x, y);
            x += ctx.measureText(character).width + spacing;
        });
        ctx.restore();
    }

    async function loadImages(sources, count) {
        return Promise.all(Array.from({ length: count }, async (_, index) => {
            if (!sources[index]) return null;
            const image = new Image();
            image.src = sources[index];
            await image.decode();
            return image;
        }));
    }

    async function downloadImage() {
        if (renderedShotCount !== layouts[currentTemplate].shots) return;
        await renderFrame();
        const a = document.createElement('a');
        a.download = `photobooth-${currentTemplate}-${Date.now()}.png`;
        a.href = document.getElementById('stripCanvas').toDataURL('image/png');
        a.click();
    }

    async function savePhoto() {
        if (renderedShotCount !== layouts[currentTemplate].shots) return;
        const button = document.getElementById('saveBtn');
        button.disabled = true;
        try {
            await renderFrame();
            const response = await fetch('<?= base_url('photobooth/save') ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ image: document.getElementById('stripCanvas').toDataURL('image/png') })
            });
            const result = await response.json();
            if (!response.ok || result.status !== 'success') {
                throw new Error(result.message || 'Foto gagal disimpan.');
            }
            await Swal.fire({
                title: 'Tersimpan!',
                text: result.message,
                icon: 'success',
                background: 'linear-gradient(135deg, #1a050a, #0b0608)',
                color: '#ffe4e6',
                confirmButtonColor: '#8b1a2b'
            });
        } catch (error) {
            await Swal.fire('Gagal menyimpan', error.message || 'Tidak dapat menghubungi server.', 'error');
        } finally {
            button.disabled = false;
        }
    }

    window.addEventListener('beforeunload', () => {
        if (camStream) camStream.getTracks().forEach(track => track.stop());
    });
    document.getElementById('stripResult').addEventListener('load', () => {
        if (!stickerDragging) renderStickers();
    });
    window.addEventListener('load', () => renderFrame().catch(error => {
        Swal.fire('Gagal membuat frame', error.message || 'Tidak dapat merender template.', 'error');
    }));
</script>
<?= $this->endSection() ?>