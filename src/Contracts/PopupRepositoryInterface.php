<?php

namespace Adminetic\Website\Contracts;

use Adminetic\Website\Models\Admin\Popup;
use Adminetic\Website\Http\Requests\PopupRequest;

interface PopupRepositoryInterface
{
    public function indexPopup();

    public function createPopup();

    public function storePopup(PopupRequest $request);

    public function showPopup(Popup $Popup);

    public function editPopup(Popup $Popup);

    public function updatePopup(PopupRequest $request, Popup $Popup);

    public function destroyPopup(Popup $Popup);
}
