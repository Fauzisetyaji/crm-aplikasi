<?php

namespace App\Http\Controllers\Backend;

use ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    /**
     * static page image storages.
     *
     * @var string
     */
    protected $imageFileStorage = 'artikels';

    /**
     * The Artikel instance.
     *
     * @var \App\Models\Artikel
     */
    protected $artikel;

    /**
     * The User instance.
     *
     * @var \Illuminate\Support\Facades\Auth;
     */
    protected $user;

    /**
     * Create a new controller instance.
     */
    public function __construct(Artikel $artikel)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');

        $this->artikel = $artikel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->artikel->orderBy('created_at', 'asc')->get();

        return view('backend.artikel.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.artikel.create');
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

        $this->artikel->create([
            'judul' => $request->judul,
            'gambar' => $gambar,
            'konten' => $request->konten,
            'author' => $this->user->staff->id
        ]);

        return redirect(route('artikel.index'))->with('success', __('Artikel berhasil ditambahkan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = $this->artikel->find($id);

        return view('backend.artikel.show', [ 'artikel' => $artikel ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $artikel = $this->artikel->find($id);

        return view('backend.artikel.edit', [ 'artikel' => $artikel]);
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
        $artikel = $this->artikel->find($id);
        $image = $request->file("gambar");
        $gambar = ($image) ? $this->uploadPagePicture($image) : null;

        if (!is_null($gambar)) {
            $artikel->update([
                'judul' => $request->judul,
                'gambar' => $gambar,
                'konten' => $request->konten,
                'author' => $this->user->staff->id
            ]);
        }else{
            $artikel->update($request->all());
        }

        return redirect(route('artikel.index'))->with('success', __('Artikel berhasil diubah'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $artikel = $this->artikel->find($id);

        $artikel->delete();

        return redirect(route('artikel.index'))->with('success', __('Artikel berhasil dihapus'));
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
