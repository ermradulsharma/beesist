@props(['href' => '', 'title' => '', 'class' => '', 'icon' => '', 'wireClick' => ''])
<x-utils.link :href="$href" :class="$class" data-toggle="tooltip" :title="$title" :icon="$icon" wire:click="{{ $wireClick }}" />
