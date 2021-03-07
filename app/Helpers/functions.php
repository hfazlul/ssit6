<?php


function slugify($text){

    //replace non letter or digits by-
    $text=preg_replace('~[^\pL\d]+~u', '-', $text);

    //transliterate
    $text=iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    //remove unwanted characters
    $text=preg_replace('~[^-\w]+~', '', $text);

    //trim
    $text=trim($text, '-');

    //remove duplicate
    $text=preg_replace('~-+~', '-', $text);

    //lowercase
    $text= strtolower($text);

    if (empty($text)){
        return 'n-a';
    }

    return $text;
}

    function setMessage($type, $message){
        session()->flash('type', $type);
        session()->flash('message', $message);
    }


    function categories_select_data( $categories, $l = '')
    {
        $output = '';
        foreach ($categories as $category) {
            $output .= '<option value=" '.$category->id.' "> '.$category->name.' </option>';

            if (count($category->sub_category)) {
                foreach ($category->sub_category as $sub) {
                    $output .= '<option value=" '.$sub->id.' "> '.$category->name.' > '.$sub->name.' </option>';

                    if ($l === 3) {
                        if (count($sub->sub_category)) {
                            foreach ($sub->sub_category as $sub1) {
                                $output .= '<option value=" '.$sub1->id.' "> '.$category->name.' > '.$sub->name.' > '.$sub1->name.' </option>';
                            }
                        }
                    }
                }
            }
        }
        return $output;
    }

