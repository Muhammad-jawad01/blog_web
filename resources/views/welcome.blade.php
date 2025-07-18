@extends('layouts.app')
@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h6>welcome page </h6>
        <h6>welcome with the header </h6>

    </div>
    <div class="container py-4">


        @foreach ($posts as $post)
            <div class="card mb-5 shadow-sm">
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post image"
                    style="max-height: 350px; width:350px">


                <div class="card-body">
                    <h4>{{ $post->title }}</h4>
                    <p class="text-muted">By {{ $post->user->name ?? '' }} • {{ $post->created_at->diffForHumans() }}</p>
                    <p>{{ $post->content }}</p>
                </div>

                <!-- Comments Section -->
                <div class="card-body border-top">
                    <h6>Comments ({{ $post->comments->count() }})</h6>

                    @forelse($post->comments as $comment)
                        <div class="mb-3 border-bottom pb-2">
                            <strong>{{ $comment->user->name }}</strong>
                            <span class="text-muted small">• {{ $comment->created_at->diffForHumans() }}</span>
                            <p class="mb-1">{{ $comment->comment ?? '' }}</p>
                            <button class="btn btn-sm btn-primary" id="reply"> reply</button>
                        </div>

                    @empty
                        <p class="text-muted">No comments yet.</p>
                    @endforelse

                    {{-- @foreach ($post->comments->where('parent_id', 0) as $comment)
                        <div class="mb-3 border-bottom pb-2">
                            <strong>{{ $comment->user->name }}</strong>
                            <p>{{ $comment->body }}</p>

                            <!-- Reply Button -->
                            <button class="btn btn-sm btn-link reply-btn"
                                data-comment-id="{{ $comment->id }}">Reply</button>

                            <!-- Replies -->
                            <div class="ms-4 mt-2" id="replies-{{ $comment->id }}">
                                @foreach ($comment->replies as $reply)
                                    <div class="border-start ps-2 mb-2">
                                        <strong>{{ $reply->user->name }}</strong>
                                        <p>{{ $reply->body }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach --}}
                </div>

                <!-- Comment Form -->
                @auth
                    <div class="card-body border-top">
                        <form action="{{ route('front.save.comment') }}" method="POST" id="comment">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}"
                                    class="form-control">

                                <textarea name="comment" class="form-control" rows="2" placeholder="Write a comment..." required></textarea>
                            </div>
                            <button class="btn btn-sm btn-primary">Post Comment</button>
                        </form>
                    </div>
                @endauth
            </div>

            <div id="reply-form-template" class="d-none">
                <form method="POST" class="reply-form">
                    @csrf
                    <textarea name="body" rows="2" class="form-control mb-2" placeholder="Write your reply..." required></textarea>
                    <button type="submit" class="btn btn-sm btn-primary">Reply</button>
                </form>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{-- {{ $posts->links() }} --}}
        </div>
    </div>


    <div class="row p-0 m-0">

        <form action="#">

            <label for="">name</label>

            <input type="text" name="">

            <label for="">address 1</label>
            <input type="text" name="">
            <label for="">address 2</label>

            <input type="text" name="">
            <label for="">address 3</label>

            <input type="text" name="">


        </form>


        @foreach ($users as $data)
            <p>{{ $data->name }}</p>
            addresses
            @foreach ($data->addresses as $item)
                <p>{{ $item->address }}</p>
            @endforeach
        @endforeach
    </div>
@endsection
