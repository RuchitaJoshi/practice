<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Thread;
use App\User;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function index($channelSlug = null)
    {
        return $this->getThreads($channelSlug);
        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'channel_id'=>'required|exists:channels,id'
        ]);
        $thread = Thread::create([
            'user_id'=>auth()->id(),
            'channel_id'=> $request['channel_id'],
            'title'=> $request['title'],
            'body'=> $request['body']
        ]);

        return redirect('/threads/'. $thread->id);
    }

    /**
     * Display the specified resource.
     *
     * @param $channelId
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channelId, Thread $thread)
    {
//         dd($thread);
        return view('threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }

    /**
     * @param $channelSlug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function getThreads($channelSlug)
    {
        if ($channelSlug) {
            $channelId = Channel::where('slug', $channelSlug)->first()->id;
            $threads = Thread::where('channel_id', $channelId)->latest();
        } else {
            $threads = Thread::latest();
        }
//        $threads = Thread::latest()->get();

//        if request('by'), we should filter by given username
        if ($username = request('by')) {
            $user = User::where('name', $username)->firstOrFail();
            $threads->where('user_id', $user->id);
        }

        $threads = $threads->get();
        return $threads;
    }
}
