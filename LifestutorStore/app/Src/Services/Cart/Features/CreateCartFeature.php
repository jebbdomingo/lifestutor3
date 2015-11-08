<?php
namespace Services\Cart\Features;

use Illuminate\Http\Request;
use Foundation\AbstractFeature;
use Services\Cart\Domains\Cart\Jobs\CreateCartJob;
use Services\Cart\Domains\Cart\Jobs\RespondWithJsonJob;

/**
 * Implements the feature of creating a Cart in the store application.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class CreateCartFeature extends AbstractFeature
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
        $cart = $this->run(CreateCartJob::class, $request);

        return $this->run(RespondWithJsonJob::class, ['cart' => $cart]);
    }
}
