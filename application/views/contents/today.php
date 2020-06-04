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

<!-- Grafik -->
<div class="row d-flex justify-content-between mx-0 mt-4 mb-2">
    <div><p class="font-weight-bold mb-0">Grafik</p></div>
</div>
<div class="row mx-n2">
    <div class="w-100 p-2">
        <div class="h-100 col col-12 bg-white p-4 rounded-theme-lg">
            <p class="text-muted">Isi sama grafik yaaa</p>
            <p class="h1">5</p>
            <p class="mb-0">👌 Moderat</p>
        </div>
    </div>
</div>

<!-- Cuaca Hari Ini -->
<div class="row d-flex justify-content-between mx-0 mt-4 mb-2">
    <div><p class="font-weight-bold mb-0">Cuaca Hari Ini</p></div>
</div>
<div class="row mx-n2">
    
    <?php
        $forecasts_12hour = $this->forecasts_12hour;
        for ($row=0; $row<count($forecasts_12hour); $row++) { ?>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 p-2">
                <div class="h-100 col col-12 bg-white p-3 rounded-theme-md">
                    <p class="mb-2 text-center text-muted"><?= $forecasts_12hour[$row]['DateTime'] ?></p>
                    <div class="row justify-content-center">
                        <img src="https://www.accuweather.com/images/weathericons/<?= $forecasts_12hour[$row]['WeatherIcon'] ?>.svg" class="mb-2" width="50" alt="<?= $forecasts_12hour[$row]['IconPhrase']; ?>" />
                    </div>
                    <p class="text-center mb-1"><?= $forecasts_12hour[$row]['IconPhrase']; ?></p>
                    <div class="row mb-1 justify-content-center">
                        <p class="mb-0 mr-1"><?= $forecasts_12hour[$row]['Temperature']['Value']; ?>°C</p>
                        <p class="mb-0 text-muted"><?= $forecasts_12hour[$row]['RealFeelTemperature']['Value'] ?>°C</p>
                    </div>
                    <p class="text-center mb-1"><?= $forecasts_12hour[$row]['Wind']['Direction']['Degrees']; ?> - <?= $forecasts_12hour[$row]['Wind']['Speed']['Value'] ?>km/j</p>
                    <p class="text-center mb-1"><?= $forecasts_12hour[$row]['UVIndex']; ?> (<?= $forecasts_12hour[$row]['UVIndexText'] ?>)</p>
                    <p class="text-center mb-1"><?= $forecasts_12hour[$row]['RelativeHumidity'] ?>%</p>
                </div>
            </div>
            <?php
        }
    ?>
</div>