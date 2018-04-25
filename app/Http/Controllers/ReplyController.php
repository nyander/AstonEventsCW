<?php

namespace App\Http\Controllers;

use App\Event;
use App\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $this->validate(request(), [
            'body' => 'required|max:255',
            ]);

        $reply = $event->enterReply([
            'body' => request('body'),
            'user_id' => auth()->id()
            ]);

        if (request()->expectsJson()) {

             return $reply->load('owner');
        }

        return back()->with('flash','');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request, Reply $reply)
    {
        $this->validate($request, [
            'body' => 'required|max:255',
        ]);

        $reply->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function deletes(Reply $reply)
    {
        $reply->delete();

    }
}
