<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Article extends Entity
{
//we do not need to define any properties here, by extending the Entity class via Code Igniter, this is done automatically. It extends all properties from a row (ie an article)
//the Entity class extends all data in the form of objects instead of arrays

public function isOwner(): bool
{
    return $this->users_id == auth()->user()->id;
}

}
