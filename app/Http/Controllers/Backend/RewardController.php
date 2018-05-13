<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reward;
use App\Models\Service;

class RewardController extends Controller
{
    /**
     * The Reward instance.
     *
     * @var \App\Models\Reward
     */
    protected $reward;

    /**
     * The Service instance.
     *
     * @var \App\Models\Service
     */
    protected $service;

    /**
     * Create a new controller instance.
     */
    public function __construct(Reward $reward, Service $service)
    {
        $this->reward = $reward;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->reward->with('service')->get();

        return view('backend.master.reward.index', [ 'list' => $list ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = $this->service->get();

        return view('backend.master.reward.create', ['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->reward->create([
            'nm_reward' => $request->nm_reward,
            'poin' => $request->poin,
            'status_reward' => isset($request->status_reward) ? ($request->status_reward === "on" ? 1 : 0) : 0,
            'service_id' => $request->service
        ]);

        return redirect()->route('reward.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reward = $this->reward->find($id);

        return view('backend.master.reward.show', [ 'reward' => $reward ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $reward = $this->reward->find($id);
        $services = $this->service->get();

        return view('backend.master.reward.edit', [ 'reward' => $reward, 'services' => $services ]);
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
        $reward = $this->reward->find($id);

        $request->merge(['status_reward' => isset($request->status_reward) ? ($request->status_reward === "on" ? 1 : 0) : 0]);
        $reward->update($request->all());

        return redirect(route('reward.index'))->with('success', __('Reward has been successfully updated'));      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $reward = $this->reward->find($id);

        $reward->delete();

        return redirect(route('reward.index'))->with('success', __('Reward has been successfully deleted'));
    }
}
