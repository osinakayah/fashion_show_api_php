<?php
/**
 * Created by PhpStorm.
 * User: osinakayah
 * Date: 11/10/18
 * Time: 3:04 PM
 */

namespace Monary\Modules\Designs\Repositories;


use Monary\Modules\Designs\Models\Design;

class DesignRepository
{
    public function fetchDesigns() {

        if (\Auth::check()) {
            return $this->fetchAuthenticatedUserDesigns();
        }
        else {
            return $this->fetchUnathenticatedUserDesigns();
        }
    }

    private function fetchUnathenticatedUserDesigns() {
        return Design::orderBy('created_at', 'desc')->simplePaginate(config('monary_config.page_item_size'));
    }

    private function fetchAuthenticatedUserDesigns() {
        $user = \Auth::user();
        if ($user) {
            $tags = $user->tags()->get();
            return Design::withAnyTags($tags)->orderBy('created_at', 'desc')->simplePaginate(config('monary_config.page_item_size'));
        }

    }

    public function saveDesign(array $designData) {

        if (\Auth::check()) {
            $newDesign = Design::create([
                'name' => $designData['name'],
                'image_url' => $designData['imageUrl'],
                'user_id' => \Auth::id(),
                'tags' => $designData['tags'],
                'designer_id' => $designData['designerId']
            ]);
            return ['status' => true, $newDesign];
        }
        return ['status' => false, 'message' => 'User not logged in'];
    }

    public function updateDesign(int $id, array $updatedDesign){
        if (\Auth::check()) {
            $design = Design::find($id);
            if ($design) {
                $design->update($updatedDesign);
                return ['status' => true, $updatedDesign];
            }
            return ['status' => false, 'message' => 'Resource not found'];
        }
        return ['status' => false, 'message' => 'User not logged in'];
    }

    public function destroyDesign(int $id) {
        if (\Auth::check()) {
            $design = Design::find($id);
            if ($design) {
                $design->delete($id);
                return ['status' => true, 'message' => 'Deleted Successfully'];
            }
            return ['status' => false, 'message' => 'Resource not found'];
        }
        return ['status' => false, 'message' => 'User not logged in'];
    }

    public function getDesignerDesigns (int $designerId) {
        return $designs = Design::where('user_id', $designerId)->orWhere('designer_id', $designerId)->orderBy('created_at', 'desc')->simplePaginate(config('monary_config.page_item_size'));
    }
}