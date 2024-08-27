<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Gallery;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends AppBaseController
{

    public function index(Request $request)
    {

        return view('gallery.index');
    }

    public function create()
    {
        return view('gallery.create');
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $input = $request->all();

            $imageName = "Image".time().'.'.$request->image->extension();
            $request->image->move(public_path('gallery'), $imageName);

            $gallery = Gallery::create([
                'image' => "gallery/".$imageName,
            ]);

            Flash::success('Gallery Image Add successfully.');
            return redirect()->route('gallery');

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public function edit(Request $request, $id)
    {
        $gallery = Gallery::where('id',$id)->first();
        return view('gallery.edit', compact('gallery'));
    }


    public function update(Request $request, $id)
    {

       try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $input = $request->all();

            $exsistImage_remove = Gallery::where('id',$id)->first();
            $path = public_path()."/".$exsistImage_remove->image;
            unlink($path);

            $imageName = "Image".time().'.'.$request->image->extension();
            $request->image->move(public_path('gallery'), $imageName);

            $gallery = Gallery::where('id',$id)->update([
                'image' => "gallery/".$imageName,
            ]);

            Flash::success('Gallery Image Update successfully.');
            return redirect()->route('gallery');

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public function destroy(Request $request, $id)
    {
        $exsistImage_remove = Gallery::where('id',$id)->first();
        $path = public_path()."/".$exsistImage_remove->image;
        unlink($path);
        $exsistImage_remove = Gallery::where('id',$id)->delete();

        return $this->sendSuccess('Gallery Image Deleted successfully.');
    }

}
