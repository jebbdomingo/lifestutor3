<?php
namespace Services\Inventory\Features;

use Illuminate\Http\Request;
use Foundation\AbstractFeature;
use Services\Inventory\Domains\Item\Jobs\CreateItemJob;
use Services\Inventory\Domains\Item\Jobs\RespondWithJsonJob;

/**
 * Implements the feature of creating an item in the store application.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class CreateItemFeature extends AbstractFeature
{
	/**
	 * [handle description]
	 *
	 * @param  Request $request
	 *
	 * @return response
	 */
    public function handle(Request $request)
    {
        $item = $this->run(CreateItemJob::class, $request);

        return $this->run(RespondWithJsonJob::class, ['item' => $item]);
    }
}
