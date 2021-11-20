<?php

 
class Donhang_model extends MY_Model
{
    /*
     * Get donhang by MADONHANG
     */
    function get_donhang($MADONHANG)
    {
        return $this->db->get_where('donhang',array('MADONHANG'=>$MADONHANG))->row_array();
    }
        
    /*
     * Get all donhang
     */
    function get_all_donhang()
    {
        $this->db->order_by('MADONHANG', 'desc');
        return $this->db->get('donhang')->result_array();
    }
        
    /*
     * function to add new donhang
     */
    function add_donhang($params)
    {
        $this->db->insert('donhang',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update donhang
     */
    function update_donhang($MADONHANG,$params)
    {
        $this->db->where('MADONHANG',$MADONHANG);
        return $this->db->update('donhang',$params);
    }
    
    /*
     * function to delete donhang
     */
    function delete_donhang($MADONHANG)
    {
        return $this->db->delete('donhang',array('MADONHANG'=>$MADONHANG));
    }
}
