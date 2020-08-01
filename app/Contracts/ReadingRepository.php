<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Reading repository
 */
interface ReadingRepository
{
    /**
     * Get model
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findById(int $id): Model;

    /**
     * Get paginated model collection
     *
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage = 15, array $filters = []): LengthAwarePaginator;

    /**
     * Get complete model collection
     *
     * @param int $perPage
     * @return \Illuminate\Support\Collection
     */
    public function list(array $filters = []): Collection;
}