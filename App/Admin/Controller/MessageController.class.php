<?php
namespace App\Admin\Controller;

use App\Common\Controller\Controller;
use \Org\Tools\Page;

class MessageControler extends Controller
{
    public function add()
    {
        include $this->display();
    }
}
