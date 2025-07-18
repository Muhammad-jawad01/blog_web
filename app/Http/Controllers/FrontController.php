<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //



    public function welcome()
    {

        $posts = Post::with('comments')->get();

        return view('welcome', compact('posts'));
    }

    public function saveComment()
    {
        //  post_id is int
        request()->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // convert to int
        //
        $str = request()->post_id;
        $intstr = (int)$str;

        // dd(request()->all(), $intstr);
        $comment = new Comment();
        $comment->post_id = $intstr;
        $comment->user_id = auth()->id() ?? 1;
        $comment->comment = request('comment');
        $comment->comment_id = request('comment_id') ?? 0;
        $comment->save();
        // dd($comment);
        return redirect()->back()->with('success', 'Comment added successfully.');
    }



    public function users($id)
    {
        $user = new User();
        $user->name = request()->name;
        $user->save();

        foreach (request()->address as $address) {
            $user = new Addrress();
            $user->address = $address;
            $user->user_id = $id;
            $user->save();

            $user->addresses()->create(['address' => $address]);
        }
    }

    public function aboutUs()
    {
        return view('about');
    }


    public function contact()
    {
        return view('contact');
    }

    public function service()
    {
        return view('service');
    }
}
