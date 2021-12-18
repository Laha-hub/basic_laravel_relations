<x-layout>
    <x-slot name="title">
        {{ $post->title }} - My BBS
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>

    <h1>
        <span>{{ $post->title }}</span>
        <a href="{{ route('posts.edit', $post) }}">[Edit]</a>
        <form method="POST" action="{{ route('posts.destroy', $post) }}" id="delete_post">
            @method('DELETE')
            @csrf

            <button class="btn">[x]</button>
        </form>
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>

    <script>
        'use strict';

        {
            document.querySelector('#delete_post').addEventListener('submit', e => {
                // e.preventDefault()にて、submitに伴うページ遷移や送信を中止させる
                e.preventDefault();

                if(!confirm('Sure to delete?')) {
                    return;
                }

                e.target.submit();
            });
        }
    </script>
</x-layout>

