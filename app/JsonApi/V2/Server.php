<?php

namespace Inspirium\JsonApi\V2;

use Inspirium\JsonApi\V2\Authors\AuthorSchema;
use Inspirium\JsonApi\V2\Departments\DepartmentSchema;
use Inspirium\JsonApi\V2\Employees\EmployeeSchema;
use Inspirium\JsonApi\V2\Files\FileSchema;
use Inspirium\JsonApi\V2\Messages\MessageSchema;
use Inspirium\JsonApi\V2\Notifications\NotificationSchema;
use Inspirium\JsonApi\V2\Propositions\PropositionSchema;
use Inspirium\JsonApi\V2\Roles\RoleSchema;
use Inspirium\JsonApi\V2\Signatures\SignatureSchema;
use Inspirium\JsonApi\V2\Tasks\TaskSchema;
use Inspirium\JsonApi\V2\Threads\ThreadSchema;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderSchema;
use LaravelJsonApi\Core\Server\Server as BaseServer;

class Server extends BaseServer
{

    /**
     * The base URI namespace for this server.
     *
     * @var string
     */
    protected string $baseUri = '/api/v2';

    public function authorizable(): bool
    {
        return false;
    }

    /**
     * Bootstrap the server when it is handling an HTTP request.
     *
     * @return void
     */
    public function serving(): void
    {
        // no-op
    }

    /**
     * Get the server's list of schemas.
     *
     * @return array
     */
    protected function allSchemas(): array
    {
        return [
            EmployeeSchema::class,
            DepartmentSchema::class,
            RoleSchema::class,
            PropositionSchema::class,
            TaskSchema::class,
            ThreadSchema::class,
            WorkOrderSchema::class,
            FileSchema::class,
            SignatureSchema::class,
            AuthorSchema::class,
            MessageSchema::class,
        ];
    }
}
