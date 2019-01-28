<?php

namespace Qi\Pageables;

class Pageable {
    public function page($pagination) {
        $items = $this->model::orderBy('id', 'asc')
            ->skip(($pagination['page'] - 1) * $pagination['limit'])
            ->take($pagination['limit'])
            ->get();
        $count = $this->model::count();
        $page_count = ceil($count / $pagination['limit']);
        if ($page_count === 0) {
            $page_count = 1;
        }

        $result = [
            'page_count' => $page_count,
            'page' => $pagination['page'],
            'limit' => $pagination['limit'],
            'result' => $items,
        ];

        return $result;
    }
}