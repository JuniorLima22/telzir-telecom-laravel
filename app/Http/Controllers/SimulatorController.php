<?php

namespace App\Http\Controllers;

use App\Models\CityCode;
use App\Models\CityCodePrice;
use App\Models\Plan;
use Illuminate\Http\Request;

class SimulatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cityCodes = CityCode::all();
        // $cityCodePrices = CityCodePrice::all();
        $plans = Plan::all();

        return view('site.index', compact('cityCodes', 'plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simulator(Request $request)
    {
        $this->validateForm($request);

        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateForm(Request $request)
    {
        return $request->validate(
            [
                'origin'  => 'required|exists:city_codes,code',
                'destiny' => 'required|exists:city_codes,code',
                'minutes' => 'required|integer|max:43800',
                'plan'    => 'required|exists:plans,minutes',
            ],
            [
                'origin.required' => 'Selecione o DDD de origem',
                'origin.exists' => 'DDD de origem informada inválido.',
                'destiny.required' => 'Selecione o DDD de destino',
                'destiny.exists' => 'DDD de Destino informada inválido.',
                'minutes.required' => 'Forneça os minutos da ligação',
                'minutes.integer' => 'O campo minutos da ligação deve ser um número inteiro',
                'minutes.max' => 'O campo minutos da ligação não pode ser mais de 43800 minutos.',
                'plan.required' => 'Selecione um plano',
                'plan.exists' => 'Plano informado inválido.',
            ]
        );
    }
}
