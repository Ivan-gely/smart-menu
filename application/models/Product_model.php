<?

class Product_model extends CI_Model
{
    public function selectbycatname($params)
    {
        $this->db->where('name_cat', $params);
        $query = $this->db->get('category');
        return $query->Row();
    }

    public function insert($params)
    {
        $this->db->insert('product', $params);
    }

    public function selectcatbyestid($params)
    {
        $this->db->select('id');
        $this->db->where('establishment_id', $params);
        $query = $this->db->get('category');
        return $query->result();
    }
    
    public function selectproductbycatid($params)
    {
        $this->db->select('product.id, category_id, name_product, description_product, price_product, name_cat');
        $this->db->from('category');
        $this->db->where('product.category_id = category.id');
        $this->db->where_in('product.category_id', $params);
        $this->db->order_by('category_id', 'ASC');
        $query = $this->db->get('product');
        return $query->result();
    }

    public function selectproductbyid($params){
        $this->db->where('id', $params);
        $query = $this->db->get('product');
        return $query->row();
    }

    public function update_product($params, $params2){
        $this->db->where('id', $params2);
        $this->db->update('product', $params);
    }

    public function delete_product($params){
        $this->db->where('id', $params);
        $this->db->delete('product');
    }
}
