<?php
namespace App\Modules\Base\Country\Contracts;


use App\Support\Contracts\CachedRepositoryInterface;

interface CountryRepositoryInterface extends CachedRepositoryInterface
{
    // Define any additional methods specific to Country repository if needed
    public function all(array $with = []);
    public function find(int $id, array $with = []);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
