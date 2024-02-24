@props(['text', 'timeout'])
<div x-cloak x-data="{
    show: false,
    positionClass: 'translate-y-32 opacity-0',
    timeout: '<?= $timeout ?? 6000 ?>'
}" x-init="setTimeout(() => {
    show = true;
    positionClass = 'translate-y-0 opacity-100';
}, 1000);
setTimeout(() => {
    show = false;
    positionClass = 'translate-y-32 opacity-0';
}, timeout);" class="fixed bottom-10 right-10 left-10 flex justify-end">
    <p
        x-bind:class="`bg-orange-500 ${positionClass} px-4 py-2 z-10 text-white rounded flex gap-2 items-center transition delay-100 duration-500`">
        <x-feathericon-check-circle />
        {{ $text }}
    </p>
</div>
