<?php
Class Common extends CI_Model
{
    //This function get all records from table by name
    function getallrecordbytablename($tablename,$data,$limit = '', $offset = '', $sortby = '', $orderby = '',$conditionarray='')
    {
        
        $this->db->order_by($sortby,$orderby);
		
        //Setting Limit for Paging
        if( $limit != '' && $offset == 0)
        { $this->db->limit($limit); }
        else if( $limit != '' && $offset != 0)
        {	$this->db->limit($limit, $offset);	}

        //Executing Query
        $this->db->select($data);
        $this->db->from($tablename);
        if($conditionarray!='')
        {
        $this->db->where($conditionarray);
        }
        $query =  $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
        
    }
    
    // insert database
    function insert_data($data,$tablename)
    {
        if($this->db->insert($tablename,$data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // insert database return id
    function insert_data_getid($data,$tablename)
    {
        if($this->db->insert($tablename,$data))
        {
            return $this->db->insert_id();
        }
        else
        {
            return false;
        }
    }
    
    // update database
    function update_data($data,$tablename,$columnname,$columnid)
    {
        $this->db->where($columnname,$columnid);
        if($this->db->update($tablename,$data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // select data using colum id
   function select_database_id($tablename,$columnname,$columnid,$data='*',$condition_array=array())
    {
        $this->db->select($data);
        $this->db->where($columnname,$columnid);
        if(!empty($condition_array)){
            $this->db->where($condition_array);
        }
        $query = $this->db->get($tablename);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }
    // select data using colum id
   function get_doctor_staff_data($doctorid)
    {
        $this->db->select('staff_type.staffname');
        $this->db->from('doctor_staff_type');
        $this->db->join('doctors', 'doctors.doctorid = doctor_staff_type.doctorid');
        $this->db->join('staff_type', 'staff_type.staffid = doctor_staff_type.staffid');
        $this->db->where('doctor_staff_type.doctorid',$doctorid);

        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }
   function get_banner_data($tablename,$columnname,$columnid,$data='*',$condition_array=array())
    {
        $this->db->select($data);
        $this->db->where($tablename.'.'.$columnname,$columnid);
        if(!empty($condition_array)){
            $this->db->where($condition_array);
        }
        $query = $this->db->get($tablename);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }

    // delete data
    function delete_data($tablename,$columnname,$columnid)
    {
        $this->db->where($columnname,$columnid);
        if($this->db->delete($tablename))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // change status
    function change_status($data,$tablename,$columnname,$columnid)
    {
        $this->db->where($columnname,$columnid);
        if($this->db->update($tablename,$data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //get all record 
     function get_all_record($tablename,$data='*',$sortby='',$orderby='')
    {
        $this->db->select($data);
        $this->db->from($tablename);
        //$this->db->where('status','Enable');
        if($sortby != '' && $orderby != "")
        {
            $this->db->order_by($sortby,$orderby);
        }
        $query = $this->db->get();
        if($query ->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }
    
    //table records count
    function get_count_of_table($table)
    {
        $query = $this->db->count_all($table);
        return $query;
    }
    
     

        //seo - url
    
    function create_unique_url($string,$table,$field,$key=NULL,$value=NULL)
{
    $t =& get_instance();
    $slug = url_title($string);
    $slug = strtolower($slug);
    $i = 0;
    $params = array ();
    $params[$field] = $slug;
 
    if($key)$params["$key !="] = $value;
 
    while ($t->db->where($params)->get($table)->num_rows())
    {  
        if (!preg_match ('/-{1}[0-9]+$/', $slug ))
            $slug .= '-' . ++$i;
        else
            $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
         
        $params [$field] = $slug;
    }  
    return $slug;  
}
      
   public function get_staff_type()
   {
       $this->db->select('staffid,staffname');
       $query = $this->db->get('staff_type');
       if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
   }
}