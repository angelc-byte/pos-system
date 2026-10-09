
<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions needed by all application controllers.
 *
 * Extend this class in new controllers.
 */
abstract class BaseController extends Controller
{
    /**
     * Session service available to controllers extending BaseController.
     *
     * @var \CodeIgniter\Session\Session
     */
    protected $session;

    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        // Load helpers used throughout the application.
        helper(['form', 'url']);

        // Initialize the parent controller.
        parent::initController($request, $response, $logger);

        // Initialize the session service.
        $this->session = service('session');
    }
}
