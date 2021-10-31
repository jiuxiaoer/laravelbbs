<?php
/**
 * 自定义辅助文件
 * Auther: yinshen
 * url:https://www.79xj.cn
 * 创建时间：2021/10/26 22:21
 */

/**
 * 此方法会将当前路由 转相对应css的名称
 * @return string|string[]
 */
function route_class() {
    return str_replace('.', '-', Route::currentRouteName());
}
function category_nav_active($category_id)
{
    return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
}
function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return Str::limit($excerpt, $length);
}
