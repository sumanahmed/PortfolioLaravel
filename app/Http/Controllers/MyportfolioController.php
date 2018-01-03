<?php

namespace App\Http\Controllers;

use App\About;
use App\Contact;
use App\Email;
use App\Portfolio;
use App\Section;
use App\Service;
use App\Blog;
use App\skill;
use App\Tag;
use Mail;
use Illuminate\Http\Request;

class MyportfolioController extends Controller
{
   public function home(){
       $skills = skill::where('publication_status', '1')
       ->orderBy('id','ASC')
       ->get();

       $abouts = About::all();

       $tags = Tag::all();
       $portfolios = Portfolio::all();

       $services = Service::where('publication_status','1')
           ->orderBy('id','ASC')
           ->get();

       $blogs = Blog::where('publication_status','1')
           ->orderBy('id','DESC')
           ->take(3)
           ->get();

       $contacts = Contact::all();

       $sections = Section::all();


       return view('front.home.home-content',[
           'skills'=>$skills,
           'abouts'=>$abouts,
           'tags'=>$tags,
           'portfolios'=>$portfolios,
           'services'=>$services,
           'blogs'=>$blogs,
           'sections'=>$sections,
           'contacts'=>$contacts
       ]);
   }

   public function sendMail(Request $request){
       $email = new Email();
       $email->email = $request->email;
       $email->name = $request->name;
       $email->message = $request->message;
       $email->save();

       $data = $email->toArray();
       Mail::send('mail.congratulation-mail', $data , function($message) use ($data){
           $message->to($data['email']);
           $message->name($data['name']);
           $message->message($data['message']);
       });
       return redirect('/home');
   }




}
