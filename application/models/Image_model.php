<?

class Image_model extends CI_Model 
{  
    public function selectbyuserid($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('image');
        return $query->row();
    }

    public function update($params, $params2){
        $this->db->where('user_id', $params2);
        $this->db->update('image', $params);
    }

    public function selectimgproduct($params){
        $this->db->where('id', $params);
        $query = $this->db->get('product');
        return $query->row();
    }

    public function updateimgproduct($params, $params2){
        $this->db->where('id', $params2);
        $this->db->update('product', $params);
    }


}