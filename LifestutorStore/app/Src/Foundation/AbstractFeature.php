<?php

namespace Foundation;

use ReflectionClass;
use Illuminate\Http\Request;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Src\Domains\Queue\DefaultQueue;
use App\Src\Domains\Queue\AbstractQueue as Queue;

/**
 * An Abstract Feature.
 *
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
abstract class AbstractFeature implements SelfHandling
{
    use DispatchesJobs;
    
    /**
     * beautifier function to be called instead of the
     * laravel function dispatchFromArray.
     * When the $arguments is an instance of Request
     * it will call dispatchFrom instead.
     *
     * @param string                         $job
     * @param array|\Illuminate\Http\Request $arguments
     *
     * @return mixed
     */
    public function run($job, $arguments = [], $extra = [])
    {
        if ($arguments instanceof Request) {
            $result = $this->dispatchFrom($job, $arguments, $extra);
        } else {
            $result = $this->dispatchFromArray($job, $arguments);
        }

        return $result;
    }

    /**
     * Run the given job in the given queue.
     *
     * @param string     $job
     * @param array      $arguments
     * @param Queue|null $queue
     *
     * @return mixed
     */
    public function runInQueue($job, $arguments, Queue $queue = null)
    {
        if (!$queue) {
            $queue = DefaultQueue::class;
        }

        $reflection = new ReflectionClass($job);
        $jobInstance = $reflection->newInstanceArgs($arguments);
        $jobInstance->onQueue((string) $queue);
        
        return $this->dispatch($jobInstance);
    }
}
