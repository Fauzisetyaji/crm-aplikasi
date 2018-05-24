<?php

namespace App\Http\Controllers\Backend;

use ImageController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reward;

class RewardController extends Controller
{
    /**
     * static page image storages.
     *
     * @var string
     */
    protected $imageFileStorage = 'rewards';

    /**
     * The Reward instance.
     *
     * @var \App\Models\Reward
     */
    protected $reward;

    /**
     * Create a new controller instance.
     */
    public function __construct(Reward $reward)
    {
        $this->reward = $reward;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->reward->orderBy('created_at', 'asc')->get();

        return view('backend.master.reward.index', [ 'list' => $list ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.master.reward.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file("gambar");
        $gambar = ($image) ? $this->uploadPagePicture($image) : null;

        $this->reward->create([
            'nm_reward' => $request->nm_reward,
            'poin' => $request->poin,
            'status_reward' => isset($request->status_reward) ? ($request->status_reward === "on" ? 1 : 0) : 0,
            'gambar' => $gambar,
            'count' => $request->count,
            'date' => $request->date
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

        return view('backend.master.reward.edit', [ 'reward' => $reward]);
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
        $image = $request->file("gambar");
        $gambar = ($image) ? $this->uploadPagePicture($image) : null;

        if (!is_null($gambar)) {
            $reward->update([
                'nm_reward' => $request->nm_reward,
                'poin' => $request->poin,
                'status_reward' => $request->status_reward,
                'gambar' => $gambar,
                'count' => $request->count,
                'date' => $request->date
            ]);
        }else{
            $reward->update($request->all());
        }

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

    /**
     * upload picture page.
     *
     * @param mixed $file
     *
     * @return string
     */
    protected function uploadPagePicture($file = null)
    {
        if (!is_null($file)) {
            return ImageController::upload($file, $this->imageFileStorage);
        }
    }
}
