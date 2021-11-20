<?php
 
class Danhmuc_model extends MY_Model
{

    /*
     * Get danhmuc by MADM
     */
    function get_danhmuc($MADM)
    {
        return $this->db->get_where('danhmuc',array('MADM'=>$MADM))->row_array();
    }
        
    /*
     * Get all danhmuc
     */
    function get_all_danhmuc()
    {
        $this->db->order_by('MADM', 'desc');
        return $this->db->get('danhmuc')->result_array();
    }
        
    /*
     * function to add new danhmuc
     */
    function add_danhmuc($params)
    {
        $this->db->insert('danhmuc',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update danhmuc
     */
    function update_danhmuc($MADM,$params)
    {
        $this->db->where('MADM',$MADM);
        return $this->db->update('danhmuc',$params);
    }
    
    /*
     * function to delete danhmuc
     */
    function delete_danhmuc($MADM)
    {
        return $this->db->delete('danhmuc',array('MADM'=>$MADM));
    }
}
