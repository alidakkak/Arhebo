<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $isSeederRunning = false;

    public function setImageAttribute($image)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $newImageName = uniqid().'_'.'invitations_image'.'.'.$image->extension();
            $image->move(public_path('invitations_image'), $newImageName);
            $this->attributes['image'] = '/'.'invitations_image'.'/'.$newImageName;
        } elseif (is_string($image)) {
            $this->attributes['image'] = $image;
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function filter()
    {
        return $this->belongsTo(Filter::class);
    }

    public function Template()
    {
        return $this->belongsTo(Template::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invitationInput()
    {
        return $this->hasMany(InvitationInput::class);
    }

    public function invitee()
    {
        return $this->hasMany(Invitee::class);
    }

    public function reminder()
    {
        return $this->hasMany(Reminder::class);
    }

    public function receptions()
    {
        return $this->hasMany(Reception::class);
    }

    public function packageDetail()
    {
        return $this->belongsTo(PackageDetail::class);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function InvitationProhibited()
    {
        return $this->hasMany(InvitationProhibited::class);
    }

    public function invitationAdditionalPackage()
    {
        return $this->hasMany(InvitationAdditionalPackage::class);
    }

    public function additionalPackages()
    {
        return $this->belongsToMany(AdditionalPackage::class, 'invitation_additional_packages', 'invitation_id', 'additional_package_id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'invitation_features', 'invitation_id', 'feature_id')
            ->withPivot('value');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_invitations', 'invitation_id', 'attribute_id')
            ->withPivot('value');
    }
}
