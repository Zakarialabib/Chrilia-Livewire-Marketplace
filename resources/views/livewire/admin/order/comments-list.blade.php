<div class="p-2">
    <h3>{{ __('Comments') }}</h3>
    <div class="comments-list">
        @foreach ($comments as $comment)
            <div class="comment">
                <p class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">{{ $comment->message }}
                    <span class="float-right">
                        @switch($comment->status)
                            @case(NULL)
                                @break
                            @case(\App\Models\Comment::STATUS_OPEN)
                            <span class="badge text-white bg-green-500">{{ __('Open') }}</span>
                                @break
                            @case(\App\Models\Comment::STATUS_CLOSED)
                            <span class="badge text-white bg-red-500">{{ __('Closed') }}</span>
                                @break
                            @default
                        @endswitch
                    </span>
                </p>
                <p class="relative ml-3 float-left text-xs bottom-0 mr-2 text-gray-500">{{ $comment->created_at }}</p>
                <p class="relative float-right text-xs bottom-0 text-gray-500">{{ $comment->user->name }}</p>
            </div>
        @endforeach
    </div>
    <div>
        <h4>{{ __('New Comment') }}</h4>
        <div class="mb-4">
            <textarea name="comment-message" id="comment_message"
                class="flex flex-row items-center w-full border shadow rounded-xl h-12 px-2" rows="5"
                wire:model="comment.message">
            </textarea>
        </div>
        <div class="mb-4 flex flex-wrap-reverse">
            <div class="w-1/2">
                <select class="font-medium bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" name="status" id="status" wire:model="comment.status">
                    <option value="">{{ __('No Value') }}</option>
                    <option value="1">{{ __('Open') }}</option>
                    <option value="0">{{ __('Closed') }}</option>
                </select>
            </div>
            <div class="w-1/2">
                <button type="button"
                class="btn rounded-md w-full mb-4 md:text-sm sm:text-xs font-medium border-0 focus:outline-none focus:ring transition bg-blue-600 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300"
                wire:click="addComment()">
                {{ __('Comment') }}
            </button>
        </div>
        </div>
    </div>
</div>

<style>
    .comments-list {
        height: auto;
        overflow: auto;
        margin-bottom: 15px;
        margin-top: 10px;
    }

    .comment {
        border-bottom: 1px solid rgb(200, 206, 211);
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .comment:last-child {
        border-bottom: none;
    }

</style>
