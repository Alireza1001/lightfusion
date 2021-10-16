<?php 

// handler menu items to export a json in format of required in AXG library
function wordpressAXDropdownContent($data) {
    $level=0;
    $menuObj=array();
    $menuObj2=array();
    for($i=0; $i<count($data); $i++) {
        $object = new stdClass();
        $object->title = $data[$i]->title;
        $object->url = $data[$i]->url;
        $data[$i]->menu_item_parent==0?$object->level = "undertab":null;
        if($data[$i]->menu_item_parent == 0) {
            $object->color = "#FFF4A3";
            $menuObj[$data[$i]->ID] = $object;
        } else {
            // $object->color = "#fff";
            $menuObj[$data[$i]->menu_item_parent]->content[] = $object;
        }
    }
    foreach ($menuObj as $value) $menuObj2[] = $value;
    return json_encode($menuObj2);
}