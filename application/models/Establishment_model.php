<?

class Establishment_model extends CI_Model 
{  
    public function selectbyuserid($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('establishment');
        return $query->row();
    }

    public function update($params, $params2){
        $this->db->where('user_id', $params2);
        $this->db->update('establishment', $params);
    }

    public function insert($params){
        $this->db->insert('establishment', $params);
    }
}