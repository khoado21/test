<?php
class Thuonghieu_model extends MY_Model
{
    /*
     * Get thuonghieu by MATHUONGHIEU
     */
    function get_thuonghieu($MATHUONGHIEU)
    {
        return $this->db->get_where('thuonghieu',array('MATHUONGHIEU'=>$MATHUONGHIEU))->row_array();
    }
        
    /*
     * Get all thuonghieu
     */
    function get_all_thuonghieu()
    {
        $this->db->order_by('MATHUONGHIEU', 'desc');
        return $this->db->get('thuonghieu')->result_array();
    }
        
    /*
     * function to add new thuonghieu
     */
    function add_thuonghieu($params)
    {
        $this->db->insert('thuonghieu',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update thuonghieu
     */
    function update_thuonghieu($MATHUONGHIEU,$params)
    {
        $this->db->where('MATHUONGHIEU',$MATHUONGHIEU);
        return $this->db->update('thuonghieu',$params);
    }
    
    /*
     * function to delete thuonghieu
     */
    function delete_thuonghieu($MATHUONGHIEU)
    {
        return $this->db->delete('thuonghieu',array('MATHUONGHIEU'=>$MATHUONGHIEU));
    }
}
