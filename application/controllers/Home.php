<?php
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load Models
        $this->load->model('WeatherModel');
    }

    function index() {
        $this->currentconditions = $this->WeatherModel->currentconditions();
        $this->forecasts_5day = $this->WeatherModel->forecasts_5day();

        $view = array(
            'title' => 'Cuaca',
            'sidebar' => $this->load->view('components/sidebar', '', true),
            'search_form' => $this->load->view('components/search_form', '', true),
            'content' => $this->load->view('contents/home', '', true),
        );
        $this->load->view('view', $view);
    }

    function today() {
        $this->currentconditions = $this->WeatherModel->currentconditions();
        $this->forecasts_12hour = $this->WeatherModel->forecasts_12hour();

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

        $this->currentconditions = $this->WeatherModel->currentconditions();
        $this->search = $this->WeatherModel->search($keyword);

        $view = array(
            'title' => 'Cuaca Hari Ini',
            'sidebar' => $this->load->view('components/sidebar', '', true),
            'search_form' => $this->load->view('components/search_form', '', true),
            'content' => $this->load->view('contents/search', '', true),
        );
        $this->load->view('view', $view);
    }

    function getDay() {
        $hari = date ("D");

        switch($hari){
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
}
?>