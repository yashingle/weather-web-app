<?php
class WeatherModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        // API keys, each key has quota of 50 requests per day
        $this->apikeys = array(
            'A3IPuPja9VrLrx3jxtdxpABvffcZKNLz',
            'c6myUPul9uLWfQHyijmULMvFX7bKBQDP',
            'wLWtyVi4LKtuT7Gnvn2IcZLPihHSoBr4',
        );

        $this->selected_apikeys_index = 0;
    }

    function setNewApiKey() {
        if (($this->selected_apikeys_index+1) < count($this->apikeys)) {
            $this->selected_apikeys_index++;
            return true;
        } else {
            return false;
        }
    }

    function getDataFromApi($url) {
        $this->selected_apikeys_index = 0;
        // echo "Selected API key: [" . $this->selected_apikeys_index . "]" . $this->apikeys[$this->selected_apikeys_index] . "<br>";
        while (FALSE === ($cuaca_hari_ini = @file_get_contents(str_replace("_____apikey_____", $this->apikeys[$this->selected_apikeys_index], $url)))) {
            // echo "API key limit has been reached." . "<br>";
            // echo "Trying to get new api key." . "<br>";
            
            if (!$this->setNewApiKey()) {
                $this->session->set_userdata('selected_apikey', null);
                return false;
                break;
            }
            // echo "Checking api key: [" . $this->selected_apikeys_index . "]" . $this->apikeys[$this->selected_apikeys_index] . "<br>";
        }
        
        $this->session->set_userdata('selected_apikey', "[" . $this->selected_apikeys_index . "]" . $this->apikeys[$this->selected_apikeys_index]);
        return $cuaca_hari_ini;
    }

    function currentconditions($locationkey) {
        $url = 'http://dataservice.accuweather.com/currentconditions/v1/'.$locationkey.'?apikey=_____apikey_____&language=id&details=true';
        $api = $this->getDataFromApi($url);

        if ($api != false) {
            return json_decode($api, true)[0];
        } else {
            return false;
        }
        
    }
    
    function forecasts_5day($locationkey) {
        $url = 'http://dataservice.accuweather.com/forecasts/v1/daily/5day/'.$locationkey.'?apikey=_____apikey_____&language=id&details=true&metric=true';
        $api = $this->getDataFromApi($url);
        
        if ($api != false) {
            return json_decode($api, true);
        } else {
            return false;
        }
    }
    
    function forecasts_12hour($locationkey) {
        $url = 'http://dataservice.accuweather.com/forecasts/v1/hourly/12hour/'.$locationkey.'?apikey=_____apikey_____&language=id&details=true&metric=true';
        $api = $this->getDataFromApi($url);
        
        if ($api != false) {
            return json_decode($api, true);
        } else {
            return false;
        }
    }

    public function search($keyword) {
        $url = 'http://dataservice.accuweather.com/locations/v1/cities/autocomplete?apikey=_____apikey_____&q='.$keyword.'&language=id';
        $api = $this->getDataFromApi($url);
        
        if ($api != false) {
            return json_decode($api, true);
        } else {
            return false;
        }
    }
}
?>