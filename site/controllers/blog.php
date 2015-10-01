<?php

return function($site, $pages, $page) {

  // fetch the blog posts
  $posts = $page->children()
                ->visible()
                ->sortBy('date', 'desc');

  $posts = $posts->paginate(c::get('blog.postPerPage', 3));
  $pagination = $posts->pagination();

  return compact('posts', 'pagination');

};
