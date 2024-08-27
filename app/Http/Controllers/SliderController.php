<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;
use Validator;
class SliderController extends AppBaseController
{

    public function index(Request $request)
    {
        return view('slider.index');
    }

    public function create()
    {
        return view('slider.create');
    }


    public function store(Request $request)
    {
        try {

            $rules = array(
				'title' => 'required',
                'subtitle' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			);
			$validator = Validator::make($request->all(), $rules);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			}

            $input = $request->all();
            $imageName = "Image".time().'.'.$request->image->extension();
            $request->image->move(public_path('slider'), $imageName);

            $slider = Slider::create([
                'image' => "slider/".$imageName,
                'title' => $request->title,
                'subtitle' =>  $request->subtitle,
            ]);

            Flash::success('Slider Add successfully.');
            return redirect()->route('slider.index');

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public function edit(Request $request, $id)
    {
        $slider = Slider::where('id',$id)->first();
        return view('slider.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
       try {
            $rules = array(
                'title' => 'required',
                'subtitle' => 'required',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }

            $input = $request->all();
            if($request->image){
                $exsistImage_remove = Slider::where('id',$id)->first();
                $path = public_path()."/".$exsistImage_remove->image;
                unlink($path);

                $imageName = "Image".time().'.'.$request->image->extension();
                $request->image->move(public_path('slider'), $imageName);


                $gallery = Slider::where('id',$id)->update([
                    'image' => "slider/".$imageName,
                    'title' => $request->title,
                    'subtitle' =>  $request->subtitle,
                ]);

            }else{

                $gallery = Slider::where('id',$id)->update([
                    'title' => $request->title,
                    'subtitle' =>  $request->subtitle,
                ]);
            }
            Flash::success('Slider Update successfully.');
            return redirect()->route('slider.index');

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public function destroy(Request $request, $id)
    {
        $exsistImage_remove = Slider::where('id',$id)->first();
        $path = public_path()."/".$exsistImage_remove->image;
        unlink($path);
        $exsistImage_remove = Slider::where('id',$id)->delete();

        return $this->sendSuccess('Slider Deleted successfully.');
    }

}
