<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timeline extends Model
{
    //
    protected $table = 'timelines';

    protected $fillable = ['run', 'entity', 'entity_id', 'created_by', 'updated_by', 'before', 'after'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getDialogMessage()
    {
        $actions = [
            'CREATED' => 'Realizado um novo cadastro',
            'EDIT' => 'Atualizado um cadastro',
            'DELETED' => 'Excluído cadastro'
        ];

        $entities = [
            'group_economy' => 'nos grupos de economia',
            'flags' => 'nas bandeiras',
            'unity' => 'de unidades',
            'collaborators' => 'em colaboradores'
        ];

        $actionText = $actions[$this->run] ?? 'Realizou uma ação';
        $entityText = $entities[$this->entity] ?? 'em um item desconhecido';

        return "{$actionText} {$entityText}";
    }
}
