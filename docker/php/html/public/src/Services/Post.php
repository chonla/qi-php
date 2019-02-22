<?php

namespace Qi\Services;

class Post {
    private $c;

    function __construct(\Slim\Container $c) {
        $this->c = $c;

        $this->slugService = $c->get('slug-service');
    }

    private function hasSlug(\Qi\Models\Post $post): bool {
        return (isset($post->slug) && ($post->slug !== ''));
    }

    private function setSlugIfNotPresent(\Qi\Models\Post $post) {
        if (!$this->hasSlug($post)) {
            $post->slug = $this->slugService->new();
        }
    }

    function publish(\Qi\Models\Post $post): \Qi\Models\Post {
        $this->setSlugIfNotPresent($post);

        $post->status = 'published';
        $post->published_at = $post->freshTimestampString();

        $post->save();

        return $post;
    }

    function draft(\Qi\Models\Post $post): \Qi\Models\Post {
        $this->setSlugIfNotPresent($post);

        if ($post->status === 'published') {
            $newPost = $post->replicate(['id']); // create a fresh copy if creating draft on published post
            $post = $newPost;
        }

        $post->status = 'draft';

        $post->save();

        return $post;
    }
}