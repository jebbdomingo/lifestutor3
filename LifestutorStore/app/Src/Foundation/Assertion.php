<?php

namespace Foundation;

use Assert\Assertion as BaseAssertion;

class Assertion extends BaseAssertion
{
    protected static $notFoundExceptionClass = 'Symfony\Component\HttpKernel\Exception\NotFoundHttpException';

    /**
     * Assert that the entity exists
     *
     * @param mixed $entity
     * @param string|null $message
     * 
     * @return void
     * 
     * @throws \Assert\AssertionFailedException
     */
    public static function entityExists($entity, $message = null)
    {
        if (empty($entity)) {
            $message = sprintf(
                $message ?: 'Entity "%s" does not exists.',
                self::stringify($entity)
            );

            throw new self::$notFoundExceptionClass($message);
        }
    }
}
