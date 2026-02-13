@php
    $skill = (int) $skill;

    switch ($skill) {
        case 1:
            $skill = 1;
            break;
        case 2:
            $skill = 5;
            break;
        case 3:
            $skill = 10;
            break;
        case 4:
            $skill = 15;
            break;
        case 5:
            $skill = 20;
            break;
        case 6:
            $skill = 25;
            break;
        case 7:
            $skill = 30;
            break;
        case 8:
            $skill = 35;
            break;
        case 9:
            $skill = 40;
            break;
        case 10:
            $skill = 45;
            break;
        default:
            $skill = 0;
    }

    $skillMobile = min(100, $skill * 2);
@endphp

<div class="w-full bg-gray-600 h-5 rounded overflow-hidden">
    <div class="bg-red-600 h-5 skill-bar animate-[growBar_1.5s_ease-out_forwards]"
        style="--skill-desktop: {{ $skill }}; --skill-mobile: {{ $skillMobile }};"></div>
</div>

<style>
    .skill-bar {
        width: calc(var(--skill-desktop) * 1vw);
    }

    /* Mobile fix ONLY */
    @media (max-width: 640px) {
        .skill-bar {
            width: calc(var(--skill-mobile) * 1%);
        }
    }
</style>
