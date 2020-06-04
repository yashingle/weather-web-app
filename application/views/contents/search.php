<div class="row mx-n2">
    <!-- Data dari sidebar -->
    <div class="col-sm-12 p-2 d-md-none">
        <div class="row h-100 bg-white m-0 p-3 rounded-theme-md justify-content-between">
            <div class="col align-self-center">
                <p class="m-0 display-4">29°C</p>
                <p class="m-0">Bandung <span class="text-muted">· Senin, 12.00</span></p>
            </div>
            <div class="m-0 align-self-center">
                <div class="col m-0">
                    <img src="https://www.accuweather.com/images/weathericons/14.svg" class="" height="80" alt="Ikon jenis cuaca" />
                    <p class="m-0 mt-1 text-center">Badai petir</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hasil Pencarian -->
<div class="row d-flex justify-content-between mx-0 mt-4 mb-2">
    <div><p class="font-weight-bold mb-0">Hasil Pencarian</p></div>
</div>
<div class="list-group">
    <?php
        $search = $this->search;
        for ($row=0; $row<count($search); $row++) { ?>
            <a href="<?= $search[$row]['Key'] ?>" class="list-group-item list-group-item-action col h-100 col-12 bg-white mb-3 m-0 py-3 px-4 border-0 rounded-theme-md">
                <p class="h5 mb-0"><?= $search[$row]['LocalizedName'] ?></p>
                <p class="mb-0 text-muted"><?= $search[$row]['AdministrativeArea']['LocalizedName'] ?>, <?= $search[$row]['Country']['LocalizedName'] ?></p>
            </a>
            <?php
        }
    ?>
</div>