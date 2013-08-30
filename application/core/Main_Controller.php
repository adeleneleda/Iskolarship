<?php
class Main_Controller extends MY_Controller 
{
   function __construct($private, $allowedrole = -1)
   {
      parent::__construct($private, $allowedrole);
   }   
}
