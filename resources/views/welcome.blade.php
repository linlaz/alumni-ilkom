<x-guest-layout>
    <div style="text-align: center;">
        <h1 style="display: inline-block;">Welcome, Back!</h1>
    </div>
    @livewire('profile-user')
    @php
        $activityNow = Auth::user()->aktifitas_sekarang;
    @endphp

    @switch($activityNow)
        @case('kuliah')
            @livewire('studies')
            @break

        @case('kerja')
            @livewire('working')
            @break

        @case('kuliah-kerja')
        <div>
            @livewire('studies')
        </div>
        <div>
            @livewire('working')
        </div>

            @break

        @default
            <h5 class="text-center">lengkapi data profil anda.</h5>
    @endswitch

</x-guest-layout>
