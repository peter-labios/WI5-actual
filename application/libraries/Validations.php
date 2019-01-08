<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Validations{
	public static function isComplete($information, $size){
		if(count($information) !== $size){
			return false;
		} else{
			return true;
		}
	}
}