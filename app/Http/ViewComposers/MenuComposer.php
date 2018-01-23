<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Category;
use Menu as LavaryMenu;

class MenuComposer
{
    /**
     * The category repository implementation.
     *
     * @var Category
     */
    protected $categories;

    /**
     * Create a new profile composer.
     *
     * @param  Category  $category
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->categories = $category->all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $this->buildMenu($this->categories, 'CategoryMenu');
    }

    /*
 * buildMenu
 * https://github.com/lavary/laravel-menu#installation
 */
    public function buildMenu ($arrMenu, $nameMenu){
        $mBuilder = LavaryMenu::make($nameMenu, function($m) use ($arrMenu){
            foreach($arrMenu as $item){
                // first level 
                if($item->parent_id == 0){
                    $m
                        ->add($item->name, ['url' => 'categories/' . $item->id, 'parent' => 'categories' ])
                        ->id($item->id);
                }
                // child item
                else {
                    // find parent item
                    if($m->find($item->parent_id)){
                        $m
                            ->find($item->parent_id)
                            ->add($item->name, ['url' => 'categories/' . $item->id])
                            ->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
    }
}