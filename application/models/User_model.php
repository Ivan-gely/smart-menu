<?

class User_model extends CI_Model 
{
    public function insert($params){
        $this->db->insert('user', $params);
    }

    public function selectuserbyemail($param){
        $this->db->where('email', $param);
        $query = $this->db->get('user');
        return $query->row();
    }
    
}