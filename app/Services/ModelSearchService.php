<?php

namespace App\Services;

use App\Core\Model;

class ModelSearchService
{

    public static function find(Model $model, array $filter)
    {
        $page = !empty($filter['page']) ? (int)$filter['page'] : 1;
        $term = isset($filter['term']) && $filter['term'] != "" ? $filter['term'] : "";
        $total = $model->findTotalMatch($term);

        //get limit per page
        $limit = $filter['limit'] ?? DEFAULT_PAGER_LIMIT;

        //total pages
        $totalPages = ceil($total / $limit);

        //get 1 page when page filter is not 0
        $page = max($page, 1);

        //get last page when page filter is greater than total pages
        $page = min($page, $totalPages);
        $offset = ($page - 1) * $limit;
        if ($offset < 0) $offset = 0;

        $data = $model->searchRecords($term, $offset, $limit);

        return [
            'current_page' => $page,
            'per_page' => $limit,
            'total_pages' => $total,
            'data' => $data,
        ];
    }
}