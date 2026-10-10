<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="max-w-4xl mx-auto px-6 space-y-10">
    <div class="text-center space-y-3">
        <h1 class="font-cinzel text-4xl sm:text-5xl font-bold text-gradient">Wall of Wishes</h1>
        <p class="font-accent italic text-xl text-rosepink-200/50 tracking-wide">Harapan dan doa manis untuk perjalanan kita.</p>
        <p class="text-[11px] text-rosepink-200/40">Tuliskan pesan terbaikmu di sini 💌</p>
    </div>

    <!-- Form Wish -->
    <div class="glass-card p-6 sm:p-8 rounded-3xl">
        <form onsubmit="postWish(event)" class="space-y-5">
            <div>
                <label class="text-[10px] font-sans font-bold text-rosepink-200/60 block mb-2 uppercase tracking-[0.15em]">Nama Kamu</label>
                <input type="text" id="wName" required placeholder="Pasangan Tercinta" class="w-full bg-rosepink-950/50 border border-rosepink-900/30 hover:border-rosepink-500/20 focus:border-rosepink-400/40 rounded-xl px-4 py-3 text-sm text-white placeholder-rosepink-200/20 focus:outline-none transition-colors duration-300">
            </div>
            <div>
                <label class="text-[10px] font-sans font-bold text-rosepink-200/60 block mb-2 uppercase tracking-[0.15em]">Pesan / Harapan</label>
                <textarea id="wMsg" rows="3" required placeholder="Tulis ucapan kamu di sini..." class="w-full bg-rosepink-950/50 border border-rosepink-900/30 hover:border-rosepink-500/20 focus:border-rosepink-400/40 rounded-xl px-4 py-3 text-sm text-white placeholder-rosepink-200/20 focus:outline-none transition-colors duration-300 resize-none"></textarea>
            </div>
            <button type="submit" class="btn-glow w-full py-3 bg-rosepink-500 hover:bg-rosepink-600 text-white font-bold text-xs rounded-xl shadow-lg shadow-rosepink-500/15 transition-all duration-300 uppercase tracking-wider">Kirim Pesan 💕</button>
        </form>
    </div>

    <!-- Grid Wishes -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <?php foreach($wishes as $w): ?>
            <div class="glass-card p-5 rounded-2xl space-y-2.5 group">
                <span class="text-xs font-semibold text-rosepink-300 block"><?= esc($w['name']) ?> 💕</span>
                <p class="text-sm text-rosepink-100/60 font-accent italic leading-relaxed">"<?= esc($w['message']) ?>"</p>
                <time datetime="<?= esc($w['created_at']) ?>" class="text-[10px] text-rosepink-200/35 block font-mono tracking-wide">
                    <?= esc(date('d M Y · H:i', strtotime($w['created_at']))) ?>
                </time>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    async function postWish(e) {
        e.preventDefault();
        const button = e.currentTarget.querySelector('button[type="submit"]');
        button.disabled = true;
        try {
            const response = await fetch('<?= base_url('wishes/save') ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({
                    name: document.getElementById('wName').value.trim(),
                    message: document.getElementById('wMsg').value.trim()
                })
            });
            const result = await response.json();
            if (!response.ok || result.status !== 'success') {
                throw new Error(result.message || 'Pesan gagal dikirim.');
            }
            await Swal.fire({
                title: 'Tersimpan!',
                text: result.message,
                icon: 'success',
                background: 'linear-gradient(135deg, #1a050a, #0b0608)',
                color: '#ffe4e6',
                confirmButtonColor: '#8b1a2b'
            });
            window.location.reload();
        } catch (error) {
            await Swal.fire({
                title: 'Pesan gagal dikirim',
                text: error.message || 'Tidak dapat menghubungi server. Coba lagi.',
                icon: 'error',
                background: 'linear-gradient(135deg, #1a050a, #0b0608)',
                color: '#ffe4e6',
                confirmButtonColor: '#8b1a2b'
            });
        } finally {
            button.disabled = false;
        }
    }
</script>
<?= $this->endSection() ?>