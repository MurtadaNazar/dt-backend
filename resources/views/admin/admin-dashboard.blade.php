<div class="card {{ isset($color) ? $color : 'bg-primary' }} text-white mb-3">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        @if (isset($total))
            <p class="card-text">Total: {{ $total }}</p>
        @elseif(isset($latestComments))
            <p class="card-text">
                @forelse($latestComments as $comment)
                    {{ $comment->text }}<br>
                @empty
                    No comments yet.
                @endforelse
            </p>
        @endif
    </div>
</div>
