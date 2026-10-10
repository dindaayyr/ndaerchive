<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    main .home-page .text-xs { font-size: 0.75rem; line-height: 1rem; }
    main .home-page .text-sm { font-size: 0.875rem; line-height: 1.25rem; }
    main .home-page .text-base { font-size: 1rem; line-height: 1.5rem; }
    main .home-page .text-lg { font-size: 1.125rem; line-height: 1.75rem; }
    main .home-page .text-xl { font-size: 1.25rem; line-height: 1.75rem; }
    main .home-page .text-2xl { font-size: 1.5rem; line-height: 2rem; }
    main .home-page .text-3xl { font-size: 1.875rem; line-height: 2.25rem; }
    main .home-page .text-4xl { font-size: 2.25rem; line-height: 2.5rem; }
    main .home-page .text-5xl { font-size: 3rem; line-height: 1; }
    main .home-page .text-6xl { font-size: 3.75rem; line-height: 1; }
    main .home-page [class~="text-[9px]"] { font-size: 0.5625rem; line-height: 1rem; }
    main .home-page [class~="text-[10px]"] { font-size: 0.625rem; line-height: 1rem; }
    main .home-page [class~="text-[11px]"] { font-size: 0.6875rem; line-height: 1rem; }
    main .home-page p:not(.font-semibold):not(.font-bold):not(.font-medium) { font-weight: 400; }

    @media (min-width: 640px) {
        main .home-page .sm\:text-2xl { font-size: 1.5rem; line-height: 2rem; }
        main .home-page .sm\:text-3xl { font-size: 1.875rem; line-height: 2.25rem; }
        main .home-page .sm\:text-4xl { font-size: 2.25rem; line-height: 2.5rem; }
        main .home-page .sm\:text-5xl { font-size: 3rem; line-height: 1; }
        main .home-page .sm\:text-6xl { font-size: 3.75rem; line-height: 1; }
    }
</style>
<div class="home-page max-w-4xl mx-auto px-6 space-y-10">
    <div class="text-center space-y-5 pt-4">
        <span class="inline-flex items-center space-x-2 px-5 py-2 rounded-full bg-rosepink-500/10 border border-rosepink-500/20 text-rosepink-200 text-base font-accent italic font-semibold tracking-wide">
            <span>365 days of us, and a lifetime to go.</span>
        </span>
        <h1 class="font-serif text-5xl sm:text-6xl font-bold tracking-tight text-gradient leading-tight">
            Every Moment<br>With You
        </h1>
        <p class="font-accent italic text-2xl sm:text-3xl text-rosepink-200/80 tracking-wide">
            Is My Favorite Story.
        </p>
        <p class="font-accent italic font-semibold text-rosepink-200/65 max-w-2xl mx-auto text-base sm:text-lg leading-relaxed tracking-wide">
            Terhitung sejak 10 Oktober 2025, dunia seolah berubah warna, dan setiap detiknya kini punya cerita.
        </p>
    </div>

    <!-- Live Counter — Exclusive Glass Design -->
    <div class="glass-card rounded-3xl p-8 sm:p-10 glow-pink relative overflow-hidden text-center animate-glow-pulse">
        <!-- Decorative gradient orb -->
        <div class="absolute -top-20 -right-20 w-48 h-48 bg-rosepink-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-16 -left-16 w-40 h-40 bg-rosepink-600/8 rounded-full blur-3xl pointer-events-none"></div>
        
        <p class="text-[10px] font-sans uppercase tracking-[0.25em] text-rosepink-300/70 mb-1">Time We've Shared</p>
        <h3 class="font-cinzel text-xl sm:text-2xl font-semibold text-white/90 mb-8 tracking-wide">10 Oktober 2025 — Sekarang</h3>
        
        <div class="grid grid-cols-4 gap-3 sm:gap-4 max-w-lg mx-auto">
            <!-- Days -->
            <div class="relative group">
                <div class="absolute inset-0 bg-rosepink-500/10 rounded-2xl blur-sm group-hover:bg-rosepink-500/15 transition-all duration-500"></div>
                <div class="relative bg-rosepink-950/50 border border-rosepink-500/15 group-hover:border-rosepink-400/30 p-4 sm:p-5 rounded-2xl transition-all duration-500">
                    <span id="days" class="font-cinzel text-3xl sm:text-4xl font-bold text-white block">0</span>
                    <span class="text-[9px] text-rosepink-200/50 uppercase tracking-[0.2em] mt-1 block font-sans">Hari</span>
                </div>
            </div>
            <!-- Hours -->
            <div class="relative group">
                <div class="absolute inset-0 bg-rosepink-500/10 rounded-2xl blur-sm group-hover:bg-rosepink-500/15 transition-all duration-500"></div>
                <div class="relative bg-rosepink-950/50 border border-rosepink-500/15 group-hover:border-rosepink-400/30 p-4 sm:p-5 rounded-2xl transition-all duration-500">
                    <span id="hours" class="font-cinzel text-3xl sm:text-4xl font-bold text-white block">0</span>
                    <span class="text-[9px] text-rosepink-200/50 uppercase tracking-[0.2em] mt-1 block font-sans">Jam</span>
                </div>
            </div>
            <!-- Minutes -->
            <div class="relative group">
                <div class="absolute inset-0 bg-rosepink-500/10 rounded-2xl blur-sm group-hover:bg-rosepink-500/15 transition-all duration-500"></div>
                <div class="relative bg-rosepink-950/50 border border-rosepink-500/15 group-hover:border-rosepink-400/30 p-4 sm:p-5 rounded-2xl transition-all duration-500">
                    <span id="mins" class="font-cinzel text-3xl sm:text-4xl font-bold text-white block">0</span>
                    <span class="text-[9px] text-rosepink-200/50 uppercase tracking-[0.2em] mt-1 block font-sans">Menit</span>
                </div>
            </div>
            <!-- Seconds (accented) -->
            <div class="relative group">
                <div class="absolute inset-0 bg-rosepink-500/15 rounded-2xl blur-sm group-hover:bg-rosepink-500/20 transition-all duration-500"></div>
                <div class="relative bg-rosepink-950/50 border border-rosepink-400/20 group-hover:border-rosepink-400/40 p-4 sm:p-5 rounded-2xl transition-all duration-500">
                    <span id="secs" class="font-cinzel text-3xl sm:text-4xl font-bold text-rosepink-300 block">0</span>
                    <span class="text-[9px] text-rosepink-200/50 uppercase tracking-[0.2em] mt-1 block font-sans">Detik</span>
                </div>
            </div>
        </div>

        <!-- Decorative accent line -->
        <div class="mt-8 flex items-center justify-center space-x-3">
            <div class="h-px w-12 bg-gradient-to-r from-transparent to-rosepink-500/30"></div>
            <span class="font-hand text-lg text-rosepink-300/50">& counting...</span>
            <div class="h-px w-12 bg-gradient-to-l from-transparent to-rosepink-500/30"></div>
        </div>
    </div>
</div>

<script>
    // Set acuan waktu: 10 Oktober 2025
    const start = new Date("2025-10-10T00:00:00");
    function updateCounter() {
        const diff = Math.abs(new Date() - start);
        document.getElementById('days').innerText = Math.floor(diff / (1000 * 60 * 60 * 24));
        document.getElementById('hours').innerText = Math.floor((diff / (1000 * 60 * 60)) % 24);
        document.getElementById('mins').innerText = Math.floor((diff / 1000 / 60) % 60);
        document.getElementById('secs').innerText = Math.floor((diff / 1000) % 60);
    }
    setInterval(updateCounter, 1000); updateCounter();
</script>
<?= $this->endSection() ?>