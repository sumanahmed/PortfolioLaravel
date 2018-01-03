<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use App\Tag;

class PortfolioController extends Controller
{
    public function addPortfolioInfo(){
        $terms = Tag::all();
        return view('admin.portfolio.add-portfolio', ['terms'=>$terms]);
    }

    public function savePortfolioInfo(Request $request){
        $portfolioImage = $request->file('portfolio_image');
        $imageName = $portfolioImage->getClientOriginalName();
        $directory = "portfolio-images/";
        $portfolioImage->move($directory, $imageName);
        $imgUrl = $directory.$imageName;

        $this->validate($request,[
            'portfolio_title'=>'required|regex:/^[\pL\s\-]+$/u',
            'portfolio_link'=>'required',
            'portfolio_terms'=>'required|regex:/^[\pL\s\-]+$/u',
            //'portfolio_image'=>'required',
            'publication_status'=>'required'
        ]);
        $portfolio = new Portfolio();
        $portfolio->portfolio_title = $request->portfolio_title;
        $portfolio->portfolio_link = $request->portfolio_link;
        $portfolio->portfolio_terms = $request->portfolio_terms;
        $portfolio->portfolio_image = $imgUrl;
        $portfolio->publication_status = $request->publication_status;
        $portfolio->save();
        return redirect('add-portfolio')->with('message','Portfolio Information Save Successfully');
    }

    public function managePortfolioInfo(){
        $portfolios = Portfolio::all();
        return view('admin.portfolio.manage-portfolio', ['portfolios'=>$portfolios]);
    }

    public function unpublishedPortfolioInfo($id){
        $portfolioById = Portfolio::find($id);
        $portfolioById->publication_status = 0;
        $portfolioById->save();
        return redirect('manage-portfolio')->with('message', 'Portfolio Information Unpublished Successfully');
    }
    public function publishedPortfolioInfo($id){
        $portfolioById = Portfolio::find($id);
        $portfolioById->publication_status = 1;
        $portfolioById->save();
        return redirect('manage-portfolio')->with('message', 'Portfolio Information Published Successfully');
    }

    public function editPortfolioInfo($id){
        $portfolioById = Portfolio::find($id);
        $terms = Tag::all();
        return view('admin.portfolio.edit-portfolio',[
            'portfolioById'=>$portfolioById,
            'terms'=>$terms
        ]);
    }

    public function updatePortfolioInfo(Request $request){

        $portfolioImage = $request->file('portfolio_image');
        if($portfolioImage){
            $portfolioById = Portfolio::find($request->portfolio_id);
            unlink($portfolioById->portfolio_image);

            $portfolioImage = $request->file('portfolio_image');
            $imageName = $portfolioImage->getClientOriginalName();
            $directory = "portfolio-images/";
            $portfolioImage->move($directory, $imageName);
            $imgUrl = $directory.$imageName;

            $this->validate($request,[
                'portfolio_title'=>'required|regex:/^[\pL\s\-]+$/u',
                'portfolio_link'=>'required',
                'portfolio_terms'=>'required|regex:/^[\pL\s\-]+$/u',
                'publication_status'=>'required'
            ]);
            $portfolioById = Portfolio::find($request->portfolio_id);
            $portfolioById->portfolio_title = $request->portfolio_title;
            $portfolioById->portfolio_link = $request->portfolio_link;
            $portfolioById->portfolio_terms = $request->portfolio_terms;
            $portfolioById->portfolio_image = $imgUrl;
            $portfolioById->publication_status = $request->publication_status;
            $portfolioById->save();
            return redirect('manage-portfolio')->with('message','Portfolio Information Updated Successfully');

        }else{
            $this->validate($request,[
                'portfolio_title'=>'required|regex:/^[\pL\s\-]+$/u',
                'portfolio_link'=>'required',
                'portfolio_terms'=>'required|regex:/^[\pL\s\-]+$/u',
                'publication_status'=>'required'
            ]);
            $portfolioById = Portfolio::find($request->portfolio_id);
            $portfolioById->portfolio_title = $request->portfolio_title;
            $portfolioById->portfolio_link = $request->portfolio_link;
            $portfolioById->portfolio_terms = $request->portfolio_terms;
            $portfolioById->publication_status = $request->publication_status;
            $portfolioById->save();
            return redirect('manage-portfolio')->with('message','Portfolio Information Updated Successfully');
        }
    }
    public function deletePortfolioInfo($id){
        $portfolioById = Portfolio::find($id);
        $portfolioById->delete();
        return redirect('manage-portfolio')->with('message', 'Portfolio Information Deleted Successfully');
    }




}
