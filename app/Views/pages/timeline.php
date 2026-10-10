<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    .story-timeline {
        position: relative;
    }
    .story-timeline::before {
        content: '';
        position: absolute;
        top: 0.75rem;
        bottom: 0.75rem;
        left: 0.75rem;
        width: 2px;
        background: linear-gradient(180deg, rgba(254, 205, 211, 0.7), rgba(196, 80, 94, 0.28), rgba(254, 205, 211, 0.12));
        box-shadow: 0 0 14px rgba(196, 80, 94, 0.45);
    }
    .story-card {
        position: relative;
        transition: transform 0.25s ease, border-color 0.25s ease;
    }
    .story-card:hover {
        transform: translateY(-2px);
        border-color: rgba(254, 205, 211, 0.32);
    }
    .story-dot {
        position: absolute;
        top: 1.5rem;
        left: -2.45rem;
        width: 0.9rem;
        height: 0.9rem;
        border: 2px solid #fecdd3;
        border-radius: 9999px;
        background: #8b1a2b;
        box-shadow: 0 0 10px rgba(254, 205, 211, 0.55), 0 0 22px rgba(139, 26, 43, 0.6);
    }
</style>

<section class="max-w-3xl mx-auto px-6 space-y-10" aria-labelledby="story-heading">
    <header class="text-center space-y-3">
        <h1 id="story-heading" class="font-serif text-4xl sm:text-5xl font-bold text-gradient">Our Story</h1>
        <p class="font-accent text-xl sm:text-2xl font-semibold italic text-[#fecdd3] leading-relaxed tracking-wide">
            33++ jejak cerita nda &amp; er — dari awal mula rasa, hingga melangkah sejauh ini ✨
        </p>
    </header>

    <div class="story-timeline ml-2 pl-8 space-y-5">
        <?php foreach ($memories as $index => $memory): ?>
            <?php
            $number = $index + 1;
            $extensions = ['jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG'];
            $foundImage = null;

            foreach ($extensions as $extension) {
                $testPath = 'uploads/story/' . $number . '.' . $extension;
                if (file_exists(FCPATH . $testPath)) {
                    $foundImage = $testPath;
                    break;
                }
            }

            $imageSrc = $foundImage
                ? base_url($foundImage)
                : 'https://placehold.co/600x400/1c0d13/fecdd3?text=nda+%26+er';
            ?>
            <article class="story-card glass-card rounded-2xl p-4 sm:p-5">
                <span class="story-dot" aria-hidden="true"></span>
                <div class="grid sm:grid-cols-[minmax(0,1fr)_11rem] gap-4 items-center">
                    <div class="space-y-2">
                        <time class="font-serif italic font-semibold text-lg text-rosepink-200 tracking-wide">
                            <?= esc($memory['date']) ?>
                        </time>
                        <p class="font-syne text-sm font-medium tracking-wide leading-relaxed text-[#fce7f3]">
                            <?= esc($memory['story']) ?>
                        </p>
                        <button
                            type="button"
                            class="story-detail-btn text-xs font-semibold text-rosepink-200/70 hover:text-white underline decoration-rosepink-300/40 underline-offset-4"
                            data-date="<?= esc($memory['date'], 'attr') ?>"
                            data-story="<?= esc($memory['story'], 'attr') ?>"
                            aria-label="Lihat detail momen <?= esc($memory['date'], 'attr') ?>"
                        >Lihat momen</button>
                    </div>
                    <div class="story-image-wrapper group relative aspect-[4/3] overflow-hidden rounded-2xl border border-rose-300/20 shadow-md backdrop-blur-sm">
                        <img
                            src="<?= esc($imageSrc, 'attr') ?>"
                            alt="<?= esc($memory['date'], 'attr') ?>"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                            onerror="this.onerror=null; this.src='https://placehold.co/600x400/1c0d13/fecdd3?text=nda+%26+er';"
                        />
                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <aside class="glass-card animate-glow-pulse relative overflow-hidden rounded-3xl border border-rose-300/25 px-6 py-8 sm:px-10 sm:py-10 text-center">
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-rose-300/10 via-transparent to-rose-900/20"></div>
        <div class="relative space-y-4">
            <p class="text-3xl sm:text-4xl" aria-hidden="true">♾️✨</p>
            <h2 class="font-accent text-3xl sm:text-4xl font-semibold italic tracking-wide text-rosepink-100">and counting... ♾️✨</h2>
            <p class="mx-auto max-w-xl font-accent text-lg sm:text-xl tracking-wide leading-relaxed text-[#fce7f3]/90">
                karena setiap hari bersamamu adalah bab baru yang belum usai ditulis. masih ada jutaan tawa, perjalanan, dan cerita manis yang menunggu kita di depan.
            </p>
            <span class="inline-flex items-center rounded-full border border-rose-300/35 bg-rose-300/10 px-4 py-2 text-sm font-medium tracking-wide text-rosepink-100 shadow-md shadow-rose-300/10">
                to be continued with you ❤️
            </span>
        </div>
    </aside>
</section>

<script>
    document.querySelectorAll('.story-detail-btn').forEach(button => {
        button.addEventListener('click', () => {
            Swal.fire({
                title: button.dataset.date,
                text: button.dataset.story,
                background: 'linear-gradient(135deg, #2a121d, #1c0d13)',
                color: '#ffe4e6',
                confirmButtonColor: '#8b1a2b',
                confirmButtonText: 'Tutup',
                customClass: { title: 'font-serif italic' }
            });
        });
    });
</script>
<?= $this->endSection() ?>
