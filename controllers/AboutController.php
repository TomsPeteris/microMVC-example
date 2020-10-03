<?php

namespace app\controllers;

use tompk\micromvc\Controller;

/**
 * Class AboutController
 *
 * @package app\controllers
 */
class AboutController extends Controller
{
    public function index()
    {
        return $this->render('about');
    }
}