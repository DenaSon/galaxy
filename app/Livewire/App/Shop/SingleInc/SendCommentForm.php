<?php

namespace App\Livewire\App\Shop\SingleInc;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
class SendCommentForm extends Component
{
    use Toast;


    public $rating = 5;
    public $username;
    public $status = 'hidden';
    public $text;
    public $reply;
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function saveComment(Product $product)
    {
        $this->validate([
            'rating' => 'nullable|numeric|min:1|max:5',
            'reply' => 'nullable|string',
            'username' => 'required|string',
            'status' => 'required|string',
            'text' => 'required|string',


        ]);
        if (!auth()->check()) {
            $this->warning('حساب کاربری', 'برای ارسال دیدگاه وارد حساب کاربری خود شوید');
            return;
        }


       $limitRate =  RateLimiter::attempt('comment-' . auth()->id(),3,function () use($product) {
            try {

                $product->comments()->create([
                    'user_id' => Auth::user()->id,
                    'username' => $this->username,
                    'text' => $this->text,
                    'rating' => $this->rating,
                    'status' => $this->status,
                    'reply' => $this->reply,
                    'product_id' => $this->product->id
                ]);
                $this->info('دیدگاه ارسال شد', 'دیدگاه شما پس از تایید در سایت نمایش داده می شود', timeout: 5000);
                $this->reset();
            } catch (Throwable $e) {
                $this->error($e->getMessage());
            }
        },1200);

        if (!$limitRate)
        {
            $this->warning('','درحال حاضر امکان ارسال دیدگاه وجود ندارد');
        }


    }

    function render()
    {
        return view('livewire.app.shop.single-inc.send-comment-form');
    }
}
