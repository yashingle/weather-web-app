<!-- Data dari sidebar -->
<div class="row mx-n2 d-md-none">
    <?php
        $currentconditions = $this->currentconditions;
    ?>
    <div class="col-sm-12 p-2">
        <div class="row h-100 bg-white m-0 p-3 rounded-theme-md justify-content-between">
            <div class="col align-self-center">
                <p class="m-0 display-4"><?= $currentconditions['Temperature']['Metric']['Value'] ?>°C</p>
                <p class="m-0">Cimahi<span class="text-muted"> · <?= $this->time ?></span> <small class="text-muted"><i class="fa fa-info-circle fa text-sm-left" data-toggle="tooltip" data-placement="bottom" title="Waktu setempat. Data ditampilkan per 5 menit."></i></small></p>
            </div>
            <div class="m-0 align-self-center">
                <div class="col m-0">
                    <img src="https://www.accuweather.com/images/weathericons/<?= $currentconditions['WeatherIcon'] ?>.svg" class="" height="80" alt="<?= $currentconditions['WeatherText'] ?>" />
                    <p class="m-0 mt-1 text-center"><?= $currentconditions['WeatherText'] ?></p>
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
            <a href="<?= site_url('home/setLocation') . '/' . $search[$row]['Key'] . '/' . $search[$row]['LocalizedName'] ?>" class="list-group-item list-group-item-action col h-100 col-12 bg-white mb-3 m-0 py-3 px-4 border-0 rounded-theme-md">
                <p class="h5 mb-0"><?= $search[$row]['LocalizedName'] ?></p>
                <p class="mb-0 text-muted"><?= $search[$row]['AdministrativeArea']['LocalizedName'] ?>, <?= $search[$row]['Country']['LocalizedName'] ?></p>
            </a>
            <?php
        }
    ?>
</div>