<?php
class MY_Controller extends CI_Controller
{
   function __construct($private, $allowedrole = -1)
   {
      parent::__construct($private, $allowedrole);
   }
}
