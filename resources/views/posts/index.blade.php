@extends ('layouts.app')

@section('content')

<div class="container">
    @guest
    <p class="alert alert-warning text-center" role="alert">Please <a href="{{ route('login') }}" class="alert-link">log
            in</a> to create a new post!</p>
    @endguest
</div>

<div class="container">
    @auth
    <form action="{{ route('posts') }}" method="post" class="mb-5">

        @csrf

        <div class="form-group">
            <label for="body"></label>
            <textarea class="form-control mb-4 @error('body') is-invalid @enderror" name="body" id="body" cols="30"
                rows="4" placeholder="Post something!"></textarea>

            @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark btn-lg">Post new message</button>

    </form>

    @endauth

    <div>
        @if($posts->count())
        <h1 class="display-6 text-center mb-4">Latest posts</h1>
        @foreach ($posts as $post)

        <div class="card mb-4">
            <div class="card-body">
                <a class="text-dark fw-bold" href="{{ route('users.posts', $post->user) }}">{{ $post->user->name }}</a>
                <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span>
                <p>{{ $post->body }}</p>

                @can('delete', $post)
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </form>
                @endcan
            </div>
        </div>

        @endforeach

        <div>{{ $posts->links("pagination::bootstrap-4") }}</div>


        @else
        <p>There are no posts</p>
        @endif

    </div>
</div>
@endsection