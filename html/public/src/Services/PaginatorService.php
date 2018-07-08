<?php

namespace Qi\Services;

class PaginatorService {
    private $c;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
    }

    public function paginate($paginate_data) {
        $settings = $this->c->get('settings');
        $pagination = array_merge([
            'page' => 1,
            'limit' => $settings['pagination']['size'],
        ], $paginate_data);
        if ($pagination['page'] <= 0) {
            $pagination['page'] = 1;
        }
        if ($pagination['limit'] <= 0) {
            $pagination['limit'] = $settings['pagination']['size'];
        }

        return $pagination;
    }
}