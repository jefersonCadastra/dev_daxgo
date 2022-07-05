<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoalRequest;
use App\Models\Goal;
use Illuminate\Http\Request;
use App\Services\GoalService;

class GoalController extends Controller
{
    private GoalService $goalService;

    /**
     * Instance of GoalService goalService
     *
     * @param GoalService $goalService
     *
     * @return void
     */
    public function __construct(GoalService $goalService)
    {
        $this->goalService = $goalService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals = $this->goalService->all();

        return view('painel.goals.index', compact('goals'));
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
     * @param  \IApp\Http\Requests\GoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalRequest $request)
    {
        $this->goalService
            ->create($request->all());

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
        $this->goal
            ->find($id)
            ->update($request->all());

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
        $this->goalService
            ->destroy($id);

        return back();
    }
}
