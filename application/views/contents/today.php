<?php
    $forecasts_12hour = $this->forecasts_12hour;
    $currentconditions = $this->currentconditions;
?>

<!-- Data dari sidebar -->
<div class="row mx-n2 d-md-none">
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

<!-- Chart -->
<div class="row mx-n2">
    <div class="w-100 p-2">
        <div class="h-100 col col-12 bg-white p-4 rounded-theme-lg">
            <canvas class="col-12" id="chart" style="width: 100%; height: 300px;"></canvas>
            <?php
                echo "
                    <script>
                        var ctx = document.getElementById('chart');
                        var chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: [";
                                    for ($row=0; $row<count($forecasts_12hour); $row++) {
                                        // Menampilkan hanya data yang memiliki tanggal sekarang
                                        $date_now = date_create(Date('Y-m-d'));
                                        $date_weather = date_create($this->controller->getDate($forecasts_12hour[$row]['DateTime']));
                                        $diff = date_diff($date_now, $date_weather);
                        
                                        if ($diff->format("%R") == "+" && $diff->format("%a") == "0") {
                                            echo "'" . $this->controller->getTime($forecasts_12hour[$row]['DateTime']) . "'" . ",";
                                        }
                                    }
                                    echo "
                                ],
                                datasets: [{
                                    label: 'Suhu hari ini',
                                    fill: false,
                                    data: [";                                       
                                        for ($row=0; $row<count($forecasts_12hour); $row++) {
                                            // Menampilkan hanya data yang memiliki tanggal sekarang
                                            $date_now = date_create(Date('Y-m-d'));
                                            $date_weather = date_create($this->controller->getDate($forecasts_12hour[$row]['DateTime']));
                                            $diff = date_diff($date_now, $date_weather);
                            
                                            if ($diff->format("%R") == "+" && $diff->format("%a") == "0") {
                                                echo $forecasts_12hour[$row]['Temperature']['Value'] . ",";
                                            }
                                        }
                                        echo "
                                    ],
                                    backgroundColor: 'rgba(254, 163, 31, 0.2)',
                                    borderColor: 'rgba(254, 163, 31, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                title: {
                                    display: false,
                                    text: 'Suhu'
                                },
                                tooltips: {
                                    mode: 'nearest',
                                    intersect: false,
                                },
                                hover: {
                                    mode: 'nearest',
                                    intersect: true
                                },
                                scales: {
                                    xAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Waktu'
                                        }
                                    }],
                                    yAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Suhu (°C)'
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                ";
            ?>
        </div>
    </div>
</div>

<!-- Cuaca Hari Ini -->
<div class="row d-flex justify-content-between mx-0 mt-4 mb-2">
    <div><p class="font-weight-bold mb-0">Cuaca Hari Ini</p></div>
</div>
<div class="row mx-n1">
    <div class="row mx-n2">
    
        <?php
            for ($row=0; $row<count($forecasts_12hour); $row++) {
                // Menampilkan hanya data yang memiliki tanggal sekarang
                $date_now = date_create(Date('Y-m-d'));
                $date_weather = date_create($this->controller->getDate($forecasts_12hour[$row]['DateTime']));
                $diff = date_diff($date_now, $date_weather);

                if ($diff->format("%R") == "+" && $diff->format("%a") == "0") { ?>
                    <div class="col-sm-6 p-2">
                        <div class="h-100 col col-12 bg-white p-3 rounded-theme-md">
                            <p class="mb-2 text-center text-muted"><?= $this->controller->getTime($forecasts_12hour[$row]['DateTime']) ?></p>
                            <div class="row justify-content-center">
                                <img src="https://www.accuweather.com/images/weathericons/<?= $forecasts_12hour[$row]['WeatherIcon'] ?>.svg" class="mb-2" width="50" alt="<?= $forecasts_12hour[$row]['IconPhrase'] ?>" />
                            </div>
                            <p class="text-center mb-1"><?= $forecasts_12hour[$row]['IconPhrase'] ?></p>
                            <div class="row mb-1 justify-content-center">
                                <p class="mb-0 mr-1"><?= $forecasts_12hour[$row]['Temperature']['Value'] ?>°C</p>
                                <p class="mb-0 text-muted"><?= $forecasts_12hour[$row]['RealFeelTemperature']['Value'] ?>°C</p>
                            </div>
                            <p class="text-center mb-1"><?= $this->controller->getWindDirection($forecasts_12hour[$row]['Wind']['Direction']['Localized']) ?> - <?= $forecasts_12hour[$row]['Wind']['Speed']['Value'] ?>km/j</p>
                            <p class="text-center mb-1"><?= $forecasts_12hour[$row]['UVIndex']; ?> (<?= $forecasts_12hour[$row]['UVIndexText'] ?>)</p>
                            <p class="text-center mb-1"><?= $forecasts_12hour[$row]['RelativeHumidity'] ?>%</p>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>

    </div>
</div>

<!-- <div class="row mx-n1" style="overflow-x: auto;">
    <div class="row flex-row flex-nowrap mx-n2">
    
        <?php
            for ($row=0; $row<count($forecasts_12hour); $row++) {
                // Menampilkan hanya data yang memiliki tanggal sekarang
                $date_now = date_create(Date('Y-m-d'));
                $date_weather = date_create($this->controller->getDate($forecasts_12hour[$row]['DateTime']));
                $diff = date_diff($date_now, $date_weather);

                if ($diff->format("%R") == "+" && $diff->format("%a") == "0") { ?>
                    <div class="col-xs-8 col-sm-2 p-2">
                        <div class="h-100 col col-12 bg-white p-3 rounded-theme-md">
                            <p class="mb-2 text-center text-muted"><?= $this->controller->getTime($forecasts_12hour[$row]['DateTime']) ?></p>
                            <div class="row justify-content-center">
                                <img src="https://www.accuweather.com/images/weathericons/<?= $forecasts_12hour[$row]['WeatherIcon'] ?>.svg" class="mb-2" width="50" alt="<?= $forecasts_12hour[$row]['IconPhrase'] ?>" />
                            </div>
                            <p class="text-center mb-1"><?= $forecasts_12hour[$row]['IconPhrase'] ?></p>
                            <div class="row mb-1 justify-content-center">
                                <p class="mb-0 mr-1"><?= $forecasts_12hour[$row]['Temperature']['Value'] ?>°C</p>
                                <p class="mb-0 text-muted"><?= $forecasts_12hour[$row]['RealFeelTemperature']['Value'] ?>°C</p>
                            </div>
                            <p class="text-center mb-1"><?= $this->controller->getWindDirection($forecasts_12hour[$row]['Wind']['Direction']['Localized']) ?> - <?= $forecasts_12hour[$row]['Wind']['Speed']['Value'] ?>km/j</p>
                            <p class="text-center mb-1"><?= $forecasts_12hour[$row]['UVIndex']; ?> (<?= $forecasts_12hour[$row]['UVIndexText'] ?>)</p>
                            <p class="text-center mb-1"><?= $forecasts_12hour[$row]['RelativeHumidity'] ?>%</p>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>

    </div>
</div> -->