<?php
    $currentconditions = $this->currentconditions;
?>
<!-- Sidebar -->
<div id="sidebar-wrapper">
    <div class="container-fluid px-3">
        <p class="h2 mt-4">Cimahi</p>
        <p><span>Senin,</span> <span class="text-muted"><?= $currentconditions['LocalObservationDateTime'] ?></span></p>
        
        <div class="row justify-content-center">
            <img src="https://www.accuweather.com/images/weathericons/<?= $currentconditions['WeatherIcon'] ?>.svg" class="my-4 mx-3" width="150" alt="<?= $currentconditions['WeatherText'] ?>" />
        </div>

        <p class="h1 mb-3"><?= $currentconditions['Temperature']['Metric']['Value'] ?>°C</p>
        <p><!-- 🌩  --><?= $currentconditions['WeatherText'] ?></p>
    </div>
</div>
<!-- /#sidebar-wrapper -->