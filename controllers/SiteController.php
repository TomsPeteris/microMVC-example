<?php

namespace app\controllers;

use tompk\micromvc\Application;
use tompk\micromvc\Controller;
use tompk\micromvc\middlewares\AuthMiddleware;
use tompk\micromvc\Request;
use tompk\micromvc\Response;
use app\models\LoginForm;
use app\models\User;
use app\models\ContactForm;

/**
 * Class SiteController
 *
 * @package app\controllers
 */
class SiteController extends Controller {

    public function __construct() {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function home() {
        return $this->render('home', [
                    'name' => 'Test'
        ]);
    }

    public function login(Request $request) {
        $loginForm = new LoginForm();
        if ($request->getMethod() === 'post') {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
                    'model' => $loginForm
        ]);
    }

    public function register(Request $request) {
        $registerModel = new User();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                return 'Show success page';
            }
        }
        $this->setLayout('auth');
        return $this->render('register', [
                    'model' => $registerModel
        ]);
    }

    public function logout(Request $reqeust, Response $response) {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function contact(Request $request, Response $response) {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
                    'model' => $contact
        ]);
    }

    public function profile() {
        return $this->render('profile');
    }

}
