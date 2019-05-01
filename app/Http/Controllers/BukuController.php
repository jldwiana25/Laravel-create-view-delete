<?php

namespace App\Http\Controllers;

use App\buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = buku::latest()->paginate(5);
        return view('buku.index',compact('bukus'))
        ->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'pengarang' => 'required',
    
    
            ]);
    
            buku::create($request->all());
            return redirect() -> route('buku.index')
                              -> with('success','New Booklist successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = buku::find($id);
        return view ('buku.detail', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = buku::find($id);
        return view ('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, buku $id)
    {
        $request->validate([
            'judul' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'pengarang' => 'required'
    
            ]);
    
            $buku = buku::find($id);
            $buku->judul = $request->get('judul');
            $buku->penerbit = $request->get('penerbit');
            $buku->tahun_terbit = $request->get('tahun_terbit');
            $buku->pengarang = $request->get('pengarang');
            $buku->save();
    
            return redirect() -> route('buku.index')
                              -> with('success','New Booklist successfully Update');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = buku::find($id);
        $buku->delete();
        return redirect() -> route('buku.index')
                          -> with('success','Booklist successfully Deleted');
    
    }
}
