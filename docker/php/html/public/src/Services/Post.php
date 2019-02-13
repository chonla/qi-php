<?php

namespace Qi\Services;

class Post {
    function publish(\Qi\Models\Post $post): \Qi\Models\Post {
        $post->status = 'published';
        $post->published_at = $post->freshTimestampString();

        $post->save();

        return $post;
    }

    function draft(\Qi\Models\Post $post): \Qi\Models\Post {
        $post->status = 'draft';

        $post->save();

        return $post;
    }
}