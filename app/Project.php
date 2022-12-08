<?php

namespace App;

use App\Components\User\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Activitylog\LogOptions;
use ProjectMember;
class Project extends Model implements HasMedia
{
    use LogsActivity , InteractsWithMedia;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected static $logUnguarded = true;
    protected static $logOnlyDirty = true;

    const USER_ROLE_ADMIN_USER = 'admin';

       /**
    * Get all of the owning notable models.
    */
    public function notable()
    {
        return $this->morphTo();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    /**
    * The accessors to append to the model's array form.
    *
    * @var array
    */

    /**
     * The member that belong to the project.
     */
    public function members()
    {
        return $this->belongsToMany('App\Components\User\Models\User', 'project_members', 'project_id', 'user_id');
    }

    /**
     * Return the project lead
     */
    public function lead()
    {
        return $this->belongsTo('App\Components\User\Models\User', 'lead_id');
    }
  

        /**
     * Get the location for the project.
     */
    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function owners()
    {
        return $this->belongsToMany(User::class,'project_owners', 'project_id', 'owner_id')->withPivot('status');
    }
    
        /**
     * Get the Agency for the project.
     */
    public function Agency()
    {
        return $this->belongsTo('App\Components\User\Models\User','agency_id');
    }
    /**
     * Get the project task for the project.
     */
    public function tasks()
    {
        return $this->hasMany('App\ProjectTask');
    }
    
    /**
     * Get the milestone for the project.
     */
    public function milestones()
    {
        return $this->hasMany('App\ProjectMilestone');
    }

    /**
     * Get the comments for the project.
     */
    public function comments()
    {
        return $this->hasMany('App\ProjectComment');
    }

    /**
     * Get the transactions for the project.
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    /**
     * Get all of the category for the project.
     */
    public function categories()
    {
        return $this->morphToMany('App\Category', 'categorable');
    }

    /**
     * Return the project creator
     */
    public function creator()
    {
        return $this->belongsTo('App\Components\User\Models\User', 'created_by');
    }
    public function report()
    {
        return $this->hasMany('App\Report');
    }

    /**
     * Get all of the projects's notes.
     */
    public function notes()
    {
        return $this->morphMany('App\Note', 'notable');
    }

    /**
     * Return the billing_types for the project.
     */
    public static function getBillingTypes()
    {
        $billing_types = [
                            ['key' => 'fixed_rate',
                             'value' => __('messages.fixed_rate'),
                            ],
                            ['key' => 'project_hours',
                             'value' => __('messages.project_hours'),
                            ],
                            ['key' => 'task_hours',
                             'value' => __('messages.task_hours'),
                            ],
                        ];

        return $billing_types;
    }

    public static function getProjectTypes()
    {
        $projectTypes = [
                            ['key' => 'normal',
                             'value' => __('data.normal'),
                            ],
                            ['key' => 'not_normal',
                             'value' => __('data.not_normal'),
                            ],
                        ];

        return $projectTypes;
    }
    
    /**
     * Return the status for the project.
     */
    public static function getStatusForProject()
    {
        $status = [
                    ['key' => 'not_started',
                     'value' => __('messages.not_started'),
                    ],
                    ['key' => 'in_progress',
                     'value' => __('messages.in_progress'),
                    ],
                    ['key' => 'on_hold',
                     'value' => __('messages.on_hold'),
                    ],
                    ['key' => 'cancelled',
                     'value' => __('messages.cancelled'),
                    ],
                    ['key' => 'completed',
                     'value' => __('messages.completed'),
                    ],
                ];

        return $status;
    }

    public function info()
    {
        return $this->hasOne('App\ProjectInfo');
    }

    /**
     * A project can be favorited.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    /**
     * Favorite the current project.
     *
     * @return Model
     */
    public function favorite()
    {
        $attributes = ['user_id' => auth()->id()];
        if (! $this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

    /**
     * Unfavorite the current project.
     */
    public function unfavorite()
    {
        $this->favorites()->where('user_id', auth()->id())->get()->each->delete();
    }

    /**
     * Determine if the current project has been favorited.
     *
     * @return boolean
     */
    public function isFavorited()
    {
        return $this->favorites()->where('user_id', auth()->id())->exists();
    }

    /**
     * Fetch the favorited status as a property.
     *
     * @return bool
     */
    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

    /**
     * retrieve projects for dropdown
     *
     * @return $customers
     */
    public static function getProjectsList($append_all = false)
    {
        $projects = Project::select('id', 'name')
                        ->get()
                        ->toArray();

        if ($append_all) {
            $projects = array_merge([['id' => 0, 'name' => __('messages.all')]], $projects);
        }

        return $projects;
    }
    public function visitRequests()
    {
        return $this->hasMany('App\VisitRequest');
    }

    public static function getBuildingTypes()
    {
        $building_types = [
                            ['key' => 'institutional',
                             'value' => __('data.institutional'),
                            ],
                            ['key' => 'business',
                             'value' => __('data.business'),
                            ],
                            ['key' => 'storage',
                             'value' => __('data.storage'),
                            ],
                            ['key' => 'assembly',
                            'value' => __('data.assembly'),
                           ],
                           ['key' => 'residential',
                            'value' => __('data.residential'),
                           ],
                        ];

        return $building_types;
    }


    public static function getBuildingUsing()
    {
        $building_using = [
                            ['key' => 'support',
                             'value' => __('data.support'),
                            ],
                            ['key' => 'personal',
                             'value' => __('data.personal'),
                            ],
                        ];

        return $building_using;
    }

    public static  function getProjectsIdForCustomer()
    {
        $user = request()->user();
        $customer_id=$user->id;
        $childrens=$user->childrenIds($user->id);
        array_push($childrens,$user->id);
        $projects_id=Project::whereIn('customer_id',$childrens)->pluck('id')
        ->toArray();
        return $projects_id;
    }
}
