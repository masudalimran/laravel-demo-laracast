<div x-data="" class="relative">
    <div class="absolute -top-[200px] left-0" id='scroll-point' x-init="scroll()">
    </div>
</div>

{{-- Custom Scripts --}}
<script>
    function scroll() {
        document.getElementById('scroll-point').scrollIntoView({
            block: "start",
            inline: "start"
        });
    }
</script>
