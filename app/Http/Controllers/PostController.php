<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id' ,Auth::user()->id)->get();
        return view('Blog.app', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Blog.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,svg|max:2048', 
            'image_slider' => 'nullable|array', 
            'image_slider.*' => 'mimes:jpg,jpeg,png,gif,svg|max:2048', 
        ], [
            'title.required' => 'Please enter a title',
            'content.required' => 'Please enter content',
            'image.mimes' => 'Please upload a valid image file',
            'image.max' => 'The image size must not exceed 2MB',
            'image_slider.*.mimes' => 'Each file must be a valid image',
            'image_slider.*.max' => 'Each image must not exceed 2MB',
        ]);
    
 
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::user()->id,
            'image' => $request->hasFile('image') 
                ? $request->file('image')->store('post', 'public') 
                : null,
        ]);
    
        
        if ($request->hasFile('image_slider')) {
            foreach ($request->file('image_slider') as $image) {
                $imageName = $image->store('post', 'public'); 
                
                $post->images()->create([
                    'path' => $imageName,
                ]);
            }
        }
    
        return redirect()->route('blog.index')->with('success', 'Post created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Post $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $blog)
    {
        $post = $blog;
        // $post = Post::where('slug', $slug)->firstOrFail();
        return view('Blog.update',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $blog)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'image_slider' => 'nullable|array',
            'image_slider.*' => 'mimes:jpg,jpeg,png,gif,svg|max:2048',
        ], [
            'title.required' => 'Please enter a title',
            'content.required' => 'Please enter content',
            'image.mimes' => 'Please upload a valid image file',
            'image.max' => 'The image size must not exceed 2MB',
            'image_slider.*.mimes' => 'Each file must be a valid image',
            'image_slider.*.max' => 'Each image must not exceed 2MB',
        ]);
    
        
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
        ];
    
        
        if ($request->hasFile('image')) {
           
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
    
            
            $data['image'] = $request->file('image')->store('post', 'public');
        }
    
        
        $blog->update($data);
    
        
        if ($request->hasFile('image_slider')) {
           
            foreach ($blog->images as $image) {
                Storage::disk('public')->delete($image->path);
                $image->delete(); 
            }
    
           
            foreach ($request->file('image_slider') as $image) {
               
                $imageName = $image->store('post', 'public');
    
                
                $blog->images()->create([
                    'path' => $imageName,
                ]);
            }
        }
    
        return redirect()->route('blog.index')->with('success', 'Post updated successfully');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $blog)
    {
        // Hapus gambar utama
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
            }
            
            $blog->images()->delete();
            
            $blog->delete();
            return redirect()->route('blog.index')->with('success', 'Post deleted successfully');
    }
}

