<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CommentsList extends Component
{
    public $comments; 
    public $comment; 
    public $orderId;
    public $user_id;

    public function mount()
    {
        $this->comments = Order::find($this->orderId)->comments;
        $this->comment = new Comment();
    }
  
    public function render()
    {
        return view('livewire.admin.order.comments-list');
    }

      /**
     * -------------------------------------------------------------------------------
     *  Add Comment to Order
     * -------------------------------------------------------------------------------
    **/

    public function addComment()
    {
        $this->validate();

        Order::find($this->orderId)->comments()->save($this->comment);

        $this->comment = Auth::user()->comments()->save($this->comment);

        $this->mount();
        $this->render();
    }

    protected function rules(): array
    {
        return [
            'comment.message' => [
                'string',
                'required',
            ],
            'comment.status' => [
                'string',
            ],
        ];
    }
}
