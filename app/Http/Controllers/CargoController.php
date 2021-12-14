<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargoRequest;
use Illuminate\Http\Request;
use App\Models\ModelCargo;
use App\User;

class CargoController extends Controller
{
    private $objUser;
    private $objCargo;

    public function __construct()
    {

        $this->objUser=new User();
        $this->objCargo=new ModelCargo();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargo=$this->objCargo->all();
        return view('index', compact('cargo'));
        //dd($this->objUser->find(1)->relCargos());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users=$this->objUser->all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargoRequest $request)
    {
        $cad=$this->objCargo->create([

            'title'=>$request->title,
            'id_user'=>$request->id_user,
            'servico'=>$request->servico,
            'salario'=>$request->salario


        ]);
        if($cad){

            return redirect('cargos');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cargo=$this->objCargo->find($id);
        return view('show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargo=$this->objCargo->find($id);
        $users=$this->objUser->all();
        return view('create', compact('cargo','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CargoRequest $request, $id)
    {
        $this->objCargo->where(['id'=>$id])->update([

            'title'=>$request->title,
            'id_user'=>$request->id_user,
            'servico'=>$request->servico,
            'salario'=>$request->salario

        ]);
        return redirect('cargos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->objCargo->destroy($id);
    }
}
