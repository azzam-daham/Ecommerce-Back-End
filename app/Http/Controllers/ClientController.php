<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ClientRecource;
use App\Http\Requests\Clients\PostClientRequest;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();

        return ClientRecource::collection($clients);
    }

    public function store(PostClientRequest $request){
        $data = $request;
        $client = Client::create([
            "name"=>$data->name,
            "mobile"=>$data->mobile,
            "address"=>$data->address,
            "email"=>$data->email,
        ]);
        
        return ClientRecource::make($client);
    }

    public function show($id){
        $client = Client::find($id);
        
        return ClientRecource::make($client);
    }
}
