<?php

namespace App\Http\Controllers;

use App\Models\MyClient;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;
use Validator;
class MyClientController extends AppBaseController
{

    public function index(Request $request)
    {
        return view('myClient.index');
    }

    public function create()
    {
        return view('myClient.create');
    }


    public function store(Request $request)
    {
        try {

            $rules = array(
				'url' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			);
			$validator = Validator::make($request->all(), $rules);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			}

            $input = $request->all();
            $imageName = "Image".time().'.'.$request->image->extension();
            $request->image->move(public_path('myClient'), $imageName);

            $myClient = MyClient::create([
                'image' => "myClient/".$imageName,
                'url' =>  $request->url,
            ]);

            Flash::success('Client Add successfully.');
            return redirect()->route('myClients.index');

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public function edit(Request $request, $id)
    {
        $myClient = MyClient::where('id',$id)->first();
        return view('myClient.edit', compact('myClient'));
    }


    public function update(Request $request, $id)
    {

       try {
            $rules = array(
                'url' => 'required',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }

            $input = $request->all();
            if($request->image){
                $exsistImage_remove = MyClient::where('id',$id)->first();
                $path = public_path()."/".$exsistImage_remove->image;
                unlink($path);

                $imageName = "Image".time().'.'.$request->image->extension();
                $request->image->move(public_path('myClient'), $imageName);


                $gallery = MyClient::where('id',$id)->update([
                    'image' => "myClient/".$imageName,
                    'url' =>  $request->url,
                ]);

            }else{

                $gallery = MyClient::where('id',$id)->update([
                    'url' =>  $request->url,
                ]);
            }
            Flash::success('Client Update successfully.');
            return redirect()->route('myClients.index');

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public function destroy(Request $request, $id)
    {
        $exsistImage_remove = MyClient::where('id',$id)->first();
        $path = public_path()."/".$exsistImage_remove->image;
        unlink($path);
        $exsistImage_remove = MyClient::where('id',$id)->delete();

        return $this->sendSuccess('Slider Deleted successfully.');
    }

}
