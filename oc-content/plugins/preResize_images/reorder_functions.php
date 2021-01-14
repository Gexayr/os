<?php

function przi_reorder_photos_init() {
    if (Params::getParam('action') == 'item_edit_post') {
        Session::newInstance()->_setForm('order_photos', Params::getParam('order_photos'));
        Session::newInstance()->_keepForm('order_photos');
    }

    return; 
}

osc_add_hook('init_item', 'przi_reorder_photos_init'); 

function przi_reorder_photos_pre($aItem) {
    $resources = ItemResource::newInstance()->getAllResourcesFromItem($aItem['idItem']);
    $order = array();
    
    foreach ($resources as $resource) {
        $order[] = $resource['pk_i_id'];
    }

    View::newInstance()->_exportVariableToView('order_photos_original', $order);
    View::newInstance()->_exportVariableToView('order_photos_new', Params::getParam('order_photos'));

    return;
}

osc_add_hook('pre_item_edit', 'przi_reorder_photos_pre');

function przi_reorder_photos_process($aItem) {
    $itemResourceManager = ItemResource::newInstance();
    $resources = $itemResourceManager->getAllResourcesFromItem($aItem['fk_i_item_id']);
    
    if (!empty($resources)) {
        $original_order = __get('order_photos_original');
        $new_order = __get('order_photos_new');

        $check_order = array_slice($new_order, 0, count($original_order));

        if ($original_order === $check_order) return;

        $counter = 0;
        foreach ($original_order as $key => $original) {
            if ($original == $check_order[$key]) $counter++;
            else break;
        }

        $key = md5(osc_base_url() . 'ItemResource:getAllResourcesFromItem:' . $aItem['fk_i_item_id']);
        osc_cache_delete($key);

        $keys = array_flip($new_order);
        usort($resources, function ($a, $b) use ($keys) {
            return $keys[$a['pk_i_id']] - $keys[$b['pk_i_id']];
        });

        $resources = array_slice($resources, $counter);
        foreach ($resources as $key => $resource) {
            $itemResourceManager->insert(array('fk_i_item_id' => $resource['fk_i_item_id'], 's_name' => $resource['s_name'], 's_extension' => $resource['s_extension'], 's_content_type' => $resource['s_content_type'], 's_path' => $resource['s_path']));
            $newResourceId = $itemResourceManager->dao->insertedId();

            $folder = osc_base_path() . $resource['s_path'];
            rename($folder . $resource['pk_i_id'] . '.' . $resource['s_extension'], $folder . $newResourceId . '.' . $resource['s_extension']);
            rename($folder . $resource['pk_i_id'] . '_preview.' . $resource['s_extension'], $folder . $newResourceId . '_preview.' . $resource['s_extension']);
            rename($folder . $resource['pk_i_id'] . '_thumbnail.' . $resource['s_extension'], $folder . $newResourceId . '_thumbnail.' . $resource['s_extension']);
            @rename($folder . $resource['pk_i_id'] . '_original.' . $resource['s_extension'], $folder . $newResourceId . '_original.' . $resource['s_extension']);

            $itemResourceManager->deleteResourcesIds($resource['pk_i_id']);
        }
    }

    Session::newInstance()->_drop('order_photos');
    Session::newInstance()->_dropKeepForm('order_photos');

    return;
}

osc_add_hook('edited_item', 'przi_reorder_photos_process');

function przi_reorder_photos_aux($aItem) {
    if (Params::getParam('action') == 'item_edit_post') {
        $new_order = __get('order_photos_new');
        foreach ($new_order as $key => $order) {
            if (!is_numeric($order)) {
                $new_order[$key] = $aItem['pk_i_id'];
                break;
            }
        }

        View::newInstance()->_exportVariableToView('order_photos_new', $new_order);
    }
    
    return;
}

osc_add_hook('uploaded_file', 'przi_reorder_photos_aux');
?>