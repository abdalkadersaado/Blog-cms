<div>

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('BackEnd/general.last_posts') }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('BackEnd/general.title') }}</th>
                            <th>{{ __('BackEnd/general.comment') }}</th>
                            <th>{{ __('BackEnd/general.status') }}</th>
                            <th>{{ __('BackEnd/general.date') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($posts as $post)
                        <tr>
                            <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ \Illuminate\Support\Str::limit($post->title, 30, '...') }}</a></td>
                            <td>{{ $post->comments_count }}</td>
                            <td>{{ $post->status() }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">{{ __('BackEnd/general.no_comments_found') }}</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('BackEnd/general.last_comment') }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('BackEnd/general.name') }}</th>
                            <th>{{ __('BackEnd/general.comment') }}</th>
                            <th>{{ __('BackEnd/general.status') }}</th>
                            <th>{{ __('BackEnd/general.date') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($comments as $comment)
                            <tr>
                                <td>{{ $comment->name }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($comment->comment, 30, '...') }}</td>
                                <td>{{ $comment->status() }}</td>
                                <td>{{ $comment->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">{{ __('BackEnd/general.no_comments_found') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
