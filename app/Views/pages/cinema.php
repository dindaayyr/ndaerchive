<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
$videos = [
    [
        'title' => 'Cinema Memory #1 ✨',
        'date' => 'Memory #1',
        'description' => 'Momen indah perjalanan kita yang terabadikan dalam sinema romantis nda & er.',
        'youtube_url' => 'https://youtu.be/WQOLa1BaXuY?si=y8Ny5edATCvnau3q',
    ],
    [
        'title' => 'Cinema Memory #2 💖',
        'date' => 'Memory #2',
        'description' => 'Jejak tawa dan cerita manis kita selanjutnya yang diabadikan bersama.',
        'youtube_url' => 'https://youtu.be/MMHazl6Epjg?si=KcSEIPRdPRNBOCER',
    ],
    [
        'title' => 'Cinema Memory #3 🌹',
        'date' => 'Memory #3',
        'description' => 'Kenangan berharga berikutnya dalam lembaran sinema cinta kita.',
        'youtube_url' => 'https://youtu.be/zCzEapDQmlI?si=BZbyH1nw9P3byXa4',
    ],
];
?>

<section class="max-w-5xl mx-auto px-6 space-y-10" aria-labelledby="cinema-heading">
    <header class="text-center space-y-3">
        <h1 id="cinema-heading" class="font-cinzel text-4xl sm:text-5xl font-bold text-gradient">Our Cinema</h1>
        <p class="font-accent italic text-xl text-rosepink-200/70 tracking-wide">Momen-momen yang terekam dalam bingkai waktu.</p>
        <p class="text-sm text-rosepink-200/60">Kenangan indah dalam sinema nda &amp; er 🎬</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 max-w-5xl mx-auto">
        <?php foreach ($videos as $index => $video): ?>
            <?php
            preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/', $video['youtube_url'], $matches);
            $videoId = $matches[1] ?? '';
            $cardPosition = $index === 2 ? 'md:col-span-2 md:w-[calc(50%-1rem)] md:mx-auto' : '';
            ?>
            <article class="cinema-card glass-card rounded-2xl overflow-hidden border border-rose-300/20 shadow-xl p-4 flex flex-col justify-between <?= $cardPosition ?>">
                <div class="relative w-full aspect-video rounded-xl overflow-hidden mb-4 border border-rose-300/10 bg-black/60">
                    <?php if ($videoId !== ''): ?>
                        <iframe
                            src="https://www.youtube.com/embed/<?= esc($videoId, 'attr') ?>?rel=0&amp;modestbranding=1"
                            title="<?= esc($video['title'], 'attr') ?>"
                            class="w-full h-full border-0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center px-4 text-center text-sm text-rosepink-200/70" role="status">
                            Video tidak dapat dimuat karena tautan YouTube tidak valid.
                        </div>
                    <?php endif; ?>
                </div>
                <div class="space-y-1.5">
                    <p class="font-sans text-xs font-medium tracking-wide text-rosepink-200/60"><?= esc($video['date']) ?></p>
                    <h2 class="font-serif text-xl font-semibold text-rosepink-200"><?= esc($video['title']) ?></h2>
                    <p class="font-sans text-sm font-light leading-relaxed text-rosepink-100/70"><?= esc($video['description']) ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?= $this->endSection() ?>
