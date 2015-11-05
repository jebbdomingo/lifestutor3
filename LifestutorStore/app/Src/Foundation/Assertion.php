<?php

namespace Foundation;

use Assert\Assertion as BaseAssertion;

class Assertion extends BaseAssertion
{
    protected static $notFoundExceptionClass = 'Symfony\Component\HttpKernel\Exception\NotFoundHttpException';

    protected static $accessDeniedExceptionClass = 'Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException';

    /**
     * Assert that the entity exists
     *
     * @param mixed $entity
     * @param string|null $message
     * 
     * @return void
     * 
     * @throws Symfony\Component\HttpKernel\Exception\NotFoundHttpException
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

    /**
     * [currentUserIsAdmin description]
     *
     * @param  string $message [optional]
     *
     * @return void
     *
     * @throws Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public static function currentUserIsAdmin($message = null)
    {
        // Currently authenticated user
        $user = app('Dingo\Api\Auth\Auth')->user();

        if (!$user->hasRoleByName('Admin')) {
            $message = sprintf(
                $message ?: 'User "%s" does not have Admin Role',
                self::stringify($user)
            );

            throw new self::$accessDeniedExceptionClass($message);
        }
    }

    /**
     * [currentUserIsAdmin description]
     *
     * @param  string $message [optional]
     *
     * @return void
     *
     * @throws Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public static function currentUserIsMember($message = null)
    {
        // Currently authenticated user
        $user = app('Dingo\Api\Auth\Auth')->user();

        if (!$user->hasRoleByName('Member')) {
            $message = sprintf(
                $message ?: 'User "%s" does not have Member Role',
                self::stringify($user)
            );

            throw new self::$accessDeniedExceptionClass($message);
        }
    }
}
