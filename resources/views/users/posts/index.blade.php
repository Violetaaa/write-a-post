@extends ('layouts.app')

@section('content')
 <div class="container text-center">
         {{-- @if(auth()->check()) --}}
         @guest
             <p>Please log in it to create posts</p>
         @endguest

         @auth
            <form action="{{ route('posts') }}" method="post">
                @csrf
                    
                <div class="form-group">
                <label for="body"></label>
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="4" placeholder="Post something!"></textarea>

                    @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
</div>
                
                <button type="submit" class="btrn btn-primary">Post</button>
            </form>
        {{-- @endif --}}
        @endauth

        <div>
            <h1>Posts de {{ $user->name }} ({{ $user->posts->count() }})</h1>
            @if($posts->count())
                @foreach ($posts as $post)
                    <div class="container">
                        <span>{{ $post->user->name }}</span>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                        <p>{{ $post->body }}</p>

                        {{-- @if ($post->ownedBy(auth()->user())) --}}
                        {{-- @if (auth()->user()->ownsPost($post)) --}}
                        {{-- @can('delete-post', $post) --}}
                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                        {{-- @endif --}}
                       

                    </div>
                @endforeach
                <div>{{ $posts->links("pagination::bootstrap-4")}}</div>
                
            @else   
            <p>There are no posts</p>
            @endif

        </div>

 </div>
@endsection