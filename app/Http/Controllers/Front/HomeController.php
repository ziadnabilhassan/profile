<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Certificate;
use App\Models\Download;
use App\Models\Location;
use App\Models\Downloadtype;

use App\Models\Product;
use App\Models\Review;
use App\Models\gender;
use App\Models\Slider;
use App\Models\Support;
use App\Models\Report;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\Qualities;
use App\Models\Faq;
use App\Models\Count;

use App\Models\Process;
use App\Models\Solution;
use App\Models\Solutionitem;
use App\Models\Typecertificate;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::first(['title', 'image', 'text']);
        $single_product = Product::with([
            'category.categoryType',
            'images',
            'variants.color'
        ])
            ->where('is_featured', 1)
            ->first();

        if (!$single_product) {
            $single_product = Product::with([
                'category.categoryType',
                'images',
                'variants.color'
            ])->first();
        }
        $reviews = Review::get();
        $features = Product::query()
            ->with([
                'oneVariant',
                'oneImage',
                'variants' => function ($query) {
                    $query->select('product_id', 'color_id')->with('color')->distinct('color_id');
                }
            ])
            ->where('is_featured', 1)
            ->latest()
            ->limit(12)
            ->get(['id', 'name', 'image']);
        $recentProducts = Product::query()
            ->with(['oneVariant', 'oneImage', 'variants' => function ($query) {
                $query->select('product_id', 'color_id')->with('color')->distinct('color_id');
            }])
            ->where('is_featured', 0)
            ->latest()
            ->get(['id', 'name', 'image', 'category_id']);
        $page = Page::findOrFail(1);
        $services = Service::get();
        $qualities = Qualities::get();
        $genders  = gender::with(['categories'])->get();
        $galleries = Gallery::get();
        $oneProduct = Product::first();
        $process = Process::get();
        $counts = Count::get();

        $categories  = Category::withCount(['products'])->latest()->get(['id', 'title', 'image']);
        return view('website.index', compact(
            'slider',
            'services',
            'reviews',
            'features',
            'recentProducts',
            'categories',
            'single_product',
            'genders',
            'galleries',
            'oneProduct',
            'page',
            'counts',
            'process',
            'qualities'
        ));
    }
    public function page($id = 1)
    {
        $reviews = Review::get();
        $qualities = Qualities::get();
        $page = Page::findOrFail($id);
        $categories  = Category::withCount(['products'])->latest()->get(['id', 'title', 'image']);
        return view('website.about', compact('page', 'categories', 'reviews', 'qualities'));
    }
    public function contacts()
    {
        $locations=Location::get();
        $services = Service::get();
        $supports=Support::get();
        $reviews = Review::get();
        $categories = Category::withCount(['products'])->latest()->get(['id', 'title', 'image']);
        return view('website.contact', compact('locations','categories', 'services', 'reviews','supports'));
    }
    public function quality()
    {
        $services = Service::get();

        $qualities = Qualities::get();
        $process = Process::get();
        return view('website.quality', compact('process', 'services', 'qualities'));
    }
    public function services()
    {
        $process = Process::get();
        $oneservice = Service::first();

        $services = Service::get();
        return view('website.services', compact('services', 'process','oneservice'));
    }

    public function serviceDetails($id)
    {
        $service = Service::findOrFail($id);
        $services = Service::where('id', '!=', $id)->latest()->limit(5)->get();
        return view('website.service-details', compact('service', 'services'));
    }
    public function previous_work()
    {
        $galleries = Gallery::get();

        return view('website.previouswork', compact('galleries'));
    }
    public function workDetails($id)
    {
        $gallery = Gallery::findOrFail($id);
        $galleries = Gallery::where('id', '!=', $id)->latest()->limit(5)->get();
        return view('website.work-details', compact('gallery', 'galleries'));
    }
    public function solution($id)
    {
        $solution = Solution::findOrFail($id);
        $solutions=Solution::get();
        $solutionitems = Solutionitem::get();
        return view('website.solution', compact('solution', 'solutionitems','solutions'));
    }
    public function solutionitem($id)
    {
        $solutionitem = Solutionitem::findOrFail($id);

        return view('website.solution-details', compact( 'solutionitem'));
    }
    public function company_profile($id = 1)
    {
        $about = Page::findOrFail($id);
           $count = Count::get();
        $certificates = Certificate::get();
        $journey = Process::get();
        return view('website.company-profile', compact('about', 'certificates', 'journey','count'));
    }
    public function company_culture()
    {

        return view('website.company-culture');
    }
    public function oem()
    {
        $qualities=Qualities::get();
        $onequalitie=Qualities::first();
        $products=Product::get();
        $locations=Location::get();

        return view('website.oem', compact('qualities','products','onequalitie','locations'));
    }
    public function honor()
    {
          $certificates = Certificate::get();
          $certificatetypes = Typecertificate::get();



        return view('website.honor' , compact('certificates','certificatetypes'));
    }
    public function privacy($id = 11)
    {
       $privacy=Page::findOrFail($id);
        return view('website.privacy', compact('privacy'));
    }
    public function download_center()
    {
        $downloads=Download::get();
        $downloadtypes=Downloadtype::get();
        return view('website.download_center', compact('downloads','downloadtypes'));
    }
    public function investor()
    {
        $reports=Report::get();

        return view('website.investor', compact('reports'));
    }
    public function faq()
    {
        $faqs=Faq::get();

        return view('website.faq', compact('faqs'));
    }

    public function global_network()
    {
        $locations=Location::get();
        return view('website.global_network', compact('locations'));
    }
        public function message()
    {

        return view('website.message');
    }
}
