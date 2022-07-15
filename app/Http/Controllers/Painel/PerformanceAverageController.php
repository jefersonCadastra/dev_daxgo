<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Services\PerformanceAverageService;
use Illuminate\Http\Request;

class PerformanceAverageController extends Controller
{
    private PerformanceAverageService $performanceAverageService;

    /**
     * Instance of PerformanceAverageController
     *
     * @param PerformanceAverageService $performanceAverageService
     *
     * @return void
     */
    public function __construct(PerformanceAverageService $performanceAverageService)
    {
        $this->performanceAverageService = $performanceAverageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $performanceAverages = $this->performanceAverageService->all();

        return view('painel.perfomance-averages.index', compact('performanceAverages'));
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
        $this->performanceAverageService->create($request->all());

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
        $this->performanceAverageService->update($request->all(), $id);

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
        $this->performanceAverageService->delete($id);

        return back();
    }
}
