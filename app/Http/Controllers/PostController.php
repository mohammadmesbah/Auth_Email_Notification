<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Notifications\CreatePosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use PhpParser\Node\Stmt\Foreach_;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $post= Post::create([
            'title'=> $request->title,
            'body'=> $request->body
        ]);

        $users= User::where('id','!=',auth()->user()->id)->get();
        //$notifi_to= User::all()->where('email','!=',auth()->user()->email);
        
        $created_by= auth()->user()->name;
        Notification::send($users,new CreatePosts($post->id, $created_by, $post->title));

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($post_id)
    {
        //dd(User::where('name',(Auth::user()->name)));
        $post= Post::findorFail($post_id);
        $notif_id= DB::table('notifications')->where('data->post_id',$post_id)->pluck('id');
        DB::table('notifications')->where('id',$notif_id)->update(['read_at'=> now()]);
        return redirect('/dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
    public function markAsRead()
    {
        $user= User::find(auth::user()->id);
        foreach($user->unreadNotifications as $notification){
            $notification->markAsRead();
        }
        return redirect('/dashboard');
    }
}
