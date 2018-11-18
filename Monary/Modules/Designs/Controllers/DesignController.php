<?php
/**
 * Created by PhpStorm.
 * User: osinakayah
 * Date: 11/9/18
 * Time: 9:57 AM
 */

namespace Monary\Modules\Designs\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Monary\Modules\Designs\Repositories\DesignRepository;

class DesignController extends Controller
{
    public function index() {
        $designRepository = new DesignRepository();
        return jsend_success($designRepository->fetchDesigns());
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'image_url' => 'required',
        ]);
        $name = $request->get('name', null);
        $imageUrl = $request->get('image_url', null);
        $designerId = $request->get('designer_id', null);
        $tags = $request->get('tags', []);
        $designRepository = new DesignRepository();

        $saveDesignResponse = $designRepository->saveDesign([
            'name' => $name,
            'imageUrl' => $imageUrl,
            'designerId' => $designerId,
            'tags' => $tags
        ]);
        if ($saveDesignResponse['status']) {
            return jsend_success($saveDesignResponse);
        }
        else {
            return jsend_fail($saveDesignResponse);
        }

    }

    public function update (int $designId, Request $request) {

        $newData = $request->all();
        $designRepository = new DesignRepository();

        $updateDesignResponse = $designRepository->updateDesign($designId, $newData);
        if ($updateDesignResponse['status']) {
            return jsend_success($updateDesignResponse);
        }
        else {
            return jsend_fail($updateDesignResponse);
        }
    }

    public function destroy (int $designId) {
        $designRepository = new DesignRepository();

        $deleteDataResponse = $designRepository->destroyDesign($designId);
        if ($deleteDataResponse['status']) {
            return jsend_success($deleteDataResponse);
        }
        else {
            return jsend_fail($deleteDataResponse);
        }
    }

    public function show ($designerId) {
        $designRepository = new DesignRepository();
        return jsend_success($designRepository->getDesignerDesigns($designerId));
    }

}