<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category_id'];
            unset($data['tags'], $data['category_id']);

            $tagIds = $this->getTagIds($tags);
            $data['category_id'] = $this->getCategoryId($category);

            $post = Post::create($data);
            $post->tags()->attach($tagIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }

        return $post;
    }

    private function getCategoryId($item)
    {
        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
        return $category->id;
    }

    private function getTagIds($tags)
    {
        $tagsIds = [];
        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagsIds[] = $tag->id;
        }
        return $tagsIds;
    }

    public function update($post, $data)
    {
        try {
            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category_id'];
            unset($data['tags'], $data['category_id']);

            $tagIds = $this->getTagIdsWithUpdate($tags);
            $data['category_id'] = $this->getCategoryIdWithUpdate($category);

            $post->update($data);
            $post->tags()->sync($tagIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }

        return $post->fresh();
    }

    private function getTagIdsWithUpdate($tags)
    {
        $tagsIds = [];
        foreach ($tags as $tag) {
            if (!isset($tag['id'])) {
                $tag = Tag::create($tag);
            }
            else {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            $tagsIds[] = $tag->id;
        }
        return $tagsIds;
    }

    private function getCategoryIdWithUpdate($item)
    {
        if (!isset($item['id'])) {
            $category = Category::create($item);
        } else {
            $category = Category::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }
        return $category->id;
    }
}
