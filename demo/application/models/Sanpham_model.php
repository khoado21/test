<?php
class Sanpham_model extends MY_Model
{
    /*
     * Get sanpham by MASP
     */
    function get_sanpham($MASP)
    {
        return $this->db->get_where('sanpham',array('MASP'=>$MASP))->row_array();
    }
        
    /*
     * Get all sanpham
     */
    function get_all_sanpham()
    {
        $this->db->order_by('MASP', 'desc');
        return $this->db->get('sanpham')->result_array();
    }
        
    /*
     * function to add new sanpham
     */
    function add_sanpham($params)
    {
        $this->db->insert('sanpham',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update sanpham
     */
    function update_sanpham($MASP,$params)
    {
        $this->db->where('MASP',$MASP);
        return $this->db->update('sanpham',$params);
    }
    
    /*
     * function to delete sanpham
     */
    function delete_sanpham($MASP)
    {
        return $this->db->delete('sanpham',array('MASP'=>$MASP));
    }
}
