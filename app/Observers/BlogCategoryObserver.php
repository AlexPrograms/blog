<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Carbon\Carbon;

class BlogCategoryObserver
{
    /**
     * Обробка перед оновленням запису.
     *
     * @param  BlogCategory  $BlogCategory
     * 
     */
    public function updating(BlogCategory $BlogCategory)
    {
        $this->setPublishedAt($BlogCategory);

        $this->setSlug($BlogCategory);
    }

    /**
     * якщо поле published_at порожнє і нам прийшло 1 в ключі is_published, 
     * то генеруємо поточну дату
     * 
     * @param BlogCategory $BlogCategory
     */
    protected function setPublishedAt(BlogCategory $BlogCategory)
    {
        if (empty($BlogCategory->published_at) && $BlogCategory->is_published) {
            $BlogCategory->published_at = Carbon::now();
        }
    }
    
    /**
     * якщо псевдонім порожній 
     * то генеруємо псевдонім
     * 
     * @param BlogCategory $BlogCategory
     */
    protected function setSlug(BlogCategory $BlogCategory)
    {
        if (empty($BlogCategory->slug)) { 
            $BlogCategory->slug = \Str::slug($BlogCategory->title);
        }
    }
    /**
     * Handle the BlogCategory "created" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function created(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the BlogCategory "updated" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function updated(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the BlogCategory "deleted" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function deleted(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the BlogCategory "restored" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function restored(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the BlogCategory "force deleted" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $blogCategory)
    {
        //
    }
}
