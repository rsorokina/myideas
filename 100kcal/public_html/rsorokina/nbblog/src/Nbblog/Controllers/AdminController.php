<?php

/**
 * @author admin
 * @copyright 2017
 */

namespace Rsorokina\Nbblog;
use Illuminate\Routing\Controller;

class AdminController extends Controller {

        public function index()
        {
            return 'Posts list';
        }
}