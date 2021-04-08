<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\View;
use App\Events\SuperAdminNewMessageEvent;
use App\Events\lowerAdminNewMessageEvent;

class MessageController extends Controller
{
    protected $_message;

    public function __construct(Message $message)
    {
        $this->_message = $message;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.conversation-panel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        return $this->dispatchNewMessage(trim($rq->content));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $rq)
    {
        
    }

    public function dispatchNewMessage($content)
    {
        if (!empty($content)) {
            $message = $this->_message->createMessage([
                'content' => $content,
                'user_id' => auth()->id(),
            ]);
                
            $message = $this->_message->getById($message->id)->with(['user'])->firstOrFail();

            $message_item = View::make('admin.message.message-item', [
                'msg' => $message,
            ])->render();

            auth()->user()->isSuperAdmin() ? event(new SuperAdminNewMessageEvent($message_item)) : event(new LowerAdminNewMessageEvent($message_item));
                
            return response()->axios([
                'error' => false
            ]);
        }
        else return response()->axios([
            'error' => true
        ]);
    }
}
