<?php
class WeatherModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        // Load Models
        $apikey1 = 'A3IPuPja9VrLrx3jxtdxpABvffcZKNLz'; // Punya Hary
        $apikey2 = 'c6myUPul9uLWfQHyijmULMvFX7bKBQDP'; // Punya Agri
        $apikey3 = 'wLWtyVi4LKtuT7Gnvn2IcZLPihHSoBr4'; // Punya Hovi
        $this->apikey = $apikey1;
    }

    function currentconditions() {
        $api = file_get_contents('http://dataservice.accuweather.com/currentconditions/v1/686870?apikey='.$this->apikey.'&language=id&details=true');

        if (isset(json_decode($api, true)['Message'])) {
            echo "Limit akses API telah tercapai. Tidak dapat menggunakan aplikasi.";
            echo "<script>alert('<?= json_decode($api, true)['Message'] ?>')</script>";
        }
        
        return json_decode($api, true)[0];
    }
    
    function forecasts_5day() {
        $api = file_get_contents('http://dataservice.accuweather.com/forecasts/v1/daily/5day/686870?apikey='.$this->apikey.'&language=id&details=true&metric=true');
        
        return json_decode($api, true);
    }

    function forecasts_12hour() {
        $api = file_get_contents('http://dataservice.accuweather.com/forecasts/v1/hourly/12hour/686870?apikey='.$this->apikey.'&language=id&details=true&metric=true');
        return json_decode($api, true);
    }

    public function search($keyword) {
        $api = file_get_contents('http://dataservice.accuweather.com/locations/v1/cities/autocomplete?apikey='.$this->apikey.'&q='.$keyword.'&language=id');
        return json_decode($api, TRUE);
    }
}
?>