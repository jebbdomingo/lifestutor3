<?php
namespace Services\Cart\Features;

use Illuminate\Http\Request;
use Foundation\AbstractFeature;
use Services\Cart\Domains\Item\Jobs\AddItemJob;
use Services\Cart\Domains\Item\Jobs\RespondWithJsonJob;

/**
 * Implements the feature of adding an Item to Cart in the store application.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class AddItemFeature extends AbstractFeature
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
        $item = $this->run(AddItemJob::class, $request);

        return $this->run(RespondWithJsonJob::class, ['item' => $item]);
    }
}
