<?php

namespace App\Ship\Abstracts\Proxies;

use App\Ship\Database\Filter;
use App\Ship\Database\WhereExpression;
use App\Ship\Exceptions\EntityNotExistException;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;


abstract class BaseEloquentProxy
{
    /** @var \Illuminate\Database\Eloquent\Model */
    protected const MODEL = null;

    /**
     * @param array $newModelData
     *
     * @return array
     */
    public function create(array $newModelData)
    {
        $currentModel = static::MODEL;
        $createdModel = $currentModel::create($newModelData);

        return $createdModel;
    }

    /**
     * @param array $whereConditionsList
     *
     * @return array
     */
    public function findOne(array $whereConditionsList): ?array
    {
        $query = $this->buildQuery($whereConditionsList);
        /** @var array|null $rowFromDB */
        $rowFromDB = $query->first();

        return $rowFromDB ? $rowFromDB->toArray() : null;
    }

    /**
     * @param int $id
     *
     * @return null|array
     */
    public function findOneById(int $id): ?array
    {
        return $this->findOne([
            new WhereExpression('id', '=', $id),
        ]);
    }

    /**
     * @param array $whereList
     * @param null|int $limit
     * @param null|int $offset
     *
     * @return array
     */
    public function findAll(
        array $whereList = [],
        ?int $limit = null,
        ?int $offset = null
    ): array
    {
        $query = $this->buildQuery($whereList);
        if($limit !== null) {
            $query->limit($limit);
        }
        if($limit !== null && $offset !== null) {
            $query->offset($offset);
        }

        return $query->get()->toArray();
    }

    /**
     * @param array $whereList
     *
     * @return int
     */
    public function getCount(array $whereList = []): int
    {
        $query = $this->buildQuery($whereList);
        return $query->count();
    }

    /**
     * @param int $primaryId
     * @param array $fields
     *
     *
     * @throws EntityNotExistException
     */
    public function updateById(int $primaryId, array $fields)
    {
        $model = static::MODEL;
        $rawModel = $model::find($primaryId);
        if ($rawModel === null) {
            throw EntityNotExistException::newInstance(class_basename($rawModel));
        }

        $rawModel->update($fields);
        return $rawModel;
    }

    /**
     * @param array $whereList
     * @param array $fields
     *
     * @return array
     */
    public function update(array $whereList, array $fields)
    {
        $query = $this->buildQuery($whereList);
        $query->update($fields);

        $rawResult = $query->get();
        return $rawResult;
    }

    /**
     * @param array $whereList
     * @param array $fields
     *
     * @return array
     * @throws EntityNotExistException
     */
    public function updateOnce(array $whereList, array $fields): array
    {
        $rawModel = $this->buildQuery($whereList)->first();
        if ($rawModel === null) {
            throw EntityNotExistException::newInstance(class_basename($rawModel));
        }
        $rawModel->update($fields);

        return $rawModel->toArray();
    }

    /**
     * @param string[] $whereList
     *
     * @return bool
     *
     * @throws EntityNotExistException
     */
    public function delete(array $whereList): bool
    {
        $query = $this->buildQuery($whereList);
        $rawData = $query->get();

        if (!$rawData) {
            $model = static::MODEL;
            throw EntityNotExistException::newInstance($model->getTable());
        }

        return $query->delete();
    }

    /**
     * @param int $id
     *
     * @return bool
     *
     * @throws EntityNotExistException
     */
    public function deleteById(int $id): bool
    {
        return $this->delete([
            new WhereExpression('id', '=', $id),
        ]);
    }


    /**
     * @return EloquentBuilder
     */
    public function getQuery(): EloquentBuilder
    {
        $model = static::MODEL;
        $query = $model::query();
        return $query;
    }

    /**
     * @param Filter[] $filterList
     *
     * @return EloquentBuilder
     */
    protected function buildQuery(array $filterList): EloquentBuilder
    {
        $model = static::MODEL;
        $query = $model::query();
        foreach ($filterList as $filter) {
            $query = $filter->addToQuery($query);
        }
        return $query;
    }
}
