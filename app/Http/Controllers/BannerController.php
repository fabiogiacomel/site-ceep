<?php
namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        //return response()->json(['status' => 'success','message' => $banner], 200);
        return view('banner.home', compact('banner'));
    }

    public function show($id)
    {
        $banner = Banner::find($id);
        if (!$banner = Banner::find($id)) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Informação não encontrada',
                ],
                404
            );
        }

        //return response()->json(['status' => 'success','message' => $banner], 200);
        return view('banner.show', compact('banner'));
    }

    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::find($id);
        $banner->update($request->all());
        // return response()->json($banner);
        return redirect()->action('BannerController@index')->withInput($request->only('nome'));
    }

    public function store(BannerRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $banner = Banner::create($data);
        //return response()->json($banner);
        return redirect()->action('BannerController@index')->withInput($request->only('nome'));
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        //return response()->json($banner);
        return redirect()->action('BannerController@index');
    }

    public function create()
    {$banner = null;
        return view('banner.create-edit', compact('banner'));
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        if (empty($banner)) {
            return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
        }
        //return response()->json($banner);
        return view('banner.create-edit', compact('banner'));
    }
}
