<?php
function indo_date_format($time): string
{
    $month = array(
        1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );
    $time_array = explode('-', $time);
    return $time_array[2] . ' ' . $month[(int)$time_array[1]] . ', ' . $time_array[0];
}
?>

<div class="container py-5">
    <!-- <?= var_dump($data['data_video_streaming']); ?> -->
    <div class="row mt-3">
        <?php foreach ($data['data_video_streaming'] as $key => $dvs) : ?>
            <div class="col-md-4">
                <a href="<?= BASEURL; ?>/video/detail/<?= $dvs['id'] ?>" class="text-decoration-none text-dark">
                    <img src="<?= BASEURL; ?>/img/<?= $dvs["cover"] ?? 'attack-on-titan.jpg'; ?>" alt="" width="300"><br>
                    <?= $dvs['title']; ?>
                </a>
                <p><?= indo_date_format($dvs['vid_release']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>