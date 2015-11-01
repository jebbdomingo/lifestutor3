<?php
namespace Services\User\Features;

use Foundation\AbstractFeature;
use Services\User\Domains\User\Jobs\GetUserJob;
use Services\User\Domains\User\Jobs\RespondWithJsonJob;

/**
 * Implements the feature of registering a user in the store application.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetUserFeature extends AbstractFeature
{
	/**
	 * [$id description]
	 *
	 * @var integer
	 */
	private $id;

	/**
	 * [__construct description]
	 *
	 * @param integer $id
	 */
	public function __construct($id)
	{
		$this->id = $id;
	}

	/**
	 * [handle description]
	 *
	 * @return response
	 */
    public function handle()
    {
        $user = $this->run(GetUserJob::class, ['id' => $this->id]);

        return $this->run(RespondWithJsonJob::class, ['user' => $user]);
    }
}
