<?

class Category_model extends CI_Model 
{  
    public function insert($params){
        $this->db->insert('category', $params);
    }
    
    public function selectestbyid($params){
        $this->db->where('establishment_id', $params);
        $query = $this->db->get('category');
        return $query->Result();
    }

    public function selectcatbyid($params){
        $this->db->where('id', $params);
        $query = $this->db->get('category');
        return $query->row();
    }

    public function update_cat($params, $params2){
        $this->db->where('id', $params2);
        $this->db->update('category', $params);
    }

    public function delete_cat($params){
        $this->db->where('id', $params);
        $this->db->delete('category');
    }

    public function delete_productcat($params){
        $this->db->where('category_id', $params);
        $this->db->delete('product');
    }
    

    

}