<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlogInfo(){
        return view('admin.blog.add-blog');
    }

    public function saveBlogInfo(Request $request){
        $blogImage = $request->file('blog_image');
        $imageName = $blogImage->getClientOriginalName();
        $directory = "blog-images/";
        $blogImage->move($directory, $imageName);
        $imgUrl = $directory.$imageName;

        $this->validate($request, [
           'blog_title'=>'required|regex:/^[\pL\s\-]+$/u',
           'blog_description'=>'required',
           //'blog_image'=>'required',
           'publication_status'=>'required',
        ]);

        $blog = new Blog();
        $blog->blog_title = $request->blog_title;
        $blog->blog_description = $request->blog_description;
        $blog->blog_image = $imgUrl;
        $blog->publication_status = $request->publication_status;
        $blog->save();
        return redirect('add-blog')->with('message', 'Blog Information Save Successfully');
    }

    public function manageBlogInfo(){
        $blogs = Blog::all();
        return view('admin.blog.manage-blog', ['blogs'=>$blogs]);
    }

    public function unpublishedBlogInfo($id){
        $blogById = Blog::find($id);
        $blogById->publication_status = 0;
        $blogById->save();
        return redirect('manage-blog')->with('message','Blog Information Unpublished Successfully');
    }
    public function publishedBlogInfo($id){
        $blogById = Blog::find($id);
        $blogById->publication_status = 1;
        $blogById->save();
        return redirect('manage-blog')->with('message','Blog Information Published Successfully');
    }

    public function editBlogInfo($id){
        $blogById = Blog::find($id);
        return view('admin.blog.edit-blog', ['blogById'=>$blogById]);
    }

    public function updateBlogInfo(Request $request){
        $blogImage = $request->file('blog_image');
        if($blogImage){
            $blogById = Blog::find($request->blog_id);
            unlink($blogById->blog_image);

            $blogImage = $request->file('blog_image');
            $imageName = $blogImage->getClientOriginalName();
            $directory = "blog-images/";
            $blogImage->move($directory, $imageName);
            $imgUrl = $directory.$imageName;

            $this->validate($request, [
               'blog_title'=>'required|regex:/^[\pL\s\-]+$/u',
               'blog_description'=>'required',
               'blog_image'=>'required',
               'publication_status'=>'required'
            ]);

            $blogById->blog_title = $request->blog_title;
            $blogById->blog_description = $request->blog_description;
            $blogById->blog_image = $imgUrl;
            $blogById->publication_status = $request->publication_status;
            $blogById->save();
            return redirect('manage-blog')->with('message', 'Blog Information Updated Successfully');

        }else{
            $blogById = Blog::find($request->blog_id);
            $this->validate($request, [
                'blog_title'=>'required|regex:/^[\pL\s\-]+$/u',
                'blog_description'=>'required',
                'publication_status'=>'required'
            ]);

            $blogById->blog_title = $request->blog_title;
            $blogById->blog_description = $request->blog_description;
            $blogById->publication_status = $request->publication_status;
            $blogById->save();
            return redirect('manage-blog')->with('message', 'Blog Information Updated Successfully');

        }
    }

    public function deleteBlogInfo($id){
        $blogById = Blog::find($id);
        unlink($blogById->blog_image);
        $blogById->delete();
        return redirect('delete-blog')->with('message', 'Blog Information Deleted Successfully');;
    }




}
