<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <h4>comments ...</h4>
    <div class="row">
        <div class="col-12" id="comment-form">
            <h2>{{ $form_title }}</h2>
            <form wire:submit.prevent="submit">
                <textarea class="form-group" wire:model="comment" id="comment" placeholder="Write your comment here" rows="4" cols="36"></textarea>
                <br>
                @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                    Post
                </button>
            </form>
        </div>
    </div>
    <div class="comments-list">
        @foreach($comments as $comment)
        <div class="media">
            <p class="pull-right"><small>{{$comment->created_at->diffForHumans()}}</small></p>
            <a class="media-left" href="#">
                <img src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g">
            </a>
            <div class="media-body">

                <h4 class="media-heading user_name">{{$comment->user->name}}</h4>
                {{$comment->body}}
            </div>
            <div class="ml-12 mt-3" style=" background: #80808047">
                @foreach ($comment->replies as $reply)
                    <div class="media-left">
                        <img src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g">
                        <p class="pull-right">
                            <small>{{$reply->created_at->diffForHumans()}}</small>
                            <br>
                            {{$reply->user->name}}
                        </p>
                    </div>
                    <div class="media-body">
                        {{$reply->body}}
                    </div>
                    <hr>
                @endforeach
            </div>
            <button class="replay btn btn-primary" wire:click="replay({{ $comment->id }})" data-id="{{ $comment->id }}">Replay</button>
        </div>
        <hr>
        @endforeach

    </div>
</div>

@push('js')

    <script>

        $(document).on('click','.replay',function (){
            $(this).hide();
        })

    </script>

@endpush
