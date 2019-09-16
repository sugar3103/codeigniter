<?php 
    class LinkPage extends CI_Controller {
        public function view($page = 'bootstrap'){
            if(!file_exists(APPPATH.'views/css/'.$page.'.php')){
                show_404();
                echo "can't find bootstrap page";
            } 
            $data['title'] = ucfirst($page);
            
            // This helper is for get the base url of page
            // use it by echo base_url()
            // $this->load->helper('url');
            
            $this->load->view('css/'.$page);
            

            // $this->load->view('templates/header/index.php');
            // $this->load->view('pages/'.$page.'/index', $data);
            // $this->load->view('templates/footer/index.php');
        }
    }
?>