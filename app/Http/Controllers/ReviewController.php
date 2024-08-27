<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyClient;
use App\Models\Review;
use Exception;
use Laracasts\Flash\Flash;
use Validator;


class ReviewController extends AppBaseController
{
    public function index(Request $request)
    {
        return view('reviews.index');
    }

    public function create()
    {
        return view('reviews.create');
    }


    public function store(Request $request)
    {
        try {
            $rules = array(
				'name' => 'required',
				'rating' => 'required|numeric|between:0,5',
				'content' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			);
			$validator = Validator::make($request->all(), $rules);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			}
            $input = $request->all();
            $imageName = "Image".time().'.'.$request->image->extension();
            $request->image->move(public_path('review'), $imageName);

            $review = Review::create([
                'image' => "review/".$imageName,
                'name' =>  $request->name,
                'rating' =>  $request->rating,
                'content' =>  $request->content,
            ]);
            Flash::success('Review Add successfully.');
            return redirect()->route('review.index');

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public function edit(Request $request, $id)
    {
        $review = Review::where('id',$id)->first();
        return view('reviews.edit', compact('review'));
    }


    public function update(Request $request, $id)
    {

       try {
        $rules = array(
            'name' => 'required',
            'rating' => 'required|numeric|between:0,5',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }
            $input = $request->all();
            if($request->image){
                $exsistImage_remove = Review::where('id',$id)->first();
                $path = public_path()."/".$exsistImage_remove->image;
                unlink($path);

                $imageName = "Image".time().'.'.$request->image->extension();
                $request->image->move(public_path('review'), $imageName);

                $review = Review::where('id',$id)->update([
                    'image' => "review/".$imageName,
                    'name' =>  $request->name,
                    'rating' =>  $request->rating,
                    'content' =>  $request->content,
                ]);

            }else{

                $review = Review::where('id',$id)->update([
                    'name' =>  $request->name,
                    'rating' =>  $request->rating,
                    'content' =>  $request->content,
                ]);

            }
            Flash::success('Review Update successfully.');
            return redirect()->route('review.index');

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public function destroy(Request $request, $id)
    {

        $exsistImage_remove = Review::where('id',$id)->first();
        // dd($exsistImage_remove);

        $path = public_path()."/".$exsistImage_remove->image;
        unlink($path);
        $deleteReview = Review::where('id',$id)->delete();

        return $this->sendSuccess('Review Deleted successfully.');
    }
}
