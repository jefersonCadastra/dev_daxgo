<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\BehaviorDateRequest;
use Illuminate\Http\Request;
use App\Services\BehaviorDateService;

class BehaviorDateController extends Controller
{
    private BehaviorDateService $behaviorDateService;

    /**
     * Instance of BehaviorDateController
     *
     * @param BehaviorDateService $behaviorDateService
     *
     * @return void
     */
    public function __construct(BehaviorDateService $behaviorDateService)
    {
        $this->behaviorDateService = $behaviorDateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = $this->behaviorDateService->all();

        return view('painel.behaviordate.index', compact('dates'));
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
     * @param  \IApp\Http\Requests\BehaviorDateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BehaviorDateRequest $request)
    {
        $this->behaviorDateService->create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        $this->behaviorDateService->update($request->all(), $id);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->behaviorDateService->delete($id);

        return back();
    }
}
