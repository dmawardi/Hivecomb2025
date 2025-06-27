<x-layout.app :title="__('About HiveComb - Your Partner in Web Development Excellence')"
    :description="__('Learn about HiveComb, a web development agency dedicated to delivering innovative and effective solutions for your business. Discover our mission & values.')">
    <x-honeycomb-float>
        
        <x-headers.about></x-headers.about>
        <x-sections.our-story></x-sections.our-story>
        {{-- <x-vision-mission></x-vision-mission> --}}
        <x-sections.process background="bg-violet-950 relative z-40" textColor="text-gray-200"
            titleTextColor="text-amber-400"></x-sections.process>
        <x-sections.call-to-action></x-sections.call-to-action>
    </x-honeycomb-float>
</x-layout.app>
