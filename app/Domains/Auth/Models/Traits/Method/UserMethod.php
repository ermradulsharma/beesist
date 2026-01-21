<?php

namespace App\Domains\Auth\Models\Traits\Method;

use App\Domains\Auth\Models\User;
use Illuminate\Support\Collection;

/**
 * Trait UserMethod.
 */
trait UserMethod
{
    public function isMasterAdmin(): bool
    {
        return (int) $this->id === 1;
    }

    /**
     * Check if the user is an Admin by type.
     */
    public function isAdmin(): bool
    {
        return $this->type === User::TYPE_ADMIN;
    }

    /**
     * Check if the user is a regular user by type.
     */
    public function isUser(): bool
    {
        return $this->type === User::TYPE_USER;
    }

    /**
     * Check if the user is a Manager.
     */
    public function isManager(): bool
    {
        return $this->hasRole(config('boilerplate.access.role.manager'));
    }

    /**
     * Check if the user is an Agent.
     */
    public function isAgent(): bool
    {
        return $this->hasRole(config('boilerplate.access.role.agent'));
    }

    /**
     * Check if the user is an Agent.
     */
    public function isTenant(): bool
    {
        return $this->hasRole(config('boilerplate.access.role.tenant'));
    }



    /**
     * @return mixed
     */
    public function hasAllAccess(): bool
    {
        return $this->isAdmin() && $this->hasRole(config('boilerplate.access.role.admin'));
    }

    public function hasManagerAccess(): bool
    {
        return $this->isManager() && $this->hasRole(config('boilerplate.access.role.manager'));
    }

    public function hasAgentAccess(): bool
    {
        return $this->isAgent() && $this->hasRole(config('boilerplate.access.role.agent'));
    }

    public function hasTenantAccess(): bool
    {
        return $this->isTenant() && $this->hasRole(config('boilerplate.access.role.tenant'));
    }

    public function isType($type): bool
    {
        return $this->type === $type;
    }

    /**
     * @return mixed
     */
    public function canChangeEmail(): bool
    {
        return config('boilerplate.access.user.change_email');
    }

    public function isActive(): bool
    {
        return $this->active ?? 0;
    }

    public function isVerified(): bool
    {
        return $this->email_verified_at !== null;
    }

    public function isSocial(): bool
    {
        return $this->provider && $this->provider_id;
    }

    public function getPermissionDescriptions(): Collection
    {
        return $this->permissions->pluck('description');
    }

    /**
     * Get Gravatar avatar URL.
     */
    public function getAvatar($size = null): string
    {
        $size = $size ?? config('boilerplate.avatar.size', 80);
        return 'https://gravatar.com/avatar/' . md5(strtolower(trim($this->email))) . '?s=' . $size . '&d=mp';
    }
}
