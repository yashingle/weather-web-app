<?php
class WeatherModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        // API keys, each key has 50 request quota per day
        $apikey1 = 'A3IPuPja9VrLrx3jxtdxpABvffcZKNLz'; // Punya Hary
        $apikey2 = 'c6myUPul9uLWfQHyijmULMvFX7bKBQDP'; // Punya Agri
        $apikey3 = 'wLWtyVi4LKtuT7Gnvn2IcZLPihHSoBr4'; // Punya Hovi
        $this->apikey = $apikey1;
    }

    function currentconditions($locationkey) {
        $url = 'http://dataservice.accuweather.com/currentconditions/v1/'.$locationkey.'?apikey='.$this->apikey.'&language=id&details=true';
        $api = file_get_contents($this->checkApiLimit($url));
        
        return json_decode($api, true)[0];
    }
    
    function forecasts_5day($locationkey) {
        $url = 'http://dataservice.accuweather.com/forecasts/v1/daily/5day/'.$locationkey.'?apikey='.$this->apikey.'&language=id&details=true&metric=true';
        $api = file_get_contents($this->checkApiLimit($url));
        
        return json_decode($api, true);
    }

    function forecasts_12hour($locationkey) {
        $url = 'http://dataservice.accuweather.com/forecasts/v1/hourly/12hour/'.$locationkey.'?apikey='.$this->apikey.'&language=id&details=true&metric=true';
        $api = file_get_contents($this->checkApiLimit($url));

        return json_decode($api, true);
    }

    public function search($keyword) {
        $url = 'http://dataservice.accuweather.com/locations/v1/cities/autocomplete?apikey='.$this->apikey.'&q='.$keyword.'&language=id';
        $api = file_get_contents($this->checkApiLimit($url));

        return json_decode($api, TRUE);
    }

    function checkApiLimit($url) {
        /* if (get_headers($url)[0] == 'HTTP/1.1 503 Unauthorized')
            exit('<p>⛔ Limit akses API telah tercapai. Tidak dapat menggunakan aplikasi. Kami menggunakan API dengan paket gratis yang mana aksesnya dibatas yaitu 50 request perhari. Mohon akses dihari lain. Mohon maaf atas ketidaknyamanannya.</p>');
        else */
            return $url;
        
        /* try {
            file_get_contents($url);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }

        return $url; */
    }
}

/* 
Next work:
Make API key auto switcher
*/
?>