<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\opening;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    
    public function index(){
       return view('admin.general.index');
    }


    public function getTestimonials(){
       $testimonials = Testimonial::first();
        return response()->json([
            'status'=>200,
            'data'=>$testimonials
        ]);
    }

    public function setTestimonials(Request $request){
     $testimonials  = Testimonial::first();
     $testimonials->testimonial =$request->input('testimonial');
     $testimonials->update();
        return response()->json([
            'status'=>200,
        ]);
    }

    public function setAppoinments(Request $request){
        $opening = opening::first();
        $opening->from_time =$request->input('from_time');
        $opening->to_time =$request->input('to_time');
        $opening->from_day =$request->input('from_day');
        $opening->to_day =$request->input('to_day');
        $opening->update();
        return response()->json([
            'status'=>200,

        ]);
    }

    public function getappoinments(){
        $appoinments = opening::first();
        return response()->json([
            'status'=>200,
            'data'=> $appoinments
        ]);
    }

}
