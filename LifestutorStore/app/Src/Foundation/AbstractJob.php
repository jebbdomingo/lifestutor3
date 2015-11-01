<?php

namespace Foundation;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Dingo\Api\Routing\Helpers;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
abstract class AbstractJob extends Job implements SelfHandling
{
	use Helpers;
}
