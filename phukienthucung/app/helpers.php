<?php
use App\Models\Menu;
use App\Models\Category;

if (!function_exists('module_asset')) {
    function module_asset($path)
    {
        return asset('modules/' . str_replace('::', '/', $path));
    }
}

if (!function_exists('getParentMenusWithCategory')) {
    function getParentMenusWithCategory()
    {
        return Menu::with('category')
            ->whereNull('parent_id')
            ->where('is_active',1)
            ->orderBy('position')
            ->get();
    }
}

if (!function_exists('getParentCategories')) {
    function getParentCategories()
    {
    return Category::whereNull('parent_id')->orderBy('id')->get();
    }
}

if (!function_exists('getChildCategories')) {
    function getChildCategories($parentId)
    {
        return Category::where('parent_id', $parentId)->orderBy('name')->get();
    }
}

