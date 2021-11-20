<?php
 
class Contact_model extends MY_Model
{
   
    /*
     * Get contact by MALH
     */
    function get_contact($MALH)
    {
        return $this->db->get_where('contact',array('MALH'=>$MALH))->row_array();
    }
        
    /*
     * Get all contact
     */
    function get_all_contact()
    {
        $this->db->order_by('MALH', 'desc');
        return $this->db->get('contact')->result_array();
    }
        
    /*
     * function to add new contact
     */
    function add_contact($params)
    {
        $this->db->insert('contact',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update contact
     */
    function update_contact($MALH,$params)
    {
        $this->db->where('MALH',$MALH);
        return $this->db->update('contact',$params);
    }
    
    /*
     * function to delete contact
     */
    function delete_contact($MALH)
    {
        return $this->db->delete('contact',array('MALH'=>$MALH));
    }
}
