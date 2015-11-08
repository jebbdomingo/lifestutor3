<?php

namespace Services\User\Domains\User\Jobs;

use Foundation\AbstractJob;
use Services\User\Data\Entities\User\User;
use Services\User\Data\Entities\User\Values\Contact;
use Services\User\Data\Repositories\UserRepository;
use Services\User\Data\Repositories\RoleRepository;

/**
 * A Domain Service which coordinates how the user is registered with the application
 * 
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class RegisterUserJob extends AbstractJob
{
    private $firstname;
    private $lastname;
    private $email;
    private $dispatcher;

    public function __construct($firstname, $lastname, $email, $password)
    {
        $this->firstname  = $firstname;
        $this->lastname   = $lastname;
        $this->email      = $email;
        $this->password   = $password;
        $this->dispatcher = app('Dingo\Api\Dispatcher');
    }

    public function handle(UserRepository $repository, RoleRepository $roleRepository)
    {
        $user = new User;
        $user->firstname = $this->firstname;
        $user->lastname  = $this->lastname;
        $user->password  = bcrypt($this->password);
        $user->contact   = new Contact($this->email);

        // Add default Member Role
        $role = $roleRepository->find(2);
        $user->addRole($role);

        $repository->create($user);
        
        // Call Cart API to create a cart for this user
        $cart = $this->dispatcher->post('carts', ['user_id' => $user->id]);

        return $user;
    }
}
