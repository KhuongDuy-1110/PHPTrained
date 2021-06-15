<?php
    class UserController extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('user');
        }
        public function index(){
            $dsach = $this->user->ds_users();
            $data['dsach'] = $dsach;
//            $data['path'] = array('userdetail');

//            $config['base_url'] = 'http://localhost/ci-news/public/UserController/index/';
//            $config['total_rows'] = $this->user->countds();
//            $config['per_page'] = 4;
//            $this->pagination->initialize($config);
//            $data['pag'] = $this->pagination->create_links();

            $limit_per_page = 4;
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $total_records = $this->user->countds();
            if($total_records > 0 ){
                $data["results"] = $this->user->get_current_page_records($limit_per_page, $start_index);

                $config['base_url'] = base_url() . 'UserController/index';
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit_per_page;
                $config["uri_segment"] = 3;

                $config['full_tag_open'] = '<div class="pagination">';
                $config['full_tag_close'] = '</div>';

                $config['num_tag_open'] = '<span class="numlink">';
                $config['num_tag_close'] = '</span>';

                $this->pagination->initialize($config);

                // build paging links
                $data["links"] = $this->pagination->create_links();
            }

            $this->load->view('userdetail',$data);
        }
        public function create(){
            $this->user->createData();
            redirect("UserController");
        }
        public function edit($id){
            $data['row'] = $this->user->ds_users_id($id);
            $this->load->view('editView',$data);
//            $this->user->editData();
//            redirect("UserController");
        }
        public function update($id){
            $this->user->updateData($id);
            redirect("UserController");
        }
        public function delete($id){
            $this->user->deleteData($id);
            redirect("UserController");
        }
    }
?>
