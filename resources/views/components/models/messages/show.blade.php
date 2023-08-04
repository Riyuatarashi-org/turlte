<div
    @if($message->author->id === $authUserId)
        class="self-end"
    @endif
>
    <p>
        {{ $message->content }}
    </p>
</div>
