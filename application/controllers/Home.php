<?php
class Home extends CI_Controller {
    function index() {
        $data = array(
            'title' => 'Cuaca',
            'sidebar' => $this->load->view('components/sidebar', '', true),
            'search_form' => $this->load->view('components/search_form', '', true),
            'content' => $this->load->view('contents/home', '', true),
        );
        $this->load->view('view', $data);
    }

    function today() {
        $data = array(
            'title' => 'Cuaca Hari Ini',
            'sidebar' => $this->load->view('components/sidebar', '', true),
            'search_form' => $this->load->view('components/search_form', '', true),
            'content' => $this->load->view('contents/today', '', true),
        );
        $this->load->view('view', $data);
    }
    
    function search() {
        $keyword = $this->input->get('keyboard');
        $data = array(
            'title' => 'Cuaca Hari Ini',
            'sidebar' => $this->load->view('components/sidebar', '', true),
            'search_form' => $this->load->view('components/search_form', '', true),
            'content' => $this->load->view('contents/search', '', true),
        );
        $this->load->view('view', $data);
    }
}
?>