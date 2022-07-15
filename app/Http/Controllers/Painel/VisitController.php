<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisitRequest;
use App\Services\VisitService;

class VisitController extends Controller
{
    private VisitService $visitService;

    /**
     * Instance of VisitController
     *
     * @param VisitService $visitService
     *
     * @return void
     */
    public function __construct(VisitService $visitService)
    {
        $this->visitService = $visitService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = $this->visitService->all();
        return view('painel.visits.index', compact('visits'));
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
     * @param  \App\Http\Requests\VisitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitRequest $request)
    {
        $this->visitService->create($request->all());

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
     * @param  \App\Http\Requests\VisitRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisitRequest $request, $id)
    {
        $this->visitService->update($request->all(), $id);

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
        die('Destroy');
        $this->visitService->delete($id);

        return back();
    }
}
