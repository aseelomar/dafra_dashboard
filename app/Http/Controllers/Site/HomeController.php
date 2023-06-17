<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Constant;
use App\Goal;
use App\Guide;
use App\Mail;
use App\News;
use App\Page;
use App\Video;
use App\VideoDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
   {
       if (!session('mode')) {
           session(['mode' => 'dark']);
       }
        $news = News::latest('created_at')->active()->take(5)->get();
        $goals = Goal::take(4)->active()->get();
        $videoDetails=VideoDetail::latest('created_at')->active()->home()->take(5)->get();
        $videos= Video::latest('created_at')->active()->home()->take(4)->get();



        /// schedule this day
       $day = strtolower(\Carbon\Carbon::now()->englishDayOfWeek);
       $time =\Carbon\Carbon::now()->format('H');

       $guideVideos = json_decode(Guide::where('day_en',$day)->first()->properties);

       usort( $guideVideos, array($this, "cmp"));

       $today = $guideVideos;

//       foreach ($guideVideos as $guideVideo) {
//           if ( explode(":", $guideVideo->time, 2)[0] >= $time ) {
//               array_push($today, $guideVideo);
//
//               if (count($today) == 4) {
//                   break;
//               }
//
//           }
//       }

//       return $guideVideos;

       $logo = Constant::all();


       return view('site.home',compact('news','goals','videoDetails','videos','logo','today', 'time'));

    }

    public function news()
    {
        $newsCategory = News::active()->orderBy('created_at', 'DESC')->paginate(32);

        $logo = Constant::all();

        return view('site.news',compact('newsCategory','logo'));

    }

    public function showNews($id)
    {
        $id = explode('-', $id)[0];

        $news = News::Where('id',$id)->first();

        $news->increment('user_show',1);

        $category_id = $news->category_id;

        $newsCategory =News::Where('category_id', $category_id)->active()->latest('created_at')->take(3)->get();

        $otherNews = News::orderBy('user_show', 'desc')->active()->take(3)->get();

        $logo = Constant::all();

        return view('site.show-news',compact('news','newsCategory','otherNews','logo'));
   }

    public function videos()
    {
        $videoDetails = VideoDetail::active()->paginate(42);


        $logo = Constant::all();

        return view('site.videos',compact('videoDetails','logo'));
   }

    public function addEmail(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|unique:mails,id',
        ]);

         $data = $request->all();

         $mail = new Mail();

         $mail->fill($data);

         $mail->save();

         return redirect()->back();
     }

    public function showVideo($id)
    {
         $id = explode('-', $id)[0];

         $video = Video::findOrFail($id);

         $videoEpisodes = Video::where('video_details_id', $video->video_details_id)->orderBy('episode', 'ASC')->get();

         $videoDetails=VideoDetail::where('category_id',$video->videoDetail->category_id)->active()->latest('created_at')->take(3)->get();

         $video->increment('user-show',1);

         $logo = Constant::all();

         return view('site.show-video',compact('video','videoEpisodes','videoDetails','logo'));
     }

     public function allVideo($name)
     {
         $video = Category::where('slug', $name)->first();

         $videoDetails = VideoDetail::where('category_id',$video->id)->active()->paginate(6);
         $categoryName = Category::where('slug',collect(request()->segments())->last())->first();
         $categoryName=$categoryName->name;

         $randomVidoes =  VideoDetail::randomVidoe()->take(3)->get();

         $logo = Constant::all();

         return view('site.all-video',compact('videoDetails','randomVidoes','logo','categoryName'));


     }

     public function detailsVideo($id)
     {
         $videoDetail = VideoDetail::Where('id',$id)->first();

         $videos =  Video::where('video_details_id',$id)->orderBy('episode', 'ASC')->get();

         $randomVidoes = VideoDetail::where('category_id',$videoDetail->category_id)->active()->latest('created_at')->take(3)->get();


         $logo = Constant::all();

         $videoDetail->increment('assess',1);

         return view('site.details-video',compact('videoDetail','videos','randomVidoes','logo'));
    }

    public function search(Request $request)
    {
        $logo = Constant::all();

        $randomVidoes =  VideoDetail::where('created_at', '>', today()->subWeek())->take(3)->get();

        $videoDetails = VideoDetail::active()->where('name', 'LIKE', '%' . $request->search . "%")->get();

        return view('site.search',compact('videoDetails','logo','randomVidoes'));

    }

    public function guide()
    {
         $guides = Guide::all()->sortByDesc('next_date');

         $guides = $guides->reverse();

        $logo = Constant::all();

         return view('site.schedule', compact('guides', 'logo'));
    }

    function cmp($a, $b)
    {
        return strcmp($a->time, $b->time);
    }

    public function live(){
        $logo = Constant::all();

        return view('site.live',compact('logo'));
    }

    public function policy()
    {
        $page = Page::findOrFail(1);
        $logo = Constant::all();

        return view('site.policy', compact('page', 'logo'));
    }

    public function about()
    {
        $page = Page::findOrFail(2);
        $logo = Constant::all();

        return view('site.about', compact('page', 'logo'));
    }
}

