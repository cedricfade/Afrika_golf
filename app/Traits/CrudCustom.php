<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

trait CrudCustom
{
    /**
     * Créer une nouvelle ligne dans la table.
     *
     * @param Model $model
     * @param array $data
     * @return Model|null
     */
    public function createRow(Model $model, array $data): ?Model
    {
        try {
            if (Schema::hasColumn($model->getTable(), 'created_by'))
                $data['created_by'] = Auth::user()->id ?? null;
            if (Schema::hasColumn($model->getTable(), 'created_at'))
                $data['created_at'] = time();
            info($data);
            return $model->create($data);
        } catch (\Exception $e) {
            report($e);
            return null;
        }
    }

    /**
     * Met à jour une ligne existante dans la table.
     *
     * @param class-string<Model> $modelClass  Classe du modèle Eloquent
     * @param int|string $id                   Identifiant de la ligne
     * @param array $data                      Données à mettre à jour
     * @return bool
     */
    public function updateRow(Model $modelClass, int $id, array $data)
    {
        try {
            $row = $modelClass::findOrFail($id);
            info('Mise à jour de la ligne : ' . $row->id);
            info('Data : ' . json_encode($data));

            // ✅ Mise à jour et retour du modèle actualisé
            return $row->update($data);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            report($e);
            return false;
        } catch (\Throwable $e) {
            report($e);
            return false;
        }
    }

    /**
     * Modifier une ligne existante dans la table.
     *
     * @param Model $model
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateRowUuid(Model $model, string $id, array $data): bool
    {
        try {
            $row = $model->findOrFail($id);
            return $row->update($data);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    /**
     * Récupérer une ligne spécifique de la table.
     *
     * @param Model $model
     * @param int $id
     * @return Model|null
     */
    public function getRow(Model $model, int $id): ?Model
    {
        try {
            return $model->find($id);
        } catch (\Exception $e) {
            report($e);
            return null;
        }
    }

    /**
     * Récupérer une ligne spécifique de la table.
     *
     * @param Model $model
     * @param string $id
     * @return Model|null
     */
    public function getRowUuid(Model $model, string $id): ?Model
    {
        try {
            return $model->find($id);
        } catch (\Exception $e) {
            report($e);
            return null;
        }
    }

    /**
     * Supprimer une ligne spécifique de la table.
     *
     * @param Model $model
     * @param int $id
     * @return bool
     */
    public function deleteRow(Model $model, int $id): bool
    {
        try {
            /*
            $row = $model->findOrFail($id);
            return $row->delete();
            */

            $row = $model->findOrFail($id);
            return $row->update([
                'deleted' => true,
                'deleted_at' => time(),
                'deleted_by' => Auth::user()->id,
            ]);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    /**
     * Supprimer une ligne spécifique de la table.
     *
     * @param Model $model
     * @param int $id
     * @return bool
     */
    public function deleteRowUuid(Model $model, string $id): bool
    {
        try {
            /*
            $row = $model->findOrFail($id);
            return $row->delete();
            */

            $row = $model->findOrFail($id);
            return $row->update([
                'deleted' => true,
                'deleted_at' => time(),
                'deleted_by' => Auth::user()->id,
            ]);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}
