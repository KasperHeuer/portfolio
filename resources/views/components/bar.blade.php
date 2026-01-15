<?php


switch ($skill)
{
    case 1:
        $skill = 4;
        break;
    case 2:
        $skill = 8;
        break;
    case 3:
        $skill = 12;
        break;
    case 4:
        $skill = 16;
        break;
    case 5:
        $skill = 20;
        break;
    case 6:
        $skill = 24;
        break;
    case 7:
        $skill = 28;
        break;
    case 8:
        $skill = 32;
        break;
    case 9:
        $skill = 36;
        break;
    case 10:
        $skill = 40;
        break;

    default:
        $skill = 0;
}
?>


<div class="w-full bg-gray-600 h-5">
    <div class="bg-red-600 h-5 animate-[growBar_1.5s_ease-out_forwards]" style="width:{{ $skill }}vw;"></div>
</div>
