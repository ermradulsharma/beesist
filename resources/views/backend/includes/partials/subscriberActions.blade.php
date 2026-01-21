<div style="min-width: 140px;">
    <x-utils.link :href="route('dynamic.index', ['subdomain' => $user->slug])" class="btn btn-sm btn-success" target="_blank" icon="fas fa-eye" :text="__('View Properties')" />
    @canBeImpersonated($user)
    <x-utils.link :href="route('impersonate', $user->id)" class="btn btn-sm btn-primary" icon="fas fa-random" :text="__('Switch to Account')" :permission="['admin.access.user.impersonate', 'user.access.user.impersonate']" />
    @endCanBeImpersonated
</div>
