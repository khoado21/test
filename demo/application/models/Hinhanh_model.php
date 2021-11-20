<?php
class Hinhanh_model extends MY_Model
{
    /*
     * Get hinhanh by MAANH
     */
    function get_hinhanh($MAANH)
    {
        return $this->db->get_where('hinhanh',array('MAANH'=>$MAANH))->row_array();
    }
        
    /*
     * Get all hinhanh
     */
    function get_all_hinhanh()
    {
        $this->db->order_by('MAANH', 'desc');
        return $this->db->get('hinhanh')->result_array();
    }
        
    /*
     * function to add new hinhanh
     */
    function add_hinhanh($params)
    {
        $this->db->insert('hinhanh',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update hinhanh
     */
    function update_hinhanh($MAANH,$params)
    {
        $this->db->where('MAANH',$MAANH);
        return $this->db->update('hinhanh',$params);
    }
    
    /*
     * function to delete hinhanh
     */
    function delete_hinhanh($MAANH)
    {
        return $this->db->delete('hinhanh',array('MAANH'=>$MAANH));
    }
}
