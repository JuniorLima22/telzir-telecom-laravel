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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cityCodes = CityCode::all();
        $plans = Plan::all();

        $normalPlanCalculation = 0.0;
        $talkMoreCalculation = 0.0;

        return view('site.index', compact('cityCodes', 'plans', 'talkMoreCalculation', 'normalPlanCalculation', 'request'));
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

        $cityCodes = CityCode::all();
        $plans = Plan::all();

        $valueOriginDestination = $this->valueOriginDestination($request);
        $normalPlanCalculation = $this->normalPlanCalculation($request);
        $talkMoreCalculation = $this->talkMoreCalculation($request);
        session()->flash('modal', true);

        return view('site.index', compact('cityCodes', 'plans', 'talkMoreCalculation', 'normalPlanCalculation', 'request'));
    }
    
    /**
     * Method responsible for verifying the value of the flat rate
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Float
     */
    private function valueOriginDestination($request)
    {
        $cityCodePrices = CityCodePrice::all();

        foreach ($cityCodePrices as $value) {
            if ($request->origin === $value->origin && $request->destination === $value->destination) {
                return $value->price;
            }
        }
    }

    /**
     * Method responsible for verifying the value of the normal plan rate
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Float
     */
    private function normalPlanCalculation($request)
    {
        return $request->minutes * $this->valueOriginDestination($request);
    }

    /**
     * Method responsible for verifying the value of the FaleMais plan rate
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Float
     */
    private function talkMoreCalculation($request)
    {
        if ($request->minutes <= $request->plan) {
            return 0.0;
        }else{
            $surplusMinutes = $request->minutes - $request->plan;
            $valueOriginDestination = $this->valueOriginDestination($request);
            $percentage = ($valueOriginDestination * 10) / 100;
            $addition = $valueOriginDestination + $percentage;
            return $surplusMinutes * $addition;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function validateForm(Request $request)
    {
        return $request->validate(
            [
                'origin'  => 'required|exists:city_codes,code',
                'destination' => 'required|exists:city_codes,code',
                'minutes' => 'required|integer|max:43800',
                'plan'    => 'required|exists:plans,minutes',
            ],
            [
                'origin.required' => 'Selecione o DDD de origem',
                'origin.exists' => 'DDD de origem informada inválido.',
                'destination.required' => 'Selecione o DDD de destino',
                'destination.exists' => 'DDD de Destino informada inválido.',
                'minutes.required' => 'Forneça os minutos da ligação',
                'minutes.integer' => 'O campo minutos da ligação deve ser um número inteiro',
                'minutes.max' => 'O campo minutos da ligação não pode ser mais de 43800 minutos.',
                'plan.required' => 'Selecione um plano',
                'plan.exists' => 'Plano informado inválido.',
            ]
        );
    }
}
