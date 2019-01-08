<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_m extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function Check($Table,$where_Query = null)
  {
    $query = $this->db->select('*')->from($Table)->where($where_Query)->get();
    $size = $query->num_rows();
    if($size>0){
      return true;
    }
    else{
      return false;
    }
  }

  public function Get($Table,$where_Query = null,$GroupBy=null,$OrderBy=null,$Limit=null,$SpecificData=null,$OtherTable=null,$Where=null)
  {
    $result;
    if($SpecificData !== null)
      $this->db->select($SpecificData);
    else
      $this->db->select('*');
    if($OtherTable !== null) {
      foreach ($OtherTable as $pTable) {
        $this->db->from($pTable);
      }
    } else {
      $this->db->from($Table);
    }

    //where
    if($where_Query !== null)
      $this->db->where($where_Query);
    if($Where !== null){
      foreach ($Where as $value) {
        $this->db->where($value);
      }
    }
    
    //group by
    if($GroupBy !== null)
      $this->db->group_by($GroupBy);
    //order group_by 
    if($OrderBy !== null)
      $this->db->order_by($OrderBy,'desc');
    // //limit
    
    if($Limit !== null)
      $result = $this->db->limit($Limit);
    $result = $this->db->get();
    
    return $result->result();
  }

  public function Insert($Table,$data)
  {
    $this->db->insert($Table,$data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function Batch_Insertion($Table,$data){
    $this->db->insert_batch($Table,$data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function Update($Table, $data, $where_Query=null){
    if($where_Query !== null)
      $this->db->where($where_Query);
    $this->db->update($Table,$data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function GET_With_Query($query){
    $result = $this->db->query($query);
    return $result->result();
  }

}//END OF CLASS