<?php
class Voucher_model extends MY_Model
{
    /*
     * Get voucher by MAVOUCHER
     */
    function get_voucher($MAVOUCHER)
    {
        return $this->db->get_where('voucher',array('MAVOUCHER'=>$MAVOUCHER))->row_array();
    }
        
    /*
     * Get all voucher
     */
    function get_all_voucher()
    {
        $this->db->order_by('MAVOUCHER', 'desc');
        return $this->db->get('voucher')->result_array();
    }
        
    /*
     * function to add new voucher
     */
    function add_voucher($params)
    {
        $this->db->insert('voucher',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update voucher
     */
    function update_voucher($MAVOUCHER,$params)
    {
        $this->db->where('MAVOUCHER',$MAVOUCHER);
        return $this->db->update('voucher',$params);
    }
    
    /*
     * function to delete voucher
     */
    function delete_voucher($MAVOUCHER)
    {
        return $this->db->delete('voucher',array('MAVOUCHER'=>$MAVOUCHER));
    }
}
