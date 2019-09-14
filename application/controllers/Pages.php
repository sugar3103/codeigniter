<?php 
    class Pages extends CI_Controller {
        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'/index.php')){
                show_404();
            }
            $data['title'] = ucfirst($page);

            $this->load->view('templates/header/index.php');
            $this->load->view('pages/'.$page.'/index', $data);
            $this->load->view('templates/footer/index.php');
        }
    }
?>