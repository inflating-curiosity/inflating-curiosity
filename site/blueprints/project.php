<?php if(!defined('KIRBY')) exit ?>

title: Project
pages: false
files:
  sortable: true
  fields:
    alt:
      label: alt text
      type: text
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
  thumbimage:
      label: Thumb Image
      type: select
      options: images
      width: 1/2
      help: Thumbnail Image (width:800px)
  tags:
    label: Tags
    type:  tags
    width: 1/2

