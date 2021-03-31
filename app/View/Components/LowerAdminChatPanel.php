<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Message;

class LowerAdminChatPanel extends Component
{
    public $lower_messages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->lower_messages = $message->lowerMessages();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lower-admin-chat-panel');
    }
}
