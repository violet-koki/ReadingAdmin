<?php

namespace App\Command\Base;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\ModelMismatchException;

class Command
{
    protected const MODEL_TYPE = 'modelname';

    /**
     * モデル確認
     *
     * @param Model $model
     * @throws ModelMismatchException
     * @return void
     */
    private function checkModelType(Model $model)
    {
        if (!is_a($model, $this::MODEL_TYPE)) {
            throw new ModelMismatchException(command: $this,  model: $model);
        }
    }

    /**
     * モデル登録
     *
     * @param Model $model
     * @return int
     */
    public function add(Model $model): int
    {
        /** @var \Illuminate\Database\Eloquent\Model $model */
        $this->checkModelType($model);
        $model->save();
        return $model->id;
    }

    /**
     * モデル削除
     *
     * @param int $modelId
     * @return void
     */
    public function delete(int $modelId): void
    {
        $this::MODEL_TYPE::destroy($modelId);
    }

    /**
     * モデル保存
     *
     * @param Model $model
     * @return Model
     */
    public function save(Model $model): Model
    {
        $this->checkModelType($model);
        $model->save();
        return $model;
    }

    /**
     * モデルの登録。もともとあれば取得
     *
     * @param array $conditions
     * @param array $attributes
     * @return Model
     */
    public function firstOrCreate(array $conditions, array $attributes = array()): Model
    {
        return $this::MODEL_TYPE::firstOrCreate($conditions, $attributes);
    }

    /**
     * モデルの更新。なければ登録
     * $attributesをModelで渡せば全体更新、配列で渡せば指定した部分だけ更新する
     *
     * @param array $conditions
     * @param array|Model $attributes
     * @return Model
     */
    public function updateOrCreate(array $conditions, array|Model $attributes): Model
    {
        if (is_array($attributes)) {
            return $this::MODEL_TYPE::updateOrCreate($conditions, $attributes);
        }
        $this->checkModelType($attributes);
        $converted = $attributes->toArray();
        // idは更新しない
        unset($converted['id']);
        return $this::MODEL_TYPE::updateOrCreate($conditions, $converted);
    }

    /**
     * 複数データをインサート登録
     *
     * @param array $data
     */
    public function insert(array $data)
    {
        $this::MODEL_TYPE::insert($data);
    }
}
