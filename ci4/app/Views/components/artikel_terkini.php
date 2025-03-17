<ul>
    <?php if (!empty($artikel)): ?>
        <?php foreach ($artikel as $item): ?>
            <li>
                <a href="<?= base_url('artikel/' . $item['slug']) ?>">
                    <?= $item['judul'] ?>
                </a><br>
                <small><?= date('d M Y, H:i', strtotime($item['created_at'])) ?></small>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>Tidak ada artikel tersedia.</li>
    <?php endif; ?>
</ul>
