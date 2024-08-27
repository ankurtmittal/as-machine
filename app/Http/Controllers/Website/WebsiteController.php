<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\App\Dashboard\DashboardService;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\MyClient;
use App\Models\Review;
use Validator;
class WebsiteController extends Controller
{

    public function index(Request $request)
    {
        try
        {
            $data['title'] = "Home";
            $data['category'] = Category::with('products')->get();
            $data['products'] = Product::with('image')->orderBy('id', 'DESC')->take(10)->get();
            $data['slider'] = Slider::all();
            $data['myClient'] = MyClient::all();
            $data['review'] = Review::all();
            return view('website.index', $data);
		}catch (Exception $e) {
			return $e->getMessage();
		}
    }

    public function categories(Request $request)
    {
        try
        {
            $data['title'] = "Categories";
            $data['category'] = Category::with('products.image')->get();
            return view('website.categories', $data);

        }catch (Exception $e) {
			return $e->getMessage();
		}
    }

    public function aboutUs(Request $request)
    {
        try
        {
            $data['title'] = "About Us";
            return view('website.aboutUs', $data);
        }catch (Exception $e) {
			return $e->getMessage();
		}
    }
















    

    public function faq(Request $request)
    {
        try
        {
            $data['title'] = "FAQ";
            return view('website.faq',$data);
        }catch (Exception $e) {
			return $e->getMessage();
		}
    }

    public function gallery(Request $request)
    {
        try
		{
            $data['title'] = "Gallery";
            $data['images'] = Gallery::all();
            return view('website.gallery', $data);
		}catch (Exception $e) {
			return $e->getMessage();
		}
    }

    public function products_details(Request $request, $id)
    {
        try
        {
            $data['title'] = "Products Details";
            // $data['logo'] = Setting::where('name', 'logo' )->first();
            $data['product'] = Product::with('allImage')->where('id', $id)->first();
            // dd($data['product']);
            $categoryId = $data['product']->category_id;
            $data['relatedProducts'] = Product::with('image')->where('category_id', $categoryId)->take(10)->get();
            return view('website.products_details', $data);
        }catch (Exception $e) {
			return $e->getMessage();
		}

    }

    public function contactUs(Request $request)
    {
        try
		{
            $data['title'] = "Contact Us";
            $data['phone'] = Setting::where('key','company_phone')->first();
            $data['address'] = Setting::where('key','company_address')->first();
            $data['email'] = Setting::where('key','company_email')->first();
            // dd($data['settings']);
            return view('website.contactUs',$data);

		}catch (Exception $e) {
			return $e->getMessage();
		}
    }

    public function contactUsSave(Request $request)
    {
        try
        {
            $rules = array(
				'name'   => 'required',
				'email'   => 'required|email',
				'subject'   => 'required',
				'message'   => 'required',
			);
			$validator = Validator::make($request->all(), $rules);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			}

            return redirect()->route('contactUs')->with('message', 'Send Successfully');;

		}catch (Exception $e) {
			return $e->getMessage();
		}
    }

    public function get_a_quote(Request $request)
    {
        try
        {
            $data['title'] = "Get A Quote";
            // $data['logo'] = Setting::where('name', 'logo' )->first();
            return view('website.get_a_quote', $data);
        }catch (Exception $e) {
			return $e->getMessage();
		}
    }


    public function getAQuoteSave(Request $request)
    {
        try
        {
            $rules = array(
				'name'   => 'required',
				'email'   => 'required|email',
				'subject'   => 'required',
				'message'   => 'required',
			);
			$validator = Validator::make($request->all(), $rules);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			}

            return redirect()->route('get_a_quote')->with('message', 'Send Successfully');;

		}catch (Exception $e) {
			return $e->getMessage();
		}
    }
}
