<?php
namespace App\Support\Contracts;

interface CachedRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get all records with caching.
     */
    public function allCached();

    /**
     * Get a single record by ID with caching.
     */
    public function findCached($id);

    /**
     * Clear the cache for all records.
     */
    public function clearAllCache();

    /**
     * Clear the cache for a single record by ID.
     */
    public function clearCacheById($id);



}
