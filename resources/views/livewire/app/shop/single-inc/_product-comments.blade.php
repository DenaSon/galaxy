<div>

    @forelse($product->comments->take(30) as  $comment)
        <div class="chat chat-start">
            <div class="chat-image avatar">
                <div class="w-auto mt-3">
                    <x-badge value="{{ $comment->username }}"/>
                </div>
            </div>
            <x-badge value="{{ jdate($comment->created_at)->ago() }}" class="mt-5 text-xs"/>
            <div class="chat-bubble">

              <span class="text-sm">
                    {{ $comment->text }}
              </span>


                {{--  reply here --}}



            </div>
            <x-menu-separator></x-menu-separator>
            <div class="rating gap-1 rating-xs mt-2">

                @for($i=1;$i<=$comment->rating;$i++)
                    <input disabled type="radio"  class="mask mask-star bg-yellow-500 text-xs" />
                @endfor

            </div>

        </div>
    @empty
        <div class="text-center text-base">
            هنوز دیدگاهی ثبت نشده است
        </div>
    @endforelse

</div>
