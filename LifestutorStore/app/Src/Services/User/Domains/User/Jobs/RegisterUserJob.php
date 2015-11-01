<?php

namespace Services\User\Domains\User\Jobs;

use Foundation\AbstractJob;
use Services\User\Data\Entities\User\User;
use Services\User\Data\Entities\User\Values\Email;
use EntityManager;

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

    public function __construct($firstname, $lastname, $email, $password)
    {
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->email     = $email;
        $this->password  = $password;
    }

    public function handle(EntityManager $em)
    {
        $user = new User;
        $user->firstname = $this->firstname;
        $user->lastname  = $this->lastname;
        $user->password  = bcrypt($this->password);

        $email = new Email($this->email);
        $user->email = $email;

        $em::persist($user);
        $em::flush();

        return $user;
    }
}
