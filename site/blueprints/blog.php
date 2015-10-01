<?php if(!defined('KIRBY')) exit ?>

title: Blog
pages:
  template: article
  num: date
  field: date
  sort: flip
files: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
