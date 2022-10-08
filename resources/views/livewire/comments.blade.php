<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <h4>comments ...</h4>
    <div class="row">
        <div class="col-12">
            <h2>Comments</h2>
            <form wire:submit.prevent="submit">
                <textarea class="form-group" wire:model="comment" id="comment" placeholder="Write your comment here" rows="4" cols="36"></textarea>
                <br>
                @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
{{--                <button type="submit" class="btn btn-success">Post</button>--}}
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
        </div>
        @endforeach
    </div>
</div>
