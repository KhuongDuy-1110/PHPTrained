<?php
    class user extends CI_Model{
        public function ds_users(){
            $query = $this->db->get('users');
//            query('select * from users order by id desc limit 4');
            if($query->num_rows()>0)
                return $query->result_array();
            return false;
        }
        public function countds(){
            return $this->db->count_all('users');
        }
        public function ds_users_id($id){
            $query = $this->db->get_where('users',array('id'=>$id));
//            query('select * from users where $id = ?',array($id));
            if($query->num_rows()>0)
                return $query->row();
            return false;
        }
        public function get_current_page_records($limit, $start)
        {
            $this->db->limit($limit, $start);
            $query = $this->db->get("users");

            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {
                    $data[] = $row;
                }

                return $data;
            }

            return false;
        }
        public function createData(){
            $data = array(
                'name' => $this->input->post('fullname'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
            );
            $this->db->insert('users',$data);
        }
        public function updateData($id){
            if(isset($_POST["password"])&&$_POST["password"]==''){
                $data = array(
                    'name' => $this->input->post('fullname'),
                );
                $this->db->where('id', $id);
                $this->db->update('users',$data);
            } else if (isset($_POST["password"]) && $_POST["password"] != '') {
                $data = array(
                    'name' => $this->input->post('fullname'),

                    'password' => md5($this->input->post('password')),

                );

                $this->db->where('id', $id);
                $this->db->update('users', $data);
            }

        }
        public function deleteData($id){
            $this->db->delete('users',array('id' => $id));
        }
    }
?>
