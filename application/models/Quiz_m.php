<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_m extends CI_Model {

  private $quiz_easy = 'tbl_quiz_easy';
  private $quiz_average = 'tbl_quiz_average';
  private $quiz_difficult = 'tbl_quiz_difficult';
  

  public function __construct()
  {
    parent::__construct();
  }

  public function get_all_questions($Quiz_Type,$query = null)
  {
    $OtherTable = array();
    $Where = array();
    $OtherTable[] = 'tbl_wordbank';
    if($query != null){
      $this->db->where($query);
    }
    if($Quiz_Type == "Quiz_Easy" || $Quiz_Type == "Test_Easy"){
      $OtherTable[] = $this->quiz_easy;
      $Where[] = 'tbl_quiz_easy.Word_ID = tbl_wordbank.Word_ID';
      return $this->Database_m->Get($this->quiz_easy,$query,null,null,null,null,$OtherTable,$Where);
    } elseif($Quiz_Type == "Quiz_Average" || $Quiz_Type == "Test_Average"){
      $Where[] = 'tbl_quiz_average.Word_ID = tbl_wordbank.Word_ID';
      $OtherTable[] = $this->quiz_average;
      return $this->Database_m->Get($this->quiz_average,$query,null,null,null,null,$OtherTable,$Where);
    } elseif($Quiz_Type == "Quiz_Difficult" || $Quiz_Type == "Test_Difficult"){
      $Where[] = 'tbl_quiz_difficult.Word_ID = tbl_wordbank.Word_ID';
      $OtherTable[] = $this->quiz_difficult;
      return $this->Database_m->Get($this->quiz_difficult,$query,null,null,null,null,$OtherTable,$Where);
    } else{
      return null;
    }
  }

}//END OF CLASS