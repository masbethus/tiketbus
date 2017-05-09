<?php
class Model_operator extends CI_Model{
    
    
    function login($username, $password){
        $check = $this->db->get_where('operator', array('username'=>$username,
                                                        'password'=>  md5($password)));
        if($check->num_rows()>0){
            return 1;
        }  else {
            return 0;
        }
    }
    function tampilkan_data(){
        return $this->db->get('operator');
    }
    function post($data){
        return $this->db->insert('operator',$data);
    }
    function get_one($id){
        $param = array('operator_id'=>$id);
        return $this->db->get_where('operator',$param);
    }
    function edit($data,$id){
        $this->db->where('operator_id',$id);
        $this->db->update('operator',$data);
    }
}