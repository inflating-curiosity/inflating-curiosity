<?php if(!defined('KIRBY')) exit ?>

title: Blog Article
pages: false
files: true
fields:
  article:
    label: Article
    type: headline
  title:
    label: Title
    type: title
  date:
    label: Date
    type: date
    width: 1/3
    default: today
  author:
    label: Author
    type: user
    width: 1/3
  thumbimage:
      label: Thumb Image
      type: select
      options: images
      width: 1/3
      help: Thumbnail Image (width:1920px)
  text:
    label: Text
    type: textarea
