<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Carbon; 

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        // $title = $request->input('title');
        // $description = $request->input('description');

        $request->validate([
            'title' => 'required',
            'description' => ['required', 'min:10'],
        ]);

        $title = $request->input('title');
        $description = $request->input('description');
        $user_id = Auth::user()->id;

        DB::table('posts')->insert([
            'title' => $title,
            'description' => $description,
            "created_at"=> now(),
            "updated_at"=> now(),
            "user_id"=> $user_id
        ]);

        return redirect()
            ->route('home')
            ->with('success', 'Your post has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $user = DB::table('users')->where('id', $post->user_id)->first();
        // $post = DB::table('posts')-find($id);
        return view('posts.show', ['post' => $post, 'user' => $user]);
        // return view('posts.show', compact('post'));

        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'title' => 'required',
            'description' => ['required', 'min:10'],
        ]);

        $title = $request->input('title');
        $description = $request->input('description');


        DB::table('posts')
            ->where('id', $id)
            ->update([
            'title' => $title,
            'description' => $description,
            "updated_at"=> now()
        ]);

        return redirect()
            ->route('posts.show', [$id])
            ->with('success', 'Your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        DB::table('posts')->delete($id);
        return redirect()
            ->route('home')
            ->with('success', 'Your post has been deleted');
    }
}
