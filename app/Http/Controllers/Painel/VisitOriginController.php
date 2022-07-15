<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisitOriginRequest;
use App\Services\VisitOriginService;
use Illuminate\Http\Request;

class VisitOriginController extends Controller
{

    private VisitOriginService $visitOriginService;

    /**
     * Instance of VisitController
     *
     * @param VisitOriginService $visitOriginService
     *
     * @return void
     */
    public function __construct(VisitOriginService $visitOriginService)
    {
        $this->visitOriginService = $visitOriginService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(VisitOriginRequest $request)
    {
        die('Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitOriginRequest $request)
    {
        $data = $request->json()->all();
        $createdData = $this->visitOriginService->create($data);

        return response()
            ->json(['newOrigin' => $createdData->id]);
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
}
