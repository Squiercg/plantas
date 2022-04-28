<?php

namespace App\Http\Controllers;

use App\Models\Planta;
use Illuminate\Http\Request;

class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $plantas = Planta::latest()->paginate(5);
      
        return view('plantas.index',compact('plantas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Limites do Brasil
        //Latitude 5.251389 -33.7525
        //Longitude -34.88 -73.984444

        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'latitude' => 'required|numeric|between:-33.7525,5.251389,',
            'longitude' => 'required|numeric|between:-73.984444,-34.88,'
        ]);        
      
        Planta::create($request->all());
       
        return redirect()->route('plantas.index')
                        ->with('success','Planta registrada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function show(Planta $planta)
    {
        return view('plantas.show',compact('planta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function edit(Planta $planta)
    {
        return view('plantas.edit',compact('planta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planta $planta)
    {
        //Limites do Brasil
        //Latitude 5.251389 -33.7525
        //Longitude -34.88 -73.984444

        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'latitude' => 'required|numeric|between:-33.7525,5.251389,',
            'longitude' => 'required|numeric|between:-73.984444,-34.88,'
        ]); 
        
        $nome = $planta->getAttributes()['nome'];      
        $planta->update($request->all());
       
        return redirect()->route('plantas.index')
                        ->with('success','Planta '.$nome.' foi alterada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planta $planta)
    {     
        $nome = $planta->getAttributes()['nome'];
        $planta->delete();

       
        return redirect()->route('plantas.index')
                        ->with('success','A planta '.$nome.' foi apagada com sucesso');
    }
}
