<?php
namespace Services\Inventory\Features;

use Illuminate\Http\Request;
use Foundation\AbstractFeature;
use Services\Inventory\Domains\Item\Jobs\GetItemsJob;
use Services\Inventory\Domains\Item\Jobs\RespondWithJsonJob;

/**
 * Implements the feature of creating an item in the store application.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class GetItemsFeature extends AbstractFeature
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
        $items = $this->run(GetItemsJob::class, $request);

        return $this->run(RespondWithJsonJob::class, ['item' => $items]);
    }
}
