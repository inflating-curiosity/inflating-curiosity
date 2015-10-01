<?php
class ArticlePage extends Page {
  public function author() {
    $author = parent::author();
    if (!parent::author()->empty()) {
      $user = kirby()->site()->users()->find(parent::author());
      if ($user && ($user->firstName() || $user->lastName())) {
        $author = $user->firstName() . ' ' . $user->lastName();
      }
    }
    return $author;
  }

  public function blog() {
    return kirby()->site()->index()->filterBy('template', 'blog')->first();
  }
}
