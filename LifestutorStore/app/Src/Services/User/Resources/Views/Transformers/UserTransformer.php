<?php

namespace Services\User\Resources\Views\Transformers;

use League\Fractal\TransformerAbstract;
use Services\User\Data\Entities\User\User;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'             => (int) $user->id,
            'first_name'     => $user->firstname,
            'last_name'      => $user->lastname,
            'email_address'  => $user->contact->email,
            'published'      => (boolean) 1,
            'date_published' => 'September 13, 2015',
            'active'         => (int) 1
        ];
    }
}
