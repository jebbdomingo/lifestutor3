<?php
namespace Services\Inventory\Features;

use Illuminate\Http\Request;
use Foundation\AbstractFeature;
use Services\Inventory\Domains\Item\Jobs\GetItemJob;
use Services\Inventory\Domains\Item\Jobs\RespondWithJsonJob;

/**
 * Implements the feature of creating an item in the store application.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetItemFeature extends AbstractFeature
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
	 * @param  Request $request
	 *
	 * @return response
	 */
    public function handle()
    {
        $items = $this->run(GetItemJob::class, ['id' => $this->id]);

        return $this->run(RespondWithJsonJob::class, ['item' => $items]);
    }
}
