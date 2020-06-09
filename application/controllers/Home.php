<?php
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load Models
        $this->load->model('WeatherModel');

        // Default location
        $this->default_locationkey = '686870';
        $this->default_localizedname = 'Cimahi';

        // Check if the location is set
        if (!$this->issetLocation()) { // If it is not, set location to default
            $this->setLocation($this->default_locationkey, $this->default_localizedname, false);
        }
    }

    function issetLocation() {
        if ($this->session->has_userdata('location_key') && $this->session->has_userdata('location_localized_name')) {
            return true;
        } else {
            return false;
        }
    }

    function setLocation($key = null, $localized_name = null, $is_redirect = true) {
        $location_key = $key ?? $this->input->get('key'); // Location key
        $location_localized_name = $localized_name ?? $this->input->get('localized_name'); // Location name
        
        $this->session->set_userdata(
            array(
                'location_key' => $location_key,
                'location_localized_name' => urldecode($location_localized_name),
            )
        );

        if ($is_redirect) {
            // Go to index()
            redirect(site_url('home'));
        }
    }

    function index() {
        session_start();
        /* $url = 'http://dataservice.accuweather.com/currentconditions/v1/686870?apikey=A3IPuPja9VrLrx3jxtdxpABvffcZKNLz&language=id&details=true';

        var_dump(get_headers($url)[0]);
        json_decode(get_headers($url), true); */
        /* $this->location_key = $this->session->location_key;
        $this->location_localized_name = $this->session->location_localized_name;

        $this->currentconditions = $this->WeatherModel->currentconditions($this->location_key);
        $this->forecasts_5day = $this->WeatherModel->forecasts_5day($this->location_key);
        
        $this->controller = $this;
        $this->date = $this->getDate($this->currentconditions['LocalObservationDateTime']);
        $this->time = $this->getTime($this->currentconditions['LocalObservationDateTime']);
        $this->day = $this->getDay($this->date);
        $this->wind_direction = $this->getWindDirection($this->currentconditions['Wind']['Direction']['Localized']);

        $view = array(
            'title' => 'Cuaca',
            'sidebar' => $this->load->view('components/sidebar', '', true),
            'search_form' => $this->load->view('components/search_form', '', true),
            'content' => $this->load->view('contents/home', '', true),
        );
        $this->load->view('view', $view); */
        
        echo "Current location: " . $this->session->location_localized_name . "<br>";
        $this->session->set_userdata('location_localized_name', 'Jakarta');
        echo "Location after changed: " . $this->session->location_localized_name . "<br>";
    }

    function today() {
        $this->location_key = $this->session->location_key;
        $this->location_localized_name = $this->session->location_localized_name;

        $this->currentconditions = $this->WeatherModel->currentconditions($this->location_key);
        $this->forecasts_12hour = $this->WeatherModel->forecasts_12hour($this->location_key);
        
        $this->controller = $this;
        $this->date = $this->getDate($this->currentconditions['LocalObservationDateTime']);
        $this->time = $this->getTime($this->currentconditions['LocalObservationDateTime']);
        $this->day = $this->getDay($this->date);
        $this->wind_direction = $this->getWindDirection($this->currentconditions['Wind']['Direction']['Localized']);

        $view = array(
            'title' => 'Cuaca Hari Ini',
            'sidebar' => $this->load->view('components/sidebar', '', true),
            'search_form' => $this->load->view('components/search_form', '', true),
            'content' => $this->load->view('contents/today', '', true),
        );
        $this->load->view('view', $view);
    }
    
    function search() {
        $keyword = $this->input->get('keyword');

        $this->location_key = $this->session->location_key;
        $this->location_localized_name = $this->session->location_localized_name;

        $this->currentconditions = $this->WeatherModel->currentconditions($this->location_key);
        $this->search = $this->WeatherModel->search($keyword);
        
        $this->controller = $this;
        $this->date = $this->getDate($this->currentconditions['LocalObservationDateTime']);
        $this->time = $this->getTime($this->currentconditions['LocalObservationDateTime']);
        $this->day = $this->getDay($this->date);
        $this->wind_direction = $this->getWindDirection($this->currentconditions['Wind']['Direction']['Localized']);

        $view = array(
            'title' => 'Cuaca Hari Ini',
            'sidebar' => $this->load->view('components/sidebar', '', true),
            'search_form' => $this->load->view('components/search_form', '', true),
            'content' => $this->load->view('contents/search', '', true),
        );
        $this->load->view('view', $view);
    }

    function getDate($waktu) {
        $hasil = '';
        for($i = 0; $i <= 9; $i++){
            $hasil .= $waktu[$i];
        }
        return $hasil;
    }
    
    function getTime($waktu) {
        $hasil = '';
        for($i = 11; $i <= 15; $i++){
            $hasil .= $waktu[$i];
        }
        return $hasil;
    }

    function getDay($date) {
        $day = date('D', strtotime($date));

        switch($day) {
            case 'Sun':
                return "Minggu";
                break;
            case 'Mon':			
                return "Senin";
                break;
            case 'Tue':
                return "Selasa";
                break;
            case 'Wed':
                return "Rabu";
                break;
            case 'Thu':
                return "Kamis";
                break;
            case 'Fri':
                return "Jumat";
                break;
            case 'Sat':
                return "Sabtu";
                break;
            default:
                return "Tidak diketahui";		
                break;
        }
    }

    function beautifyDate($date) {
        return date('j M Y', strtotime($date));
    }
    
    function getWindDirection($direction) {
        if($direction == "U")
            return "Utara";
        else if($direction == "UTL")
            return "Utara Timur Laut";
        else if($direction == "TL")
            return "Timur Laut";
        else if($direction == "TTL")
            return "Timur-Timur Laut";
        else if($direction == "T")
            return "Timur";
        else if($direction == "TTG")
            return "Timur Tenggara";
        else if($direction == "TG")
            return "Tenggara";
        else if($direction == "STG")
            return "Selatan Tenggara";
        else if($direction == "S")
            return "Selatan";
        else if($direction == "SBD")
            return "Selatan Barat Daya";
        else if($direction == "BD")
            return "Barat Daya";
        else if($direction == "BBD")
            return "Barat-Barat Daya";
        else if($direction == "B")
            return "Barat";
        else if($direction == "BBL")
            return "Barat-Barat Laut";
        else if($direction == "BL")
            return "Barat Laut";
        else if($direction == "UBL")
            return "Utara Barat Laut";
        else
            return "Arah angin tidak diketahui" ;
    }

}
?>