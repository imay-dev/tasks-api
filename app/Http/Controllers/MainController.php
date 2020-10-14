<?php

namespace App\Http\Controllers;


use App\Services\JsonResponseService;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;


/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{

    /**
     * @var JsonResponseService
     */
    protected $response;

    /**
     * MainController constructor.
     */
    public function __construct()
    {
        $this->response = new JsonResponseService;
    }

    /**
     * @return Factory|View
     */
    public function __invoke()
    {
        return view('welcome');
    }

}
