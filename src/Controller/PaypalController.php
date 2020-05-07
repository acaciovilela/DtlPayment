<?php

namespace DtlPayment\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class PaypalController extends AbstractActionController {

    public function indexAction() {
        return new ViewModel();
    }

    public function oauthAction() {
        
        return new ViewModel();
    }
}
