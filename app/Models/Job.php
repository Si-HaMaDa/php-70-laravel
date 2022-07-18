<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            if (!empty(request()->skills))
                $model->skills()->sync(request()->skills);
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'salary',
        'statu',
        'views',
        'category_id',
        'user_id',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|regex:/^[a-zA-Z\s]*$/',
        'description' => 'required|string',
        'salary' => 'required|integer',
        'statu' => 'required|in:pending,open,closed',
        'views' => 'required|integer',
        'category_id' => 'required|integer|exists:categories,id',
        'user_id' => 'required|integer|exists:users,id',
        'skills' => 'required|array',
        'skills.*' => 'integer',
    ];

    /**
     * Eloquent Relations
     * */

    /**
     * Get the category associated with that Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that owns the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the applications for the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Get all of the users that submitted to this job
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function appliedUsers()
    {
        return $this->belongsToMany(User::class, 'applications');
        // return $this->applications()->join('users', 'users.id', '=', 'applications.user_id')->select('users.*');
    }

    /**
     * The skills that belong to the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    /**
     * Scopes for query.
     */
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
        });
    }
}
