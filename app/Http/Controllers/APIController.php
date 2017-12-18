<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Models\Set;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

    public function getCustomers()
    {
        $query = Customer::select('first_name', 'last_name', 'email');
        return datatables($query)->make(true);
    }
    public function getSets()
    {
        $query = Set::select('id', 'name', 'description','created_at');
        return datatables($query)->make(true);
    }

}
