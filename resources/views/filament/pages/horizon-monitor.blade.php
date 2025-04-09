<x-filament-panels::page class="p-0">
    <div id="horizon-wrapper" class="w-full overflow-hidden">
        <iframe
            src="{{ url('/horizon') }}"
            class="w-full h-full rounded-xl"
            id="horizon-iframe"
        ></iframe>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const wrapper = document.getElementById("horizon-wrapper");
                const iframe = document.getElementById("horizon-iframe");

                function resizeIframe() {
                    const viewportHeight = window.innerHeight;
                    const offsetTop = wrapper.getBoundingClientRect().top;
                    const availableHeight = viewportHeight - offsetTop;

                    wrapper.style.height = availableHeight + "px";
                    iframe.style.height = "99%";
                }

                resizeIframe();
                window.addEventListener("resize", resizeIframe);
            });
        </script>
    @endpush

</x-filament-panels::page>
