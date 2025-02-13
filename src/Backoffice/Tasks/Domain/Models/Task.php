<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

/**
 * @property int                             $id
 * @property string                          $title
 * @property string                          $description
 * @property string                          $status
 * @property int                             $assigned_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Employee|null $employee
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereAssignedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereUpdatedAt($value)
 *
 * @property int $employee_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereEmployeeId($value)
 *
 * @mixin \Eloquent
 */
class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'employee_id'];

    /**
     * @return BelongsTo<Employee, Task>
     */
    public function employee(): BelongsTo
    {
        /** @var BelongsTo<Employee, self> */
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
