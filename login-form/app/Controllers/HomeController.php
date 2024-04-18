<?php

namespace App\Controllers;

use Framework\Database;

class HomeController
{

  public function index()
  {
    loadView('home');
  }
}
