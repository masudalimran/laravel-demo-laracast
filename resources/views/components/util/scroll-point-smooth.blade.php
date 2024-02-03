<div x-data="" class="relative">
    <div class="absolute -top-[200px] left-0" id='smooth-scroll-point' x-init="scrollSmooth()">
    </div>
</div>

{{-- Custom Scripts --}}
<script>
    function scrollSmooth() {
        setTimeout(() => {
            document.getElementById('smooth-scroll-point').scrollIntoView({
                behavior: 'smooth',
                block: "start",
                inline: "start"
            });
        }, 1000);
    }
</script>
