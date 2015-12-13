{{-- Array of potential background color classes --}}
<?php
$colorArray = [
  "pink-yellow",
  "purple-blue",
  "blue-green",
  "green-yellow",
  "purple-pink",
  "blue-blue",
  "orange-yellow",
  "red-pink",
  "red-black",
  "purple-black",
  "blue-black",
  "green-black",
  "pink-black",
];

$random = rand(0, (count($colorArray) - 1));
$colorForThisPage = $colorArray[$random];

?>

{{ $colorForThisPage }}
