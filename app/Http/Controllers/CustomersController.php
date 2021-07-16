<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Laravel\Jetstream\Jetstream;

class CustomersController extends Controller
{
    /**
     * Display a listing of the customers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        // Get all customers for owner user
        return Jetstream::inertia()->render($request, 'Customers/Index', [
           'customers' => $request->user()->getUserCustomers(),
        ]);
    }
}
