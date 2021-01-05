<?php
function seo($text) {
    $find 		= ['Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', 'Ə', 'ə', 'I'];
    $replace 	= ['c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'i', 'e', 'e'];

    // Yuxarıdakıları uyğun olaraq birini digərinə çevirdim
    $text = strtolower(str_replace($find, $replace, $text));

    // Hərflərdən və rəqəmlərdən başqa bütün işarələri boşluqla əvəz etdim
    $text = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $text);

    // Birdən artıq boşluğu bir boşluqla əvəz edir
    $text = trim(preg_replace('/\s+/', ' ', $text));

    // Boşluqları _ ilə əvəz etdim
    $text = str_replace(' ', '_', $text);

    // Başda - işarəsi varsa silir
    $text = preg_replace('/^-/','',$text);

    return $text;
}
?>